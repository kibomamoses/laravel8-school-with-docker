@extends('adminlte::page')

@section('title', 'School Website')

@section('content_header')
    <h1>Assign Roles</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="h5">Name:</h1>
            <p class="form-control"> {{$user->name}} </p>
            <h1 class="h5">List of roles</h1>

            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}
                @foreach ($roles as $role)
                    <div>
                        <label>
                            {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                            {{$role->name}}
                        </label>
                    </div>
                @endforeach

                {!! Form::submit('Assign role', ['class' => 'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop