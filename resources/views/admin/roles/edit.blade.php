@extends('layout.main')

@section('title', '| Edit Role')

@section('content')

 <main class="app-content">
    <div class="app-title"> 

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                  <div class="tile">
                    <div class="tile-body">
    <h1><i class='fa fa-key'></i> Edit Role: {{$role->name}}</h1>
    <hr>

    {{ Form::model($role, array('route' => array('roles.update', $role->id), 'method' => 'PUT')) }}

    <div class="form-group">
    <label class="control-label">{{ Form::label('name', 'Role Name') }}</label>

        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <h5><b>Assign Permissions</b></h5>
    @foreach ($permissions as $permission)

        {{Form::checkbox('permissions[]',  $permission->id, $role->permissions ) }} 
        {{Form::label($permission->name, ucfirst($permission->name)) }}<br>

    @endforeach
    <br>
    {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}    
 </div>
                  </div>
                </div>
            </div>
        </div>
   </div>


@endsection