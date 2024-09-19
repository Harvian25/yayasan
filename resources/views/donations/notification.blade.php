@extends('layouts.donationMaster')

@section('donation')
<div class="container my-5 p-4 bg-light rounded shadow-sm">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">Notification Detail</h2>
            <div class="card p-4 mb-4">
                <p class="medium"> {{ $notification->data['message'] }}</p>
         
            </div>
            
            <div class="card p-4 mb-4">
                <h4>Data Donasi:</h4>
                <p><strong>Nama Item:</strong> {{$donation->item->name}}</p>
                <p><strong>Kategori:</strong> {{$donation->item->category->category_name}}</p>
                <p><strong>Lokasi:</strong> {{$donation->location}}</p>
                
                <div class="d-flex justify-content-start my-3">
                    <div class="me-3">
                        <img src="{{ url('storage/' . $donation->image) }}" class="img-thumbnail" height="100px" width="100px">
                    </div>
                    <div>
                        <img src="{{ url('storage/' . $donation->selfie_image) }}" class="img-thumbnail" height="100px" width="100px">
                    </div>
                </div>
                
                <p><strong>Deskripsi:</strong> {{$donation->description}}</p>
            </div>
            
            <p class="text-muted"><strong>Received:</strong> {{ $notification->created_at->diffForHumans() }}</p>
            
            <a href="{{ route('notifications.markAsRead', $notification->id) }}" class="btn btn-primary mt-3">Tandai sudah dibaca</a>
        </div>
    </div>
</div>
@endsection
