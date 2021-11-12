@extends('layouts.argon')
@section('sidenav')
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link" href="{{url('logindosen')}}">
      <i class="ni ni-tv-2 text-primary"></i>
      <span class="nav-link-text">Dashboard</span>
    </a>
  </li>
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
        <h3 class="mb-0">Tugas</h3>
      </div>
      <div class="col text-right">
      <a href="" data-toggle="modal" data-target="#modalTambah">
        <button class="btn btn-icon btn-primary" type="button">
          <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
          <span class="btn-inner--text">Tugas Baru</span>
        </button>
      </a>
      </div>
    </div>
    @if(session('status'))
    <br>
      <div class="alert alert-success" role="alert">
          {{session('status')}}
      </div>
    @endif
    @if(session('error'))
    <br>
      <div class="alert alert-danger" role="alert">
          {{session('error')}}
      </div>
    @endif
  </div>
  <div class="card-body">
    <div class="row">
    @foreach($tugas as $t)
      <div class="col-4">
          {{$t->judul}}
      </div>
      <div class="col text-right">
      <div class="dropdown">
        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-ellipsis-v"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
            <form class="dropdown-item" method="POST" action="{{url('tugass/'.$t->idtugas)}}">
              @csrf
              @method('DELETE')
              <button class="dropdown-item" type="submit" onclick="if(!confirm('apakah anda yakin menghapus data ini?')) return false;">Hapus</button>
            </form>
          </div>
        </div>
      </div>
    @endforeach
    </div>
  </div>
  
</div>
<div class="card">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Pengumpulan</h3>
      </div>
      <br>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table align-items-center table-flush">
      <thead class="thead-light">
        <tr>
          <th>NIM</th>
          <th>Nama Mahasiswa</th>
          <th>Tanggal Pengumpulan</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $d)
          <tr>
            <td>{{$d->nim}}</td>
            <td>{{$d->namamhs}}</td>
            <td>{{$d->tanggal}}</td>
            <td class="text-right">
            <div class="dropdown">
                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                  <div class="dropdown-item">
                    <a class="dropdown-item" href="{{asset('tugas/'.$d->file)}}">Download File</a>
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
<!-- Modal -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTambahLabel">Tambah Tugas Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{url('tugass')}}">
      @csrf
        <div class="form-group">
          <label for="judul">Judul Tugas</label>
          <input class="form-control" placeholder="judul tugas" type="text" name="judul" id="judul">
        </div>
        <input type="hidden" value="{{request()->id}}" name="idpertemuan">
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

