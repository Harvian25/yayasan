@extends('layouts.dashboardMaster')

@section('dashboard-content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Create News</h5>

        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label for="title" class="col-sm-2 col-form-label">Judul Berita</label>
                <div class="col-sm-10">
                    <input type="text" name="title" id="title"
                        class="form-control" value="{{ old('title') }}">
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div class="row mb-3">
                <div class="row mt-3">
                    <label for="content"
                    class="col-sm-2 col-form-label">konten</label>
                    <div class="col-md-10">
                        <textarea class="form-control" id="content" rows="3" name = "content" required>{{old('content')}}</textarea>
                        @error('content')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>
            <div class="row mb-3">
                <div class="row mt-3">
                    <label for="image" class="col-sm-2 col-form-label">Foto Berita</label>
                    <div class="col-md-10">
                        <input type="file" class="form-control" id="image"
                            name="image">
                        @error('image')
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