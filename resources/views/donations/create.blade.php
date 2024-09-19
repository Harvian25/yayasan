@extends('layouts.donationMaster')
@section('donation')
    <div class="container mt-5" style="min-height: 100vh;">
        <form action="{{ route('storeDonation') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="item_id" value="{{ $item->id }}">
            <input type="hidden" name="donor_id" value="{{ auth()->user()->id }}">

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="name" name="name" required
                    value="{{ $item->name }}" placeholder="Nama Barang" disabled>
                <label for="name">Nama Barang</label>

            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="category" name="category" required
                    value="{{ $item->category->category_name }}" disabled>
                <label for="category">Kategori Barang</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="location" name="location" required
                    value="{{ old('location') }}" placeholder="Lokasi">
                <label for="location">Lokasi</label>
                @error('location')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="amount" name="amount" required
                    value="{{ old('amount') }}" placeholder="Jumlah barang yang didonasikan" >
                <label for="amount">Jumlah barang yang didonasikan</label>
                @error('amount')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image">Foto Barang</label>
                <input type="file" class="form-control" id="image" name="image" placeholder="Foto Barang">
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image_selfie">Foto Selfie Bersama Barang</label>
                <input type="file" class="form-control" id="image_selfie" name="image_selfie" placeholder="Foto Barang">
                @error('image_selfie')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" id="description" rows="3" name="description" placeholder="Deskripsi">{{ old('description') }}</textarea>
                <label for="description">Ceritakan Kondisi Barang (Opsional)</label>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>
@endsection
