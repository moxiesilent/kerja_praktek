@extends('layouts.argon')
@section('content')
<h2>Tabel Prestasi</h2><br>
<div class="card">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Tabel Prestasi</h3>
      </div>
      <div class="col text-right">
      <a href="{{url('prestasis/create')}}" class="btn-sm btn-primary" role="button">Tambah prestasi</a>
      </div>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table align-items-center table-flush">
      <thead class="thead-light">
        <tr>
          <th scope="col">Nomor</th>
          <th scope="col">Nama kegiatan</th>
          <th scope="col">Tahun</th>
          <th scope="col">Tingkat</th>
          <th scope="col">Prestasi yang dicapai</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $d)
          <tr>
            <td>{{$d->idprestasi}}</td>
            <td>{{$d->namakegiatan}}</td>
            <td>{{$d->tahun}}</td>
            <td>{{$d->tingkat}}</td>
            <td>{{$d->prestasi}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection
