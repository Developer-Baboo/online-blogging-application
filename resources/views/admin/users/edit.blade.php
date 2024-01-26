@extends('layouts.master')
@section('title', 'Edt User')
@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4>Edit User
                    <a href="{{ url('admin/users') }}" class="btn btn-dark btn-sm float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="">Full Name</label>
                    <p class="form-control">{{ $users->name }}</p>
                </div>
                <div class="mb-3">
                    <label for="">Email Id</label>
                    <p class="form-control">{{ $users->email }}</p>
                </div>

                <div class="mb-3">
                    <label for="">Created at</label>
                    <p class="form-control">{{ $users->created_at }}</p>
                </div>

                <form action=" {{ url('admin/update-user/' . $users->id) }} " method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="">Role as</label>
                        <select name="role_as" class="form-control">
                            <option value="1" {{ $users->role_as == '1' ? 'selected' : '' }}>Admin</option>
                            <option value="0" {{ $users->role_as == '0' ? 'selected' : '' }}>User</option>
                            <option value="2" {{ $users->role_as == '2' ? 'selected' : '' }}>Blogger</option>
                        </select>
                    </div>


                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update User Role</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
