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
    <a class="nav-link active" href="{{url('mengajar')}}">
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
<h2>Jadwal</h2><br>

<div class="card">
  <div class="card-header border-0">
    <div class="align-items-center">
      <form method="POST" action="{{url('mengajars/'.$data->idmengajars)}}">
            @csrf
            @method('PUT')
            <div class="form-group">
            <label for="semester">Semester</label>
            <select class="form-control" data-toggle="select" title="Simple select" name="semester">
                @foreach($semester as $sm)
                    @if($sm->idsemester == $data->semester)
                        <option value="{{$sm->idsemester}}" selected>{{$sm->nama_semester}}</option>
                    @else
                        <option value="{{$sm->idsemester}}">{{$sm->nama_semester}}</option>
                    @endif
                @endforeach
            </select>
            </div>
            <div class="form-group">
            <label for="dosen">Dosen Pengasuh</label>
            <select class="form-control" data-toggle="select" title="Simple select" name="dosen">
                @foreach($dosen as $dos)
                    @if($dos->nip == $data->dosen1)
                        <option value="{{$dos->nip}}" selected>{{$dos->nama}}</option>
                    @else
                        <option value="{{$dos->nip}}">{{$dos->nama}}</option>
                    @endif
                @endforeach
            </select>
            </div>
            
            <div class="form-group">
            <label for="matakuliah">Matakuliah</label>
            <select class="form-control" data-toggle="select" title="Simple select" data-placeholder="Pilih Matakuliah" name="matakuliah">
                @foreach($matakuliah as $mk)
                    @if($mk->kodemk == $data->matakuliah_kodemk)
                        <option value="{{$mk->kodemk}}" selected>{{$mk->namamk}}</option>
                    @else 
                        <option value="{{$mk->kodemk}}">{{$mk->namamk}}</option>
                    @endif
                @endforeach
            </select>
            </div>
            <div class="form-group">
              <label for="hari">Hari</label>
              <input type="text" class="form-control" id="hari" name="hari" value="{{$data->hari}}">
            </div>
            <div class="form-group">
              <label for="ruangan">Ruangan</label>
              <input type="text" class="form-control" id="ruangan" name="ruangan" value="{{$data->ruangan}}">
            </div>
            <div class="form-group">
              <label for="jammulai">Jam Mulai</label>
              <input type="text" class="form-control" id="jammulai" name="jammulai" value="{{$data->jammulai}}">
            </div>
            <div class="form-group">
              <label for="jamberakhir">Jam Selesai</label>
              <input type="text" class="form-control" id="jamberakhir" name="jamberakhir" value="{{$data->jamberakhir}}">
            </div>
            <div>
              <a href="{{url('mengajars')}}" class="btn btn-default" role="button">Back</a>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>      
      </div>
    </div>
  </div>
</div>

@endsection

