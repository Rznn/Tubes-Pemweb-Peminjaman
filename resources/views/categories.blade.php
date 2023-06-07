@extends('layouts.mainlayout')

@section('title', 'Category')

@section('content')
    <h1>Category List</h1>

    {{-- add category --}}
    <div class="mt-4 d-flex justify-content-start">
        <a href="category_add" class="btn btn-primary me-2">Add Category</a>
        <a href="category_deleted_list" class="btn btn-secondary">View Deleted Category</a>
    </div>

    {{-- success add category --}}
    <div class = "mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>

    {{-- table --}}
    <div class="my-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <a href="/category_edit/{{ $item->slug }}">Edit</a>
                            <a href="/category_delete/{{ $item->slug }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
