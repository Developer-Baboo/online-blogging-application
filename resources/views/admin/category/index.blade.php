@extends('layouts.master')
@section('title', 'View Category')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Category</h1>

        @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Category Page</li>
        </ol>
        <div class="row">

        </div>
    </div>
@endsection
