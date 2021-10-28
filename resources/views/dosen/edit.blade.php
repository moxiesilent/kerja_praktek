@extends('layouts.argon')
@section('sidenav')
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link " href="examples/dashboard.html">
      <i class="ni ni-tv-2 text-primary"></i>
      <span class="nav-link-text">Dashboard</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('prestasi')}}">
      <i class="ni ni-planet text-orange"></i>
      <span class="nav-link-text">Prestasi</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="{{url('dosen')}}">
      <i class="ni ni-pin-3 text-primary"></i>
      <span class="nav-link-text">Dosen</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('matakuliah')}}">
      <i class="ni ni-single-02 text-yellow"></i>
      <span class="nav-link-text">Matakuliah</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('mahasiswa')}}">
      <i class="ni ni-bullet-list-67 text-default"></i>
      <span class="nav-link-text">Mahasiswa</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('semester')}}">
      <i class="ni ni-key-25 text-info"></i>
      <span class="nav-link-text">Semester</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('mengajar')}}">
      <i class="ni ni-circle-08 text-pink"></i>
      <span class="nav-link-text">Jadwal</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('jurnal')}}">
      <i class="ni ni-send text-dark"></i>
      <span class="nav-link-text">Jurnal</span>
    </a>
  </li>
</ul>
@endsection
@section('content')
<h2>Tabel Prestasi</h2><br>

<div class="card">
  <div class="card-header border-0">
    <div class="row align-items-center">
    <div class="col">
        <h3 class="mb-0">Daftar Dosen</h3>
      </div>
      <div class="col text-right">
      </div>
    </div>
  </div>
    <form method="POST" action="{{url('dosens/'.$data->nip)}}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
        <div class="form-group">
          <label for="nip">NIP</label>
          <input type="text" class="form-control" id="nip" name="nip" value="{{$data->nip}}">
        </div>
        <div class="form-group">
          <label for="nama">Nama Lengkap</label>
          <input type="text" class="form-control" id="nama" name="nama" value="{{$data->nama}}">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="{{$data->email}}">
        </div>
        <div class="form-group">
          <label for="tanggallahir">Tanggal Lahir</label>
          <input type="date" class="form-control datepicker" id="tanggallahir" name="tanggallahir" value="{{$data->tanggallahir}}">
        </div>
        <div class="form-group">
          <label for="jabatan">Jabatan</label>
          <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{$data->jabatan}}">
        </div>
        <div class="form-group">
          <label for="bidang">Bidang Keahlian</label>
          <textarea class="form-control" id="bidang" name="bidang">{{$data->bidangkeahlian}}</textarea>
        </div>
        <div class="form-group">
          <label for="foto">Foto</label>
          <input type="file" class="form-control" id="foto" name="foto">
          <img src="{{asset('images/'.$data->foto)}}" height='100px'/>
        </div>
      </div>
            <div>
                <a href="{{url('dosens')}}" class="btn btn-default" role="button">Back</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>      
      </div>
    </div>
  </div>
</div>

@endsection

