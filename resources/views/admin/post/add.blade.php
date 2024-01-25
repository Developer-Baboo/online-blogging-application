@extends('layouts.master')

@section('title', 'Add Post')

@section('content')

    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Add Post</h4>
            </div>
            <div class="card-body">
                <!-- resources/views/categories/create.blade.php -->

                <form action="{{ url('admin/store-post/')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                     <div class="mb-3">
                        <label for="name">Category</label>
                        <select name="category_id" id="" class="form-control">
                            @foreach ($category as $cateitem )
                                <option value="{{ $cateitem->id }}">{{ $cateitem->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="name">Post Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="name">Youtube iFrame</label>
                        <input type="text" name="yt_iframe" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug"  class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" name="meta_title" class="form-control"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="meta_description">Meta Description</label>
                        <textarea name="meta_description"rows="3" class="form-control" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="meta_keyword">Meta Keyword</label>
                        <textarea name="meta_keyword" rows="3" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <input type="checkbox" name="status" value="1"
                            value="1">
                    </div>


                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Save Post</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
