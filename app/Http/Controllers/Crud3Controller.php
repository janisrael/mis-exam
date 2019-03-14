<?php
namespace App\Http\Controllers;

use App\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Crud3Controller extends Controller
{
    public function index(Request $request)
    {
        $request->session()->put('search', $request->has('search') ? $request->get('search') : ($request->session()->has('search') ? $request->session()->get('search') : ''));
        
        $request->session()->put('field', $request->has('field') ? $request->get('field') : ($request->session()->has('field') ? $request->session()->get('field') : 'office'));

        $request->session()->put('field', $request->has('field') ? $request->get('field') : ($request->session()->has('field') ? $request->session()->get('field') : 'description'));

        $request->session()->put('sort', $request->has('sort') ? $request->get('sort') : ($request->session()->has('sort') ? $request->session()->get('sort') : 'asc'));
        $offices = new Office();
        
        $offices = $offices->where('office', 'like', '%' . $request->session()->get('search') . '%')
            ->orWhere('description', 'like', '%' . $request->session()->get('search') . '%')
            ->orWhere('local', 'like', '%' . $request->session()->get('search') . '%')
            ->orderBy('office', $request->session()->get('sort'))

            ->paginate(5);

        if ($request->ajax())
            return view('contents.index', compact('offices'));
        else
            return view('contents.ajax', compact('offices'));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('get'))
            return view('contents.form');
        else {
            $rules = [
                'office' => '',
                'description' => '',
                'local' => '',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
                return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors()
                ]);
            $office = new office();
            $office->office = $request->office;
            $office->description = $request->description;
            $office->local = $request->local;
            $office->save();
            return response()->json([
                'fail' => false,
                'redirect_url' => url('offices')
            ]);
        }
    }

    public function delete($id)
    {
        Office::destroy($id);
        return redirect('/offices');
    }

    public function update(Request $request, $id)
    {
        if ($request->isMethod('get'))
            return view('contents.form', ['office' => Office::find($id)]);
        else {
            $rules = [
                'office' => 'required',
                'description' => 'required',
                'local' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
                return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors()
                ]);
            $office = Office::find($id);
            $office->office = $request->office;
            $office->description = $request->description;
            $office->local = $request->local;
            $office->save();
            return response()->json([
                'fail' => false,
                'redirect_url' => url('offices')
            ]);
        }
    }
}