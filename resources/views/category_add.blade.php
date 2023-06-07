@extends('layouts.mainlayout')

@section('title', 'Add Category')

@section('content')
    <h1>Add New Category</h1>

    {{-- adding form --}}
    <div class="mt-5 w-50">
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif

        <form action="category_add" method="post">
            @csrf
            <div>
                <label for="Name" class="form-label">Name   </label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Category Name">
            </div>

            <div class="mt-3">
                <button class="btn btn-success" type="submit">Add Data</button>
            </div>
        </form>
    </div>

@endsection
