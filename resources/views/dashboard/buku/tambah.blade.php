@extends('dashboard.layouts.main')

@section('container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Buku</h1>
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
                                                    <a class="btn btn-danger" href="/dashboard/buku"
                                                        enctype="multipart/form-data"> Batal</a>
                                                </div>
                                            </div>
                                        </div>
                                        @if (session('status'))
                                            <div class="alert alert-success mb-1 mt-1">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                        <form action="{{ route('tambah.buku') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row mt-3">
                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <h6>Judul Buku</h6>
                                                        <input type="text" name="judul" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <h6>Nama Penulis</h6>
                                                        <input type="text" name="penulis" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <h6>ISBN</h6>
                                                        <input type="text" name="isbn" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <h6>Kategori</h6>
                                                        <select class="form-control" name="kategori_id" required>
                                                            <option value="" disabled selected>Pilih Kategori</option>
                                                            @foreach ($kategori as $data)
                                                                <option value="{{ $data->id }}">{{ $data->nama }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <h6>Stok</h6>
                                                        <input type="number" name="stok" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <h6>Penerbit</h6>
                                                        <input type="text" name="penerbit" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <h6>Tahun Terbit</h6>
                                                        <input type="text" name="tahun_terbit" class="form-control"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <h6>Cover Image</h6>
                                                        <input type="file" name="gambar" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <h6>Deskripsi</h6>
                                                        <textarea class="form-control" name="deskripsi" id="" cols="30" rows="10" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <h6>Status</h6>
                                                        <select class="form-control" name="status" required>
                                                            <option value="" disabled selected>Pilih Status</option>
                                                            <option value="tersedia">Tersedia</option>
                                                            <option value="tidak tersedia">Tidak Tersedia</option>
                                                        </select>
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
