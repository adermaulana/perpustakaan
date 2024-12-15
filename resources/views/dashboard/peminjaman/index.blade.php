@extends('dashboard.layouts.main')

@section('container')
<main id="main" class="main">

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show col-lg-12" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

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
                                <h5 class="card-title">Daftar Peminjaman</h5>
                                <a class="btn btn-success mb-3" href="/dashboard/peminjaman/tambah">Tambah
                                    Peminjaman</a>
                                <table class="table table-bordered" id="datatable-noexport">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul Buku</th>
                                            <th>Nama Anggota</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Tanggal Rencana Kembali</th>
                                            <th>Status</th>
                                            <th>Tombol Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($peminjaman as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->buku->judul }} </td>
                                                <td>{{ $data->anggota->nama }} </td>
                                                <td>{{ $data->tanggal_pinjam }} </td>
                                                <td>{{ $data->tanggal_rencana_pengembalian }} </td>
                                                @if ($data->status == 'dipinjam')
                                                    <td><span class="badge bg-warning">Dipinjam</span></td>
                                                @else
                                                    <td><span class="badge bg-success">Dikembalikan</span></td>
                                                @endif
                                                <td>
                                                    <div class="actions">
                                                        @if($data->status == 'dipinjam')
                                                        <a class="btn btn-success"
                                                            href="/dashboard/peminjaman/{{ $data->id }}/edit">
                                                            <span data-feather="edit"></span>
                                                        </a>
                                                        @endif
                                                        <a class="delete btn btn-danger"
                                                            onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?')"
                                                            href="/dashboard/peminjaman/{{ $data->id }}/delete"><span
                                                                data-feather="x-circle"></span></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div><!-- End Recent Sales -->

                </div>
            </div><!-- End columns -->

        </div>
    </section>

</main><!-- End #main -->



<script type="text/javascript" id="javascript"></script>
@endsection
