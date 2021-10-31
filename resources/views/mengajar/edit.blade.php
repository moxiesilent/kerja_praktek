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
    <a class="nav-link active" href="{{url('mengajar')}}">
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
<h2>Jadwal</h2><br>

<div class="card">
  <div class="card-header border-0">
    <div class="row align-items-center">
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
                    @if($mk->kodemk == $data->kodemk)
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
            <div class="form-group">
            <label for="sks">SKS</label>
            <input type="text" class="form-control" id="sks" name="sks" value="{{$data->sks}}">
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
