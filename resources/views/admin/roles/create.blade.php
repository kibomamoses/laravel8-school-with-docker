@extends('adminlte::page')

@section('title', 'School Website')

@section('content_header')
    <h1>Create new Role</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <!--Form with Laravel Collective-->
            {!! Form::open(['route' => 'admin.roles.store']) !!}
                
                @include('admin.roles.partials.form')
               
                {!! Form::submit('Create', ['class' => 'btn btn-primary mt-2']) !!}
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