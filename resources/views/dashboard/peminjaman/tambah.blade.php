@extends('dashboard.layouts.main')

@section('container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Peminjaman</h1>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- Recent Sales -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">

                                <div class="card-body">
                                    <h5 class="card-title">{{ $title }}</h5>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12 margin-tb">
                                                <div class="pull-left">
                                                </div>
                                                <div class="pull-right">
                                                    <a class="btn btn-danger" href="/dashboard/anggota"
                                                        enctype="multipart/form-data"> Batal</a>
                                                </div>
                                            </div>
                                        </div>
                                        @if (session('status'))
                                            <div class="alert alert-success mb-1 mt-1">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                        <form action="{{ route('tambah.peminjaman') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="mt-3">
                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <h6>Nama Anggota</h6>
                                                        <select class="form-control" name="id_buku" required>
                                                            <option value="" disabled selected>Pilih Buku</option>
                                                            @foreach ($buku as $data)
                                                                <option value="{{ $data->id }}">{{ $data->judul }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <h6>Nama Anggota</h6>
                                                        <select class="form-control" name="id_anggota" required>
                                                            <option value="" disabled selected>Pilih Anggota</option>
                                                            @foreach ($anggota as $data)
                                                                <option value="{{ $data->id }}">{{ $data->nama }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <h6>Tanggal Peminjaman</h6>
                                                        <input type="date" class="form-control" name="tanggal_pinjam"
                                                            value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <h6>Tanggal Pengembalian</h6>
                                                        <input type="date" name="tanggal_kembali" class="form-control">
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <button style="margin-left:-15px;" type="submit"
                                                                class="btn btn-primary col-6 me-1">Submit</button>
                                                        </div>
                                                    </div>
                                        </form>
                                    </div>


                                </div>

                            </div>
                        </div><!-- End Recent Sales -->

                    </div>
                </div><!-- End columns -->

            </div>
        </section>

    </main><!-- End #main -->
@endsection
