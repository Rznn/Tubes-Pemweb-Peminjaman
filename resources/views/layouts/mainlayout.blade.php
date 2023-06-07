<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') Pinjam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class = "main d-flex flex-column justify-content-between">
        <nav class="navbar navbar-dark navbar-expand-lg" style="background-color: darkcyan;">
            <div class="container-fluid">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <a class="navbar-brand" href="#">Pinjam</a>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                    </ul>

                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>

        <div class="body-content h-100">
            <div class="row g-0 h-100">
                <div class="sidebar col-lg-2 collapse d-lg-block" id="navbarTogglerDemo03">
                    @if (Auth::user()->user_role == 'administrator')
                        <a href="/admin_dashboard" @if (request()->route()->uri == 'admin_dashboard') class="active" @endif>Dashboard</a>
                        <a href="/items" @if (request()->route()->uri == 'items') class="active" @endif>Items</a>
                        <a href="/categories" @if (request()->route()->uri == 'categories' || request()->route()->uri == 'category_deleted_list' || request()->route()->uri == 'category_add' || request()->route()->uri == 'category_delete/{slug}' || request()->route()->uri == 'category_edit/{slug}') class="active" @endif>Categories</a>
                        <a href="/bookings" @if (request()->route()->uri == 'bookings') class="active" @endif>Bookings</a>
                        <a href="/list" @if (request()->route()->uri == 'list') class="active" @endif>List</a>
                        <a href="/users" @if (request()->route()->uri == 'users' || request()->route()->uri == 'user_edit') class="active" @endif>User List</a>
                        <a href="/profile" @if (request()->route()->uri == 'profile') class="active" @endif>Profile</a>
                        <a href="{{route('logout')}}">Sign out</a>
                    @elseif (Auth::user()->user_role == 'admin_unit')
                        <a href="/admin_unit_dashboard" @if (request()->route()->uri == 'admin_unit_dashboard') class="active" @endif>Dashboard</a>
                        <a href="/items" @if (request()->route()->uri == 'items') class="active" @endif>Items</a>
                        <a href="/bookings" @if (request()->route()->uri == 'bookings') class="active" @endif>Bookings</a>
                        <a href="/list" @if (request()->route()->uri == 'list') class="active" @endif>List</a>
                        <a href="/profile" @if (request()->route()->uri == 'profile') class="active" @endif>Profile</a>
                        <a href="{{route('logout')}}">Sign Out</a>
                    @else
                        <a href="/dashboard" @if (request()->route()->uri == 'dashboard') class="active" @endif>Dashboard</a>
                        <a href="/items" @if (request()->route()->uri == 'items') class="active" @endif>Items</a>
                        <a href="/bookings" @if (request()->route()->uri == 'bookings') class="active" @endif>Bookings</a>
                        <a href="/profile" @if (request()->route()->uri == 'profile') class="active" @endif>Profile</a>
                        <a href="{{route('logout')}}">Sign Out</a>
                        @endif
                </div>

                <div class="content p-5 col-lg-10">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
