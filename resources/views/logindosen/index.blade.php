@extends('layouts.argon')
@section('sidenav')
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link active" href="{{url('matakuliahDosen')}}">
      <i class="ni ni-tv-2 text-primary"></i>
      <span class="nav-link-text">Matakuliah</span>
    </a>
  </li>
</ul>
@endsection
@section('nama')
<span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->name }}</span>
@endsection
@section('content')
<h2>Daftar Matakuliah</h2><br>
<div class="card">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Daftar Matakuliah</h3>
      </div>
      <br>
    </div>
    @if(session('status'))
      <div class="alert alert-success" role="alert">
          {{session('status')}}
      </div>
    @endif
    @if(session('error'))
      <div class="alert alert-danger" role="alert">
          {{session('error')}}
      </div>
    @endif
  </div>
  <div class="table-responsive py-4">
    <table class="table table-flush" id="datatable-basic">
      <thead class="thead-light">
        <tr>
          <th>Kode Matakuliah</th>
          <th>Nama Matakuliah</th>
          <th>Kelas Paralel</th>
          <th>Hari</th>
          <th>Jam Mulai</th>
          <th>Jam Berakhir</th>
          <th>SKS</th>
          <th>Ruangan</th>
          <th>Semester</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $d)
          <tr>
            <td>{{$d->kodemk}}</td>
            <td>{{$d->namamk}}</td>
            <td>{{$d->kp}}</td>
            <td>{{$d->hari}}</td>
            <td>{{$d->jammulai}}</td>
            <td>{{$d->jamberakhir}}</td>
            <td>{{$d->sks}}</td>
            <td>{{$d->ruangan}}</td>
            <td>{{$d->semester}}</td>
            <td class="text-right">
              <div class="dropdown">
                  <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <div class="dropdown-item">
                      <a class="dropdown-item" href="{{url('matakuliahDosen/'.$d->idmengajars)}}">Pilih</a>
                    </div>
                  </div>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection

