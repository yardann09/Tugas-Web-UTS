@extends('template.template')

@section('judul')
    Beranda
@endsection

@section('konten')
<div class="container mt-3">
    <div class="jumbotron">
        <h1 class="display-4">Hello, {{ auth()->user()->name }}</h1>
        <p class="lead">Selamat Datang di Sistem Pendafatran Panitia Kegiatan mmm</p>
        <hr class="my-4">
        <p>Ujian Tengah Semester Mata Kuliah | Pemrograman Web Lanjut Sistem Informasi </p>
        @if (auth()->user()->role == 'admin')
            <a class="btn btn-primary btn-lg" href="{{ route('admin.kegiatan.index') }}" role="button">Kelola Kegiatan</a>  
        @endif
    </div>

    @if (auth()->user()->role == 'user')
        <div class="table-responsive mt-5">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">NO</th>
              <th scope="col">Kategori</th>
              <th scope="col">Kegiatan</th>
              <th scope="col">Lokasi</th>
              <th scope="col">Kuota</th>
              <th scope="col">#</th>
            </tr>
          </thead>
          <tbody>
            <tr>
            @forelse ($kegiatan as $item)
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->kategori->nama_kategori }}</td>
              <td>{{ $item->nama_kegiatan }}</td>
              <td>{{ $item->lokasi }}</td>
              <td>{{ $item->kuota }}</td>
              <td><a class="btn btn-primary btn-sm" href="#" role="button">Daftar</a></td>
              <td></td>
            </tr>
            @empty
                <span>Tidak Ada Data</span>
            @endforelse
           
          </tbody>
        </table>
    </div>
    @endif
</div>
@endsection

