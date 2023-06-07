@extends('layouts.mainlayout')

@section('title', 'Items')

@section('content')
    <h1>Item List</h1>

    {{-- add category --}}
    <div class="mt-4 d-flex justify-content-start">
        <a href="/item_add" class="btn btn-primary me-2">Add Item</a>
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
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Unit</th>
                    <th>Coordinator</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->photo }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->brand }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->categories->name }}</td>
                        <td>{{ $item->units->name }}</td>
                        <td>{{ $item->admin_units->name }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="#">Edit</a>
                            <a href="#">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
