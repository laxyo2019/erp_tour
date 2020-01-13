@extends('layout.main')

@section('title', '| Create Permission')

@section('content')

 <main class="app-content">
      <div class="app-title">

<div class="container">
    <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
    <h1><i class='fa fa-key'></i> Add Permission</h1>
    <br>

    {{ Form::open(array('url' => 'permissions')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', '', array('class' => 'form-control')) }}
    </div><br>
    @if(!$roles->isEmpty()) //If no roles exist yet
        <h4>Assign Permission to Roles</h4>

        @foreach ($roles as $role) 
            {{ Form::checkbox('roles[]',  $role->id ) }}
            {{ Form::label($role->name, ucfirst($role->name)) }}<br>

        @endforeach
    @endif
    <br>
    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>
    </div>

</div>
    </div>
        </div>
          </div>
            </div>


@endsection