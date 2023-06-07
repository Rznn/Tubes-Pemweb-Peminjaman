@extends('layouts.mainlayout')

@section('title', 'Admin Dasboard')

@section('content')

    <h1>Welcome, {{Auth::user()->name}}!</h1>

    <div class="row mt-5">
        {{-- card items--}}
        <div class="col-lg-4">
            <div class="card-data items">
                <div class="row">
                    <div class="col-6"><i class="bi bi-box-seam"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center">
                        <div class="card-desc">Item</div>
                        <div class="card-count">{{$item_count}}</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- card category --}}
        <div class="col-lg-4">
            <div class="card-data categories">
                <div class="row">
                    <div class="col-6"><i class="bi bi-collection"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center">
                        <div class="card-desc">Category</div>
                        <div class="card-count">{{$category_count}}</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- card list --}}
        <div class="col-lg-4">
            <div class="card-data list">
                <div class="row">
                    <div class="col-6"><i class="bi bi-card-list"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center">
                        <div class="card-desc">List</div>
                        <div class="card-count">{{$list_count}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h2>Bookings</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">User</th>
                    <th scope="col">Item</th>
                    <th scope="col">Booking Date</th>
                    <th scope="col">Return Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Confirm Return Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>No Data</td>
                </tr>
            </tbody>
          </table>
    </div>
@endsection
