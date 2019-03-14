<div class="container">
    <div class="float-right">
        @auth
        <a href="javascript:ajaxLoad('{{url('offices/create')}}')"
           class="btn btn-primary">New</a>
        @endauth
    </div>
    <h1 style="font-size: 2.2rem">OFFICE LIST</h1>
    <hr/>
    <div class="row">
  <!--       <div class="col-sm-4 form-group">
            {!! Form::select('gender',['-1'=>'Select Gender','Male'=>'Male','Female'=>'Female'],request()->session()->get('gender'),['class'=>'form-control','onChange'=>'ajaxLoad("'.url("laravel-crud-search-sort-ajax").'?gender="+this.value)']) !!}
        </div> -->
        <div class="col-sm-5 form-group">
            <div class="input-group">
                <input class="form-control" id="search"
                       value="{{ request()->session()->get('search') }}"
                       onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('offices')}}?search='+this.value)"
                       placeholder="Search Office" name="search"
                       type="text" id="search"/>
                <div class="input-group-btn">
                    <button type="submit" class="btn btn-warning"
                            onclick="ajaxLoad('{{url('offices')}}?search='+$('#search').val())"
                    >
                        Search
                    </button>
                </div>
            </div>
        </div>




    </div>
    <table class="table table-bordered bg-light">
        <thead class="bg-dark" style="color: white">
        <tr>
            <!-- <th width="60px" style="vertical-align: middle;text-align: center">No</th> -->
            <th style="vertical-align: middle">
                <a href="javascript:ajaxLoad('{{url('offices?field=office&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                    Office
                </a>
                {{request()->session()->get('field')=='office'?(request()->session()->get('sort')=='asc'?'↑':'↓'):''}}
            </th>
            <th style="vertical-align: middle">
                <a href="javascript:ajaxLoad('{{url('offices?field=description&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                    description
                </a>
                {{request()->session()->get('field')=='office'?(request()->session()->get('sort')=='asc'?'↑':'↓'):''}}
            </th>
            <th style="vertical-align: middle">
                <a href="javascript:ajaxLoad('{{url('offices?field=local&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                    local
                </a>
                {{request()->session()->get('field')=='local'?(request()->session()->get('sort')=='asc'?'↑':'↓'):''}}
            </th>
            <th width="130px" style="vertical-align: middle">Action</th>
        </tr>
        </thead>
        <tbody>
        @php
            $i=1;
        @endphp
        @foreach($offices as $office)
            <tr>
                <!-- <th style="vertical-align: middle;text-align: center">{{$i++}}</th> -->
                <td style="vertical-align: middle">{{ $office->office }}</td>
                <td style="vertical-align: middle">{{ $office->description }}</td>
                <td style="vertical-align: middle">{{$office->local}}</td>
                <td style="vertical-align: middle" align="center">
                  @auth


                    <a class="btn btn-primary btn-sm" title="Edit"
                       href="javascript:ajaxLoad('{{url('offices/update/'.$office->id)}}')">
                        Edit</a>
                    <input type="hidden" name="_method" value="delete"/>
                    <a class="btn btn-danger btn-sm" title="Delete"
                       href="javascript:if(confirm('Are you sure want to delete?')) ajaxDelete('{{url('offices/delete/'.$office->id)}}','{{csrf_token()}}')">
                        Delete
                    </a>
                  @endauth  
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <nav>
        <ul class="pagination justify-content-end">
            {{$offices->links('vendor.pagination.bootstrap-4')}}
        </ul>
    </nav>
</div>