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
    <a class="nav-link" href="{{url('prestasi')}}">
      <i class="ni ni-trophy text-orange"></i>
      <span class="nav-link-text">Prestasi</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('dosen')}}">
      <i class="ni ni-single-02 text-primary"></i>
      <span class="nav-link-text">Dosen</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{url('matakuliah')}}">
      <i class="ni ni-books text-yellow"></i>
      <span class="nav-link-text">Matakuliah</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('mahasiswa')}}">
      <i class="ni ni-single-02 text-default"></i>
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
      <i class="ni ni-calendar-grid-58 text-pink"></i>
      <span class="nav-link-text">Jadwal</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('jurnal')}}">
      <i class="ni ni-send text-dark"></i>
      <span class="nav-link-text">Jurnal</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('artikelback')}}">
      <i class="ni ni-spaceship text-dark"></i>
      <span class="nav-link-text">Artikel</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="{{url('galeri')}}">
      <i class="ni ni-image text-dark"></i>
      <span class="nav-link-text">Galeri</span>
    </a>
  </li>
</ul>
@endsection
@section('content')
<h2>Tabel Prestasi</h2><br>

<div class="card">
  <div class="card-header border-0">
    <div class="align-items-center">
      <form method="POST" action="{{url('galeris/'.$data->idgaleri)}}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <div class="radio">
                    <label>Jenis Foto</label><br>
                    @if($data->jenis == 'kegiatan')
                    <label><input type="radio" name="jenis" value="kegiatan" checked> Kegiatan</label>&nbsp&nbsp
                    <label><input type="radio" name="jenis" value="fasilitas"> Fasilitas</label>&nbsp&nbsp
                    <label><input type="radio" name="jenis" value="ruangan"> Ruangan</label>&nbsp&nbsp
                    @elseif($data->jenis == 'fasilitas')
                    <label><input type="radio" name="jenis" value="kegiatan"> Kegiatan</label>&nbsp&nbsp
                    <label><input type="radio" name="jenis" value="fasilitas" checked> Fasilitas</label>&nbsp&nbsp
                    <label><input type="radio" name="jenis" value="ruangan"> Ruangan</label>&nbsp&nbsp
                    @elseif($data->jenis == 'ruangan')
                    <label><input type="radio" name="jenis" value="kegiatan"> Kegiatan</label>&nbsp&nbsp
                    <label><input type="radio" name="jenis" value="fasilitas"> Fasilitas</label>&nbsp&nbsp
                    <label><input type="radio" name="jenis" value="ruangan" checked> Ruangan</label>&nbsp&nbsp
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto">
                <img src="{{asset('assets/undana/galeri/'.$data->file)}}" height='100px'/>
            </div>
            <div>
                <a href="{{url('galeris')}}" class="btn btn-default" role="button">Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>      
      </div>
    </div>
  </div>
</div>

@endsection

