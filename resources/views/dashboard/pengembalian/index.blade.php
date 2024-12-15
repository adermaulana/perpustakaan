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
            <h1>Pengembalian</h1>
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
                                    <h5 class="card-title">Daftar Buku</h5>
                                    <table class="table table-bordered" id="datatable-noexport">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul Buku</th>
                                                <th>Nama Anggota</th>
                                                <th>Tanggal Pinjam</th>
                                                <th>Tanggal Rencana Kembali</th>
                                                <th>Tanggal Kembali</th>
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
                                                    @if ($data->tanggal_kembali)
                                                        <td>{{ $data->tanggal_kembali }}</td>
                                                    @else
                                                        <td><span class="badge badge-danger">Buku belum dikembalikan</span>
                                                        </td>
                                                    @endif
                                                    @if ($data->status == 'dipinjam')
                                                        <td><span class="badge bg-warning">Dipinjam</span></td>
                                                    @else
                                                        <td><span class="badge bg-success">Dikembalikan</span></td>
                                                    @endif
                                                    <td>
                                                        <div class="actions">
                                                            @if ($data->status == 'dipinjam')
                                                                <button type="button" class="btn btn-success"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#returnModal{{ $data->id }}">
                                                                    Kembalikan Buku
                                                                </button>
                                                            @endif
                                                            @if ($data->status == 'dikembalikan')
                                                                <a class="delete btn btn-danger"
                                                                    onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?')"
                                                                    href="/dashboard/pengembalian/{{ $data->id }}/delete"><span
                                                                        data-feather="x-circle"></span></a>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>

                                                <div class="modal fade" id="returnModal{{ $data->id }}" tabindex="-1"
                                                    aria-labelledby="returnModalLabel{{ $data->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="returnModalLabel{{ $data->id }}">Konfirmasi
                                                                    Pengembalian Buku</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="/dashboard/pengembalian/{{ $data->id }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-body">
                                                                    <p>Apakah Anda yakin ingin mengembalikan buku
                                                                        <strong>{{ $data->buku->judul }}</strong>?
                                                                    </p>
                                                                    <div class="mb-3">
                                                                        <label for="tanggal_kembali"
                                                                            class="form-label">Tanggal Pengembalian</label>
                                                                        <input type="date" class="form-control"
                                                                            id="tanggal_kembali" name="tanggal_kembali"
                                                                            value="{{ date('Y-m-d') }}" required>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Batal</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Konfirmasi
                                                                        Pengembalian</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
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
