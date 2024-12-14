@extends('dashboard.layouts.main')

@section('container')
<main id="main" class="main">

@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show col-lg-4" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="pagetitle">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">Dashboard Perpustakaan</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">

        <!-- Total Buku Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card revenue-card">
            <div class="card-body">
              <h5 class="card-title">Total Koleksi Buku</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-book"></i>
                </div>
                <div class="ps-3">
                  <h6>{{ $total_buku }}</h6>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Total Buku Card -->

        <!-- Buku Dipinjam Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card revenue-card">
            <div class="card-body">
              <h5 class="card-title">Buku Sedang Dipinjam</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-journal-check"></i>
                </div>
                <div class="ps-3">
                  <h6>15</h6>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Buku Dipinjam Card -->

        <!-- Total Anggota Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card revenue-card">
            <div class="card-body">
              <h5 class="card-title">Total Anggota Perpustakaan</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <h6>200</h6>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Total Anggota Card -->

        <!-- Kategori Buku Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card revenue-card">
            <div class="card-body">
              <h5 class="card-title">Kategori Buku</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-tags-fill"></i>
                </div>
                <div class="ps-3">
                  <h6>5</h6>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Kategori Buku Card -->

        <!-- Buku Dikembalikan Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card revenue-card">
            <div class="card-body">
              <h5 class="card-title">Buku Dikembalikan</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-journal-bookmark-fill"></i>
                </div>
                <div class="ps-3">
                  <h6>12</h6>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Buku Dikembalikan Card -->

      </div>
    </div><!-- End Left side columns -->

  </div>
</section>

</main><!-- End #main -->
@endsection