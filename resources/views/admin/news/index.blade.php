@extends('layouts.dashboardMaster')

@section('dashboard-content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Data Berita</h5>
        @if (session()->has('success'))
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>
        @endif

        @if (session()->has('error'))
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>
        @endif

        <a href="/news/create" class="btn btn-primary mb-3">Create</a>

        <!-- Table with stripped rows -->
        <table id="table-news" class="table table-striped datatable" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul Berita</th>
                    <th scope="col">Konten Berita</th>
                    <th scope="col">Gambar yang akan ditampilkan</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($news as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->content }}</td>
                    <td><img src="{{ url('storage/' . $item->image) }}" class="img-fluid" height="100px" width="100px"></td>
                    <td>
                        @if (auth()->user()->level == 'admin')
                        <a href="/news/{{ $item->id }}/edit"
                            class="btn btn-primary mb-1">Edit</a>
                        <form action="/news/{{ $item->id }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Apakah kamu yakin?')">Delete</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        <!-- End Table with stripped rows -->

    </div>
</div>
@endsection