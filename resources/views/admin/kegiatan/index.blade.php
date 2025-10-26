@extends('template.template')

@section('judul')
    Beranda
@endsection

@section('konten')
<div class="container mt-3">
    <a class="btn btn-success btn-lg mt-5" href="{{ route('admin.kegiatan.create') }}" role="button">Tambah Kegiatan</a>  
    <div class="table-responsive mt-5">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">NO</th>
              <th scope="col">Kategori</th>
              <th scope="col">Kegiatan</th>
              <th scope="col">Lokasi</th>
              <th scope="col">Kuota</th>
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
            </tr>
            @empty
                <span>Tidak Ada Data</span>
            @endforelse
           
          </tbody>
        </table>
    </div>
@endsection
