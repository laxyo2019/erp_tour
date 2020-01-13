@extends('layout.main')



@section('content')

 <main class="app-content">
    <div class="app-title">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                  <div class="tile">
                    <div class="tile-body">

            <h1><i class='fa fa-key'></i> Edit {{$permission->name}}</h1>
            <br>
            
            <div class="clearix"></div>
            <div class="col-md-12">
                 
             <div class="tile-body">
              <div class="row">
               <div class="form-group col-md-8">
                {{ Form::model($permission, array('route' => array('permissions.update', $permission->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with permission data --}}
            
           
                {{ Form::label('name', 'Permission Name') }}
                {{ Form::text('name', null, array('class' => 'form-control')) }}
            </div>
            <div class="form-group col-md-4 align-self-end">
                {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

                {{ Form::close() }}
            </div>
            

             </div>
              </div>
                </div>
            

                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>

@endsection