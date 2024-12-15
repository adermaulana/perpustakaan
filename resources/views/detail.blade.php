@extends('layouts.main')
@section('container')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 mt-5">
                <img src="/{{ $book->gambar }}" class="img-fluid rounded shadow-lg" alt="{{ $book->judul }}"
                    style="max-height: 500px; object-fit: cover;">
            </div>
            <div class="col-md-8 mt-5 mb-5">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h2 class="mb-0">{{ $book->judul }}</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-borderless">
                                    <tr>
                                        <th class="ps-0">Penulis</th>
                                        <td>{{ $book->penulis }}</td>
                                    </tr>
                                    <tr>
                                        <th class="ps-0">ISBN</th>
                                        <td>{{ $book->isbn }}</td>
                                    </tr>
                                    <tr>
                                        <th class="ps-0">Kategori</th>
                                        <td>{{ $book->kategori->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th class="ps-0">Penerbit</th>
                                        <td>{{ $book->penerbit }}</td>
                                    </tr>
                                    <tr>
                                        <th class="ps-0">Tahun Terbit</th>
                                        <td>{{ $book->tahun_terbit }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-borderless">
                                    <tr>
                                        <th class="ps-0">Stok</th>
                                        <td>
                                            @if ($book->stok > 0)
                                                <span class="badge bg-success">{{ $book->stok }} tersedia</span>
                                            @else
                                                <span class="badge bg-danger">Tidak tersedia</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="ps-0">Status</th>
                                        <td>
                                            @if ($book->stok > 0)
                                                <span class="text-success">Dapat Dipinjam</span>
                                            @else
                                                <span class="text-danger">Tidak Dapat Dipinjam</span>
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <h4 class="mt-4 mb-2">Deskripsi</h4>
                        <p class="text-muted">{{ $book->deskripsi }}</p>

                        <div class="alert alert-info mt-4" role="alert">
                            <h5 class="alert-heading">Ingin Meminjam Buku?</h5>
                            <p class="mb-0">Silakan hubungi admin kami untuk proses peminjaman:</p>
                            <ul class="mb-0">
                                <li>Telepon: +62 81354665042</li>
                                <li>WhatsApp: +62 81354665042</li>
                                <li>Email: admin@sekolahxx.sch.id</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
