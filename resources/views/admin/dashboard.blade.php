@extends('layouts.dashboardMaster')

@section('dashboard-content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">DATA PENGAJUAN</h5>
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
        @if (session()->has('warning'))
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ session('warning') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif
        <!-- Table with stripped rows -->
        <table id="table-donation" class="table table-striped datatable" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Kategori Barang</th>
                    <th scope="col">lokasi</th>
                    <th scope="col">No WA Pendonasi</th>
            
                    <th scope="col">Foto Barang</th>
                    <th scope="col">Foto Selfie Barang</th>

                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($donations as $donation)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $donation->item->name }}</td>
                        <td>{{ $donation->item->category->category_name }}</td>
                        <td>{{ $donation->location }}</td>
                        <td>{{ $donation->donor->phone_number }}</td>
                        <td><img src="{{ url('storage/' . $donation->image) }}" class="img-fluid" height="100px" width="100px"></td>
                        <td><img src="{{ url('storage/' . $donation->selfie_image) }}" class="img-fluid" height="100px" width="100px"></td>
                        <td>
                            @if (auth()->user()->level == 'admin')
                                @if ($donation->status === 'disapproved')
                                    <form method="POST"
                                        action="{{ route('donations.approve', $donation) }}">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-primary" type="submit">Konfirmasi</button>
                                    </form>
                                @else
                                    <button class="btn btn-danger" disabled="disabled">Sudah Dikonfirmasi</button> 
                                @endif
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