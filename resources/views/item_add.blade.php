@extends('layouts.mainlayout')

@section('title', 'Add Item')

@section('content')
    <h1>Add New Item</h1>

    {{-- adding form --}}
    <div class="mt-5 w-50">
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif

        <form action="item_add" method="post" enctype="multipart/form-data">
            @csrf
            {{-- input --}}
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Item Name">
            </div>
            <div class="mb-3">
                <label for="brand" class="form-label">Brand</label>
                <input type="text" name="brand" id="brand" class="form-control" placeholder="Item Brand">
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="category_id" id="category_id" class="form-control select">
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="units" class="form-label">Unit</label>
                <select name="unit_id" id="unit_id" class="form-control select">
                    @foreach ($units as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Item Description">
            </div>
            <div class="mb-4">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" name="photo" id="photo" class="form-control" placeholder="Category Name">
            </div>

            {{-- submit --}}
            <div class="mt-3">
                <button class="btn btn-success" type="submit">Add Data</button>
            </div>
        </form>
    </div>

@endsection
