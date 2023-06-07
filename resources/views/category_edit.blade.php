@extends('layouts.mainlayout')

@section('title', 'Edit Category')

@section('content')
    <h1>Edit Category</h1>

    {{-- adding form --}}
    <div class="mt-5 w-50">
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif

        <form action="/category_edit/{{ $categories->slug }}" method="post">
            @csrf
            @method('put')
            <div>
                <label for="Name" class="form-label">Edit Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $categories->name }}" placeholder="Change Category Name">
            </div>

            <div class="mt-3">
                <button class="btn btn-success" type="submit">Update Data</button>
            </div>
        </form>
    </div>

@endsection
