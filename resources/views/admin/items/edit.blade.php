@extends('layouts.dashboardMaster')

@section('dashboard-content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Barang Yang Dibutuhkan</h5>

            <form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Nama Barang</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ old('name', $item->name ?? '') }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="description" rows="3" name="description" required>{{ old('description', $item->description ?? '') }}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <p class="medium">Foto Lama</p>
                    @if(!empty($item->image))
                        <img src="{{ url('storage/' . $item->image) }}"  height="200px" width="200px">
                    @else
                        <p class="text-muted">No image available.</p>
                    @endif
                </div>

                <div class="row mb-3">
                    <label for="image" class="col-sm-2 col-form-label">Foto Barang Yang Dibutuhkan</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="image" name="image">
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="category_id" class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="category_id" name="category_id" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ (old('category_id', $item->category_id ?? '') == $category->id) ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="amount" class="col-sm-2 col-form-label">Jumlah Barang yang Dibutuhkan</label>
                    <div class="col-sm-10">
                        <input type="number" name="amount" id="amount" class="form-control"
                            value="{{ old('amount', $item->amount ?? '') }}">
                        @error('amount')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
