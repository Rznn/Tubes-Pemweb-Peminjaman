@extends('layouts.mainlayout')

@section('title', 'Delete Category')

@section('content')
    <h2>Do you want to delete category {{ $categories->name }} ?</h2>
    <div class="mt-5">
        <a href="/category_destroy/{{ $categories->slug }}" class="btn btn-danger me-2">Delete</a>
        <a href="/categories" class="btn btn-primary">Cancel</a>
    </div>
@endsection
