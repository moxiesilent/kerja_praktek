@extends('layouts.argon')
@section('sidenav')
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link active" href="examples/dashboard.html">
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
  <li class="nav-item">
    <a class="nav-link" href="{{url('artikelback')}}">
      <i class="ni ni-spaceship text-dark"></i>
      <span class="nav-link-text">Artikel</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('galeri')}}">
      <i class="ni ni-image text-dark"></i>
      <span class="nav-link-text">Galeri</span>
    </a>
  </li>
</ul>
@endsection
@section('content')
<h2>Daftar Matakuliah</h2><br>

<div class="card">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Data Program Studi PENJASKESREK</h3>
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
</div>
<div class="row">
  <div style="width: 19rem;">
    <div class="card card-stats ml-3 mr-3">
        <!-- Card body -->
        <div class="card-body">
          <div class="row">
              <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0 pb-3">Jumlah Dosen</h5>
                  @foreach($dosen as $d)
                  <span class="h2 font-weight-bold mb-0">{{$d->jumdosen}}</span>
                  @endforeach
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-orange text-white rounded-circle shadow">
                    <i class="ni ni-single-02"></i>
                </div>
              </div>
          </div>
        </div>
    </div>
  </div>
  <div style="width: 20rem;">
    <div class="card card-stats ml-3 mr-3">
        <!-- Card body -->
        <div class="card-body">
          <div class="row">
              <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0 pb-3">Jumlah Mahasiswa</h5>
                  @foreach($mahasiswa as $d)
                  <span class="h2 font-weight-bold mb-0">{{$d->jummahasiswa}}</span>
                  @endforeach
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                    <i class="ni ni-single-02"></i>
                </div>
              </div>
          </div>
        </div>
    </div>
  </div>
  <div style="width: 20rem;">
    <div class="card card-stats ml-3 mr-3">
        <!-- Card body -->
        <div class="card-body">
          <div class="row">
              <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0 pb-3">Jumlah Matakuliah</h5>
                  @foreach($mk as $mk)
                  <span class="h2 font-weight-bold mb-0">{{$mk->matakuliah}}</span>
                  @endforeach
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                    <i class="ni ni-books"></i>
                </div>
              </div>
          </div>
        </div>
    </div>
  </div>
  <div style="width: 19.5rem;">
    <div class="card card-stats ml-3 mr-3">
        <!-- Card body -->
        <div class="card-body">
          <div class="row">
              <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0 pb-3">Jumlah Prestasi</h5>
                  @foreach($prestasi as $d)
                  <span class="h2 font-weight-bold mb-0">{{$d->prestasi}}</span>
                  @endforeach
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                    <i class="ni ni-hat-3"></i>
                </div>
              </div>
          </div>
        </div>
    </div>
  </div>
</div>

  
@endsection

