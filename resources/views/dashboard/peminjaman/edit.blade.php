@extends('dashboard.layouts.main')

@section('container')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Edit Peminjaman</h1>
        </div>

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $title }}</h5>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12 margin-tb">
                                                <div class="pull-right">
                                                    <a class="btn btn-danger" href="/dashboard/peminjaman"> Batal</a>
                                                </div>
                                            </div>
                                        </div>
                                        @if (session('status'))
                                            <div class="alert alert-success mb-1 mt-1">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                        <form action="{{ route('edit.peminjaman', $peminjaman->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="mt-3">
                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <h6>Judul Buku</h6>
                                                        <select class="form-control" name="id_buku" required>
                                                            <option value="" disabled>Pilih Buku</option>
                                                            @foreach ($buku as $data)
                                                                <option value="{{ $data->id }}" 
                                                                    {{ $data->id == $peminjaman->id_buku ? 'selected' : '' }}>
                                                                    {{ $data->judul }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <h6>Nama Anggota</h6>
                                                        <input type="text" class="form-control" 
                                                               value="{{ $peminjaman->anggota->nama }}" 
                                                               readonly>
                                                        <input type="hidden" name="id_anggota" 
                                                               value="{{ $peminjaman->id_anggota }}">
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <h6>Tanggal Peminjaman</h6>
                                                        <input type="date" class="form-control" name="tanggal_pinjam"
                                                               value="{{ $peminjaman->tanggal_pinjam }}">
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <h6>Tanggal Rencana Pengembalian</h6>
                                                        <input type="date" name="tanggal_rencana_pengembalian" 
                                                               class="form-control"
                                                               value="{{ $peminjaman->tanggal_rencana_pengembalian }}">
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <button style="margin-left:-15px;" type="submit"
                                                                class="btn btn-primary col-6 me-1">Update</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection