<div class="container">
    <div class="col-md-8 offset-md-2">
        <h1>{{isset($office)?'Edit':'New'}} office</h1>
        <hr/>
        @if(isset($office))
            {!! Form::model($office,['method'=>'put','id'=>'frm']) !!}
        @else
            {!! Form::open(['id'=>'frm']) !!}
        @endif
        <div class="form-group row required">
            {!! Form::label("office","Office",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::text("office",null,["class"=>"form-control".($errors->has('office')?" is-invalid":""),"autofocus",'placeholder'=>'Office']) !!}
                <span id="error-name" class="invalid-feedback"></span>
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label("description","Description",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
           <!--      {!! Form::select("description",['Male'=>'Male','Female'=>'Female'],null,["class"=>"form-control"]) !!} -->
                {!! Form::text("description",null,["class"=>"form-control".($errors->has('office')?" is-invalid":""),"autofocus",'placeholder'=>'Description']) !!}
                <span id="error-name" class="invalid-feedback"></span>
            </div>
        </div>
        <div class="form-group row required">
            {!! Form::label("local","Local",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::text("local",null,["class"=>"form-control".($errors->has('local')?" is-invalid":""),'placeholder'=>'Local']) !!}
                <span id="error-email" class="invalid-feedback"></span>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3 col-lg-2"></div>
            <div class="col-md-4">
                <a href="javascript:ajaxLoad('{{url('offices')}}')" class="btn btn-danger">
                    Back</a>
                {!! Form::button("Save",["type" => "submit","class"=>"btn
            btn-primary"])!!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>