@extends('layouts.master')
@section('title', 'Blog Settings')
@section('content')
    <div class="container-fluid px-4 mt-3">
        {{-- <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol> --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Website Settings</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="">Website Name</label>
                                <input type="text" name="website_name" @if($setting) value="{{ $setting->website_name }}" @endif  required class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Website Logo</label>
                                <input type="file" name="website_logo" required class="form-control">
                                @if($setting->logo)
                                <img src="{{ asset('uploads/settings/'.$setting->logo) }}" alt="Logo" width="100px" height="70px" >
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="">Website Favicon</label>
                                <input type="file" name="website_favicon" class="form-control">
                                @if($setting->favicon)
                                <img src="{{ asset('uploads/settings/'.$setting->favicon) }}" alt="Logo" width="100px" height="70px" >
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="">Description</label>
                                <textarea type="" name="description" class="form-control" rows="3"> @if($setting){{ $setting->description }} @endif </textarea>
                            </div>

                            <h4>SEO - Meta Tags</h4>
                            <div class="mb-3">
                                <label for="">Meta Title</label>
                                <input type="text" name="meta_title" @if($setting) value="{{ $setting->meta_title }}" @endif class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Meta Keywords</label>
                                <textarea type="" name="meta_keyword" class="form-control" rows="3">@if($setting) {{ $setting->website_name }} @endif </textarea>
                            </div>
                            <div class="mb-3">
                                <label for="">Meta Description</label>
                                <textarea type="" name="meta_description" class="form-control" rows="3">@if($setting) {{ $setting->website_name }} @endif</textarea>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
