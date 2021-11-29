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
    <a class="nav-link" href="{{url('profil')}}">
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
    <a class="nav-link active" href="{{url('artikelback')}}">
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
@section('nama')
<span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->name }}</span>
@endsection
@section('content')
<h2>Daftar Artikel</h2><br>
    <div class="card">
        <div class="card-header">
            <h3 class="mb-0">Ubah Profil Penjaskesrek</h3>
        </div>
            <div class="card-body">
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
              <div class="m-4">
                <form enctype="multipart/form-data" method="POST" action="{{url('profils/'.$data->idprofils)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Kata Sambutan</label>
                        <textarea id="isi" name="sambutan">{{$data->sambutan}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Visi</label>
                        <textarea id="isi2" name="visi">{{$data->visi}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Misi</label>
                        <textarea id="isi3" name="misi">{{$data->misi}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Tujuan</label>
                        <textarea id="isi4" name="tujuan">{{$data->tujuan}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Tentang</label>
                        <textarea id="isi5" name="tentang">{{$data->tentang}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" value="{{$data->alamat}}" name="alamat">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" value="{{$data->email}}" name="email">
                    </div>
                    <div class="form-group">
                        <label for="telepon">Telepon</label>
                        <input type="text" class="form-control" id="telepon" value="{{$data->telepon}}" name="telepon">
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto">
                        <img src="{{asset('images/'.$data->foto_kaprodi)}}" height='150px'/>
                    </div>
                      <div class="form-group text-right">
                          <a href="{{url('profils')}}" class="btn btn-default" role="button">Back</a>
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                  </form>
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

