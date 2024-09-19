@extends('layouts.donationMaster')
@section('category_or_items')
    <li class="nav-item">
        <a href="/donation/category" class="nav-link">Kategori</a>
    </li>
@endsection
@section('notifications')
    <li class="nav-item dropdown">

        <a class="nav-link" href="#" data-bs-toggle="dropdown">
            Pesan
            <span class="badge bg-primary badge-number">{{ $unreadNotifications->count() }}</span>
        </a><!-- End Notification Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
                You have {{ $unreadNotifications->count() }} new notifications
                <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>

            @forelse ($unreadNotifications as $notification)
                <li class="notification-item">
                    <i class="bi bi-info-circle text-primary"></i>
                    <div>
                        <h4>{{ $notification->data['message'] }}</h4>
                        <p>Click <a href="{{ route('notifications.detail', $notification->id) }}">here</a> to view details.</p>
                        <p>{{ $notification->created_at->diffForHumans() }}</p>
                    </div>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
            @empty
                <li class="notification-item">
                    <div>
                        <p>No new notifications</p>
                    </div>
                </li>
            @endforelse

            <li class="dropdown-footer">
                <a href="#">Show all notifications</a>
            </li>
        </ul><!-- End Notification Dropdown Items -->

    </li><!-- End Notification Nav -->
@endsection
@section('donation')
    <div class="container mt-5" style="min-height: 100vh;">
        <div class="d-flex justify-content-center mb-5">
                

            <h2 class="mb-0 text-dark">Barang dengan kategori {{$category->category_name}} &#128522;</h2>

        
    </div>
        <div class="row justify-content-center">

            @foreach ($items as $item)
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-4 d-flex justify-content-center">
                    <a href="/donation/donate/{{ $item->id }}">
                        <div class="card bg-dark" style="width: 18rem; position: relative;">
                            <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top"
                                style="height: 200px; object-fit: cover;">

                            <div class="badge position-absolute text-white p-3"
                                style="top: 10px; right: 10px;  background-color: rgba(0,0,0,0.5);">
                                {{ $item->category->category_name }}
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-white">{{ $item->name }}</h5>
                                <h6 class="card-text text-primary">Jumlah yang dibutuhkan: {{ $item->amount }}</h6>
                                <p class="card-text text-white">{{ $item->description }}</p>
                            </div>
                        </div>


                    </a>
                </div>
            @endforeach


        </div>

    </div>
@endsection
