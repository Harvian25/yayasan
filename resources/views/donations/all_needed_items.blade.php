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
    <div class="container mt-5" style="min-height: 100vh;">
        <div class="row justify-content-center mb-5">
            <div class="col-md-6">
                <form action="/donation/all-items" class="d-flex" method="GET">
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    @if (request('user'))
                        <input type="hidden" name="user" value="{{ request('user') }}">
                    @endif

                    <input type="text" class="form-control me-2" placeholder="Cari Barang...." name="search"
                        value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary">Cari Barang</button>

                </form>
            </div>
        </div>
    
        <div class="row justify-content-center">
            @if ($items->count())
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
                                    <h6 class="card-text text-primary">Jumlah yang dibutuhkan: {{$item->amount}}</h6>
                                    <p class="card-text text-white">{{ $item->description }}</p>
                                </div>
                            </div>


                        </a>
                    </div>
                @endforeach
            @else
                <p class="text-center fs-4">Barang tidak ditemukan</p>
            @endif



        </div>
        <div class="d-flex mt-10">
            {{ $items->links() }}
        </div>
    </div>
@endsection
