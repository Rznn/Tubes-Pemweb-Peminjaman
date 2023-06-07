@extends('layouts.mainlayout')

@section('title', 'Edit User')

@section('content')
    <h1>Edit User</h1>

    {{-- adding form --}}
    <div class="mt-5 w-50">
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif

        <form action="/user_edit/{{ $users->slug }}" method="post">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" readonly class="form-control" value="{{ $users->name }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" id="email" readonly class="form-control" value="{{ $users->email }}">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea type="text" cols="80" rows="4" name="address" id="address" readonly class="form-control" style="resize: none">{{ $users->address }}</textarea>
            </div>
            <div class="mb-3">
                <label for="no_telp" class="form-label">Phone Number</label>
                <input type="text" name="no_telp" id="no_telp" readonly class="form-control" value="{{ $users->no_telp }}">
            </div>
            <div class="mb-4">
                <label for="user_role" class="form-label">User Role</label>
                <input type="text" name="user_role" id="user_role" class="form-control" value="{{ $users->user_role }}" placeholder="Change Role ( administrator, admin_unit, user )">
            </div>

            <div>
                <button class="btn btn-success" type="submit">Update Data</button>
            </div>
        </form>
    </div>

@endsection
