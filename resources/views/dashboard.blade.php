@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')



    <div
        style="background: black; padding: 20px; border-radius: 10px; text-align: center; margin-bottom: 80px; margin-top: 40px;">
        @if (Auth::user()->role == 'admin')
        <h1 style="color: #f8f5f5;">Welcome, <span style="color: #f8f5f5; font-weight: bold;">Admin</span>!</h1>
        @endif
        @if (Auth::user()->role == 'petugas')
        <h1 style="color: #f8f5f5;">Welcome, <span style="color: #f8f5f5; font-weight: bold;">Petugas</span>!</h1>
        @endif
        <p style="color: #fffafa;">Welcome to Store majeng kasir</p>

    </div>
    <!-- Summary section -->

    <div class="column">
        <div class="row mb-4 mt-4">
            <div class="col-md-6">
                <div class="card bg-success text-white card-scale">
                    <div class="card-header">
                        <h3 class="card-title text-center">Total Customers</h3>
                    </div>
                    <div class="card-body">
                        <strong class="card-text">{{ $totalCustomers }}</strong>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card bg-info text-white card-scale">
                    <div class="card-header">
                        <h3 class="card-title text-center">Total Produk</h3>
                    </div>
                    <div class="card-body">
                        <strong class="card-text">{{ $totalProduk }}</strong>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-4">
            <div class="card bg-primary text-white card-scale mt-4">
                <div class="card-header">
                    <h3 class="card-title text-center">Total Penjualan</h3>
                </div>
                <div class="card-body">
                    <strong class="card-text">Rp {{ number_format($totalPenjualan, 0, ',', '.') }}</strong>
                </div>
            </div>
        </div>
        <hr style="margin-bottom: 100px">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('assets/img/crousel/depan.jpg') }}" class="d-block w-100" alt="depan">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/img/crousel/buah.jpg') }}" class="d-block w-100" alt="buah">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/img/crousel/sayur.jpg') }}" class="d-block w-100" alt="sayur">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/img/crousel/sayur2.jpg') }}" class="d-block w-100" alt="sayur2">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/img/crousel/ikan.jpg') }}" class="d-block w-100" alt="ikan">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/img/crousel/bumbu.jpg') }}" class="d-block w-100" alt="bumbu">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <a
            href="https://www.google.com/maps/place/Jl.+Pamulang+Elok+Raya,+16517/@-6.3605838,106.7313365,17z/data=!3m1!4b1!4m6!3m5!1s0x2e69ef66fba1096f:0x34d22e651816cba1!8m2!3d-6.3605838!4d106.7313365!16s%2Fg%2F1ydpdk74f?entry=ttu">
            <p class="text-center"><i class="fa-solid fa-location-dot mt-4"></i> Perumahan Pamulang elok Blok C3 No. 9,
                Pondok Petir</p>
        </a>
    </div>



@endsection
