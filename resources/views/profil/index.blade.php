@extends('layouts.argon')
@section('sidenav')
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link" href="{{url('dashboard')}}">
      <i class="ni ni-tv-2 text-primary"></i>
      <span class="nav-link-text">Dashboard</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="{{url('profil')}}">
      <i class="ni ni-planet text-success"></i>
      <span class="nav-link-text">Profil</span>
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
    <a class="nav-link" href="{{url('matakuliah')}}">
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
    <a class="nav-link" href="{{url('jurnalback')}}">
      <i class="ni ni-send text-dark"></i>
      <span class="nav-link-text">Jurnal</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('penelitianback')}}">
      <i class="ni ni-ruler-pencil text-dark"></i>
      <span class="nav-link-text">Penelitian</span>
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
  <li class="nav-item">
    <a class="nav-link" href="{{url('user')}}">
      <i class="ni ni-single-02 text-dark"></i>
      <span class="nav-link-text">User</span>
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
    <div class="card-body">
        <div class="row-3">
          <h3>Pengaturan Profil Penjaskesrek</h3>
          <div class="text-right">
            @foreach($data as $d)
            <a class="btn btn-primary" href="{{url('profils/'.$d->idprofils.'/edit')}}">Ubah</a>
            @endforeach
          </div>
        </div>
        <!-- <a href="" data-toggle="modal" data-target="#modalTambah">
          <button class="btn btn-icon btn-primary" type="button">
            <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
            <span class="btn-inner--text">Buat Profil Baru</span>
          </button>
        </a> -->
    </div>
</div>
@foreach($data as $d)
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Data Profil Penjaskesrek</h4>
        <p class="card-text">Alamat : {{$d->alamat}}</p>
        <p class="card-text">Email : {{$d->email}}</p>
        <p class="card-text">Telepon : {{$d->telepon}}</p>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Visi</h4>
        <p class="card-text">{!!html_entity_decode($d->visi)!!}</p>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Misi</h4>
        <p class="card-text">{!!html_entity_decode($d->misi)!!}</p>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Tujuan</h4>
        <p class="card-text">{!!html_entity_decode($d->tujuan)!!}</p>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Sambutan</h4>
        <p class="card-text">{!!html_entity_decode($d->sambutan)!!}</p>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Tentang</h4>
        <p class="card-text">{!!html_entity_decode($d->tentang)!!}</p>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Foto Kaepala Program Studi Penjaskesrek</h4>
        <img src="{{asset('images/'.$d->foto_kaprodi)}}" height='150px'/>
    </div>
</div>

@endforeach

<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTambahLabel">Buat Profil Website Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form enctype="multipart/form-data" method="POST" action="{{url('profils')}}">
      @csrf
        <div class="form-group">
            <label>Kata Sambutan</label>
            <textarea id="isi" name="sambutan"></textarea>
        </div>
        <div class="form-group">
            <label>Visi</label>
            <textarea id="isi2" name="visi"></textarea>
        </div>
        <div class="form-group">
            <label>Misi</label>
            <textarea id="isi3" name="misi"></textarea>
        </div>
        <div class="form-group">
            <label>Tujuan</label>
            <textarea id="isi4" name="tujuan"></textarea>
        </div>
        <div class="form-group">
            <label>Tentang</label>
            <textarea id="isi5" name="tentang"></textarea>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" placeholder="Email" name="email">
        </div>
        <div class="form-group">
            <label for="telepon">Telepon</label>
            <input type="text" class="form-control" id="telepon" placeholder="08xxxxxxxx" name="telepon">
        </div>
        <div class="form-group">
          <label for="foto">Foto Kepala Program Studi Penjaskesrek</label>
          <input type="file" class="form-control" id="foto" name="foto">
        </div>
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
@section('javascript')
<script>
    CKEDITOR.replace( 'isi' );
    CKEDITOR.replace( 'isi2' );
    CKEDITOR.replace( 'isi3' );
    CKEDITOR.replace( 'isi4' );
    CKEDITOR.replace( 'isi5' );
</script>
@endsection
