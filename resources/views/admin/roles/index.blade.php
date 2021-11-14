@extends('adminlte::page')

@section('title', 'School Website')

@section('content_header')
    <h1>List of Roles</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-primary" role="alert">
            <strong>Well done!</strong> {{session('info')}}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <a href=" {{route('admin.roles.create')}} ">Create Course</a>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                        <tr>
                            <td> {{$role->id}} </td>
                            <td> {{$role->name}} </td>
                            <td width="10px">
                                <a class="btn btn-secondary" href=" {{route('admin.roles.edit', $role)}} ">Edit</a>
                            </td>
                            <td width="10px">
                                <form action=" {{route('admin.roles.destroy', $role)}} " method="POST">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">There is not registrated role</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop