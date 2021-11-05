@extends('layouts.argon')
@section('sidenav')
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link " href="{{url('dashboard')}}">
      <i class="ni ni-tv-2 text-primary"></i>
      <span class="nav-link-text">Dashboard</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="{{url('prestasi')}}">
      <i class="ni ni-planet text-orange"></i>
      <span class="nav-link-text">Prestasi</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('dosen')}}">
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
    <div class="align-items-center">
      <form method="POST" action="{{url('prestasis/'.$data->idprestasi)}}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="kegiatan">Nama kegiatan</label>
                <input type="text" class="form-control" id="kegiatan" name="kegiatan" value="{{$data->namakegiatan}}">
            </div>
            <div class="form-group">
                <label for="tahun">Tahun</label>
                <input type="text" class="form-control" id="tahun" name="tahun" value="{{$data->tahun}}">
            </div>
            <div class="radio">
                <label>Tingkat</label><br>
                <label><input type="radio" name="tingkat" value="lokal"> Lokal</label>&nbsp&nbsp
                <label><input type="radio" name="tingkat" value="regional"> Regional</label>&nbsp&nbsp
                <label><input type="radio" name="tingkat" value="nasional"> Nasional</label>&nbsp&nbsp
                <label><input type="radio" name="tingkat" value="internasional"> Internasional</label>
            </div><br>
            <div class="form-group">
                <label for="prestasi">Prestasi yang dicapai</label>
                <input type="text" class="form-control" id="prestasi" placeholder="Juara x Kategori xxx" name="prestasi" value="{{$data->prestasi}}">
            </div>
            <div>
            <a href="{{url('prestasis')}}" class="btn btn-default" role="button">Back</a>
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>      
      </div>
    </div>
  </div>
</div>

@endsection

