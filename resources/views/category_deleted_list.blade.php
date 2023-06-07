@extends('layouts.mainlayout')

@section('title', 'Deleted Category')

@section('content')
    <h1>Deleted Category List</h1>
    {{-- back --}}
    <div class="mt-4 d-flex justify-content-start">
        <a href="/categories" class="btn btn-primary">Back to Categories</a>
    </div>

    {{-- success restore category --}}
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
                @foreach ($deletedcategories as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <a href="/category_restore/{{ $item->slug }}">Restore</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
