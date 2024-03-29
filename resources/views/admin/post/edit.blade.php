@extends('layouts.master')

@section('title', 'Edit Post')

@section('content')

    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4>Edit Post
                    <a href="{{ url('admin/view-post') }}" class="btn btn-danger btn-sm float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/update-post/' . $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label for="name">Choose Category</label> <span class="text-danger"> *</span>
                        <select name="category_id" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if ($category->id == $post->category_id) selected @endif>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>



                    <div class="mb-3">
                        <label for="name">Post Name</label><span class="text-danger"> *</span>
                        <input type="text" name="name" value="{{ $post->name }}" class="form-control">
                    </div>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror



                    <div class="mb-3">
                        <label for="name">Youtbe iFrame</label><span class="text-danger"> *</span>
                        <input type="text" name="yt_ifrmae" value="{{ $post->yt_iframe }}" class="form-control">
                    </div>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror




                    <div class="mb-3">
                        <label for="slug">Slug</label><span class="text-danger"> *</span>
                        <input type="text" name="slug" value="{{ $post->slug }}" class="form-control" required>
                    </div>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" id="mySummernote" class="form-control" required>{{ $post->description }}</textarea>
                    </div>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="mb-3">
                        <label for="slug">Yt Frame</label>
                        <input type="text" name="yt_iframe" value="{{ $post->yt_iframe }}" class="form-control" required>
                    </div>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="mb-3">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" name="meta_title" value="{{ $post->meta_title }}" class="form-control"
                            required>
                    </div>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="mb-3">
                        <label for="meta_description">Meta Description</label>
                        <textarea name="meta_description"rows="3" class="form-control" required>{{ $post->meta_description }}</textarea>
                    </div>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="mb-3">
                        <label for="meta_keyword">Meta Keyword</label>
                        <textarea name="meta_keyword" rows="3" class="form-control" required>{{ $post->meta_keyword }}</textarea>
                    </div>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <input type="checkbox" name="status" value="1" {{ $post->status == '1' ? 'checked' : '' }}
                            value="1">
                    </div>


                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update Post</button>
                    </div>

                </form>
            </div>
            {{-- @endforeach --}}
        </div>
    </div>
    </div>
@endsection
