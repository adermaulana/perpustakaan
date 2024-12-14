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
  <h1>Kategori</h1>
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
              <h5 class="card-title">Daftar Kategori</h5>
              <a  class="btn btn-success mb-3" href="/dashboard/buku/kategori/tambah">Tambah Kategori</a>
              <table class="table table-bordered" id="datatable-noexport">
            <thead>
            <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
                <th>Tombol Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($kategori as $data)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data->nama }} </td>
            <td>{{ $data->deskripsi }} </td>
            <td>
										<div class="actions">
											<a class="btn btn-success" href="/dashboard/buku/kategori/{{ $data->id }}/edit">
                      <span data-feather="edit"></span>
											</a>
                      <a class="delete btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?')" href="/dashboard/buku/kategori/{{ $data->id }}/delete" ><span data-feather="x-circle"></span></a>
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



<script type="text/javascript" id="javascript">

</script>

@endsection