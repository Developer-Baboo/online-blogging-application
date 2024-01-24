@extends('layouts.master')
@section('title', 'View Category')
@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4>View Category
                    <a href="{{ url('admin/add-category') }}" class="btn btn-primary btn-sm float-end">Add Category</a>
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $item )
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name}}</td>
                            <td>
                                <img src="{{ asset('uploads/category/'.$item->image) }}" height="50px" width="50px" alt="">
                            </td>
                            <td>{{ $item->status == '1' ? 'Shown':'Hidden'}}</td>
                            <td>
                                <a href="" class="btn btn-success btn-sm">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
