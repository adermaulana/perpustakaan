@extends('layouts.main')

@section('container')
<section class="hero">
    <div class="intro-text mt-5">
        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show col-lg-10" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <h1>
            <span class="hear">Sistem Informasi Perpustakaan</span> <br />
            <span class="connecting">Sekolah XX</span>
        </h1>

        <p>
            Website ini digunakan untuk membantu siswa dan staf dalam <br />
            mengakses katalog buku, melakukan peminjaman, dan <br>
            mengelola kegiatan perpustakaan di Sekolah XX
        </p>

        <a class="button btn red" href="/">Jelajahi Katalog</a>

        <div class="row mt-4">
            <div class="col col-3">
                <h6>Total Buku</h6>
                <h2>1000</h2>
            </div>
            <div class="col col-3">
                <h6>Buku Dipinjam</h6>
                <h2>100</h2>
            </div>
        </div>
    </div>

    <div class="i-frame me-5">
        <img width="500" src="/img/ilustrasi.jpg" alt="Ilustrasi Perpustakaan">
    </div>
</section>

<br><br><br><br><br>
<hr>
@endsection