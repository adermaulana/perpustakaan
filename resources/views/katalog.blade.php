@extends('layouts.main')

@section('container')
<section class="hero">
    <div class="intro-text mt-5">
        @if ($message = Session::get('error'))
        <div id="alert" class="alert alert-danger alert-dismissible fade show col-lg-10" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <h1>
            <span class="hear">Sistem Informasi Perpustakaan</span> <br />
            <span class="connecting">Sekolah XX</span>
        </h1>

        <p>
            Website ini digunakan untuk membantu siswa dan staf dalam 
            mengakses katalog buku, melakukan peminjaman, dan 
            mengelola kegiatan perpustakaan di Sekolah XX
        </p>

        <div class="row mb-4">
            <div class="col-lg-6">
                <form action="{{ route('books.search') }}" method="GET" class="d-flex">
                    <input class="form-control me-2" type="search" name="query" placeholder="Cari buku..." aria-label="Search">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="book-catalog container mt-5">
    <div class="row">
        @forelse ($books as $book)
        <div class="col-md-4 mb-4 mt-5">
            <div class="card h-100">
                <img src="/{{ $book->gambar }}"
                     class="card-img-top" 
                     alt="{{ $book->judul }}"
                     style="height: 300px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $book->judul }}</h5>
                    <p class="card-text">
                        <strong>Penulis:</strong> {{ $book->penulis }}<br>
                        <strong>Kategori:</strong> {{ $book->kategori->nama }}<br>
                        <strong>Ketersediaan:</strong> 
                        @if ($book->stok > 0)
                            <span class="text-success">Tersedia ({{ $book->stok }} buku)</span>
                        @else
                            <span class="text-danger">Tidak Tersedia</span>
                        @endif
                    </p>
                    <a href="{{ route('katalog.detail', $book->judul) }}" class="btn btn-primary">Detail Buku</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 mt-5">
            <div class="alert alert-info text-center">
                Tidak ada buku yang ditemukan.
            </div>
        </div>
        @endforelse
    </div>

    @if ($books->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $books->links() }}
    </div>
    @endif
</section>
@endsection