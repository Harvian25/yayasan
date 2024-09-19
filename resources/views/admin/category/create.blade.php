@extends('layouts.dashboardMaster')

@section('dashboard-content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Create Category</h5>

        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label for="category_name" class="col-sm-2 col-form-label">Nama Kategori</label>
                <div class="col-sm-10">
                    <input type="text" name="category_name" id="category_name"
                        class="form-control" value="{{ old('category_name') }}">
                    @error('category_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div class="row mb-3">
                <div class="row mt-3">
                    <label for="category_description"
                    class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-md-10">
                        <textarea class="form-control" id="category_description" rows="3" name = "category_description" required>{{old('category_description')}}</textarea>
                        @error('category_description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>
            <div class="row mb-3">
                <div class="row mt-3">
                    <label for="category_image" class="col-sm-2 col-form-label">Foto Kategori Barang</label>
                    <div class="col-md-10">
                        <input type="file" class="form-control" id="category_image"
                            name="category_image">
                        @error('category_image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row mb-3 mt-3">
                <label class="col-sm-2 col-form-label">Submit Button</label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection