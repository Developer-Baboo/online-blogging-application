@extends('layouts.master')
@section('title', 'View Users')
@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4>View Users
                    <a href="{{ url('admin/dashboard') }}" class="btn btn-dark btn-sm float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ($user->role_as == 1)
                                        Admin
                                    @elseif ($user->role_as == 0)
                                        User
                                    @else
                                        Blogger
                                    @endif
                                </td>
                                <td>
                                    {{--  --}}
                                    {{-- edit-user --}}
                                    <a href="{{ url('admin/edit-user/' . $user->id) }}"
                                        class="btn btn-success btn-sm">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
