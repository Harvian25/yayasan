@extends('layouts.dashboardMaster')

@section('dashboard-content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Edit Category</h5>

        <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row mb-3">
                <label for="category_name" class="col-sm-2 col-form-label">Nama Kategori</label>
                <div class="col-sm-10">
                    <input type="text" name="category_name" id="category_name"
                        class="form-control" value="{{ old('category_name') ?? $category->category_name}}">
                    @error('category_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div class="row mb-3">
                <div class="row mt-3">
                    <label for="category_description"
                    class="col-sm-2 col-form-label">Deskripsi Kategori</label>
                    <div class="col-md-10">
                        <textarea class="form-control" id="category_description" rows="3" name = "category_description" required>{{old('category_description') ?? $category->category_description}}</textarea>
                        @error('category_description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>
            <div class="row mb-3">
                <div class="row mt-3">
                    <label for="category_image" class="col-sm-2 col-form-label">Foto Kategori</label>
                    <div class="col-md-10">
                        <input type="hidden" name="oldImage" value="{{ 'storage/' . $category->category_image }}">
                        <input type="file" class="form-control" id="category_image"
                            name="category_image">
                        @error('category_image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Update Button</label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

