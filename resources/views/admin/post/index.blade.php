@extends('layouts.master')
@section('title', 'View Post')
@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4>View Post
                    <a href="{{ url('admin/add-post') }}" class="btn btn-primary btn-sm float-end">Add Post</a>
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Post</th>
                            <th>Category</th>
                            <th>Youtube iFrame</th>
                            <th>Status</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($post as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>{{ $item->yt_iframe }}</td>
                                <td>{{ $item->status == '1' ? 'Shown' : 'Hidden' }}</td>
                                <td>
                                    <a href="{{ url('admin/edit-post/' . $item->id) }}" class="btn btn-success btn-sm">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ url('admin/delete-post/'. $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
