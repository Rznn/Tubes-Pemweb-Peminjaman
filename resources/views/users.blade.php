@extends('layouts.mainlayout')

@section('title', 'User List')

@section('content')
    <h1>User List</h1>

    {{-- add category --}}
    <div class="mt-4 d-flex justify-content-start">
        <a href="category_deleted_list" class="btn btn-secondary me-2">View Deleted Category</a>
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
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>User Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->no_telp }}</td>
                        <td>{{ $item->user_role }}</td>
                        <td>
                            <a href="/user_edit/{{ $item->slug }}">Edit</a>
                            <a href="/user_delete">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
