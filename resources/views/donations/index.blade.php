@extends('layouts.donationMaster')
@section('category_or_items')
    <li class="nav-item">
        <a href="/donation/all-items" class="nav-link">Semua Barang</a>
    </li>
@endsection
@section('notifications')
    <li class="nav-item dropdown">

        <a class="nav-link" href="#" data-bs-toggle="dropdown">
            Pesan
            <span class="bg-primary badge-number">{{ $unreadNotifications->count() }}</span>
        </a>

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
        </ul>

    </li>
@endsection
@section('donation')
    <div class="container">
        <div class="my-3">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show d-flex align-items-center shadow-lg p-3 mb-4 rounded"
                    role="alert" style="background-color: #d4edda; border-color: #c3e6cb;">
                    <div class="me-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-check-circle-fill text-success me-2" viewBox="0 0 16 16">
                            <path
                                d="M16 8a8 8 0 1 1-16 0 8 8 0 0 1 16 0zM6.293 9.293l-3-3a1 1 0 0 1 1.414-1.414L7 6.586l4.293-4.293a1 1 0 0 1 1.414 1.414l-5 5a1 1 0 0 1-1.414 0z" />
                        </svg>
                        <strong>Success:</strong> {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>

        <div class="container" style="min-height: 100vh">
            <div class="d-flex justify-content-center mb-5">
                

                    <h2 class="mb-0 text-dark">Kategori Barang yang Kami Butuhkan &#128522;</h2>

                
            </div>
            <div class="row">


                @foreach ($categories as $category)
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-4 d-flex justify-content-center">
                        <a href="/donation/category/{{ $category->id }}" class="card-link">
                            <div class="category-card">
                                <div class="content">
                                    <div class="back">
                                        <div class="back-content text-center">
                                            <img src="{{ asset('storage/' . $category->category_image) }}" alt=""
                                                class="img-fluid" style="max-height: 100px; width: auto;">
                                            <strong>{{ $category->category_name }}</strong>
                                            <p class="small">{{ $category->category_description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    </div>

    </div>
@endsection
