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
<h2>Detail</h2><br>

<div class="card">
  <div class="card-header border-0">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="mb-0">Detail Jadwal</h3>
        </div>
        <div class="col text-right">
            <a href="{{url('mengajars')}}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
    <div class="row p-3">
        @foreach($data as $d)
            <div class="col">
            Jadwal No : {{$d->idmengajars}}<br>
            Semester : {{$d->semester}}<br>
            Kode MK : {{$d->kodemk}}<br>
            Nama MK : {{$d->namamk}}<br>
            Dosen Pengajar : {{$d->namaDosen}}<br>
            Ruangan : {{$d->ruangan}}<br>
            Hari : {{$d->hari}}<br>
            Jam Mulai : {{$d->jammulai}}<br>
            Jam Berakhir : {{$d->jamberakhir}}
            </div>
        @endforeach
    </div>
  </div>
</div>

<div class="card">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Daftar Mahasiswa</h3>
      </div>
      <div class="col text-right">
        <a href="" data-toggle="modal" data-target="#modalTambah">
          <button class="btn btn-icon btn-primary" type="button">
            <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
            <span class="btn-inner--text">Tambah Mahasiswa</span>
          </button>
        </a>
      </div>
    </div>
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
  <div class="table-responsive">
    <table class="table align-items-center table-flush">
      <thead class="thead-light">
        <tr>
          <th scope="col">NIM</th>
          <th scope="col">Nama</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($ambil as $a)
          <tr>
            <td>{{$a->nim}}</td>
            <td>{{$a->nama}}</td>
            <td class="text-right">
            <div class="dropdown">
                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <form class="dropdown-item" method="POST" action="{{url('mengambil/hapus')}}">
                      @csrf
                      <input type="hidden" name="idmahasiswa" value="{{$a->nim}}">
                      @foreach($data as $d)
                        <input type="hidden" name="idmengajar" value="{{$d->idmengajars}}">
                      @endforeach
                      <input class="dropdown-item" type="submit" value="Hapus" onclick="if(!confirm('apakah anda yakin menghapus data ini?')) return false;">
                    </form>
                </div>
            </div>
          </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <ul class="pagination">
      <li class="page-item">
        
      </li>
    </ul>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTambahLabel">Tambah Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{url('mengambils')}}">
        @csrf
        <div class="form-group">
          <label for="mahasiswa">Pilih Mahasiswa</label>
          <select multiple class="form-control" id="mahasiswa" name="mahasiswa[]">
            @foreach($mahasiswa as $m)
                <option value="{{$m->idmahasiswa}}">{{$m->idmahasiswa}} - {{$m->nama}}</option>
            @endforeach
          </select>
        </div>
        @foreach($data as $d)
          <input type="hidden" name="idmengajar" value="{{$d->idmengajars}}">
        @endforeach
      </div>
      <div class="modal-footer">
        <a href="" class="btn btn-default" role="button">Kembali</a>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </form>
      </div>
    </div>
  </div>
</div>

@endsection