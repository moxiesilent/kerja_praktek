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
<h2>Tabel Prestasi</h2><br>

<div class="card">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Jadwal</h3>
      </div>
      <div class="col text-right">
      <a href="" role="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#modalTambah">
        Tambah Jadwal
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
          <th scope="col">Nomor</th>
          <th scope="col">Hari</th>
          <th scope="col">Jam Mulai</th>
          <th scope="col">Jam Selesai</th>
          <th scope="col">Kode Matakuliah</th>
          <th scope="col">Nama Matakuliah</th>
          <th scope="col">SKS</th>
          <th scope="col">Ruangan</th>
          <th scope="col">Dosen</th>
          <th scope="col">Semester</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $d)
          <tr>
            <td>{{$d->idmengajars}}</td>
            <td>{{$d->hari}}</td>
            <td>{{$d->jammulai}}</td>
            <td>{{$d->jamberakhir}}</td>
            <td>{{$d->kodemk}}</td>
            <td>{{$d->namamk}}</td>
            <td>{{$d->sks}}</td>
            <td>{{$d->ruangan}}</td>
            <td>{{$d->dosen}}</td>
            <td>{{$d->semester}}</td>
            <td class="text-right">
            <div class="dropdown">
                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                  <div class="dropdown-item">
                    <a class="dropdown-item" href="{{url('mengajars/'.$d->idmengajars.'/edit')}}">Edit</a>
                  </div> 
                    <form class="dropdown-item" method="POST" action="{{url('mengajars/'.$d->idmengajars)}}">
                      @csrf
                      @method('DELETE')
                      <a class="dropdown-item" type="submit" onclick="if(!confirm('apakah anda yakin menghapus data ini?')) return false;">Hapus</a>
                    </form>
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
        <h5 class="modal-title" id="modalTambahLabel">Tambah Pembelajaran Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{url('mengajars')}}">
        @csrf
        <div class="form-group">
          <label for="semester">Semester</label>
          <select class="form-control" data-toggle="select" title="Simple select" data-placeholder="Pilih Semester" name="semester">
            @foreach($semester as $sm)
                <option value="{{$sm->idsemester}}">{{$sm->nama_semester}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="dosen">Dosen Pengasuh</label>
          <select class="form-control" data-toggle="select" title="Simple select" data-placeholder="Pilih Dosen" name="dosen">
            @foreach($dosen as $dos)
                <option value="{{$dos->nip}}">{{$dos->nama}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="matakuliah">Matakuliah</label>
          <select class="form-control" data-toggle="select" title="Simple select" data-placeholder="Pilih Matakuliah" name="matakuliah">
            @foreach($matakuliah as $mk)
                <option value="{{$mk->kodemk}}">{{$mk->namamk}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="hari">Hari</label>
          <input type="text" class="form-control" id="hari" placeholder="hari" name="hari">
        </div>
        <div class="form-group">
          <label for="ruangan">Ruangan</label>
          <input type="text" class="form-control" id="ruangan" placeholder="Lapangan Bola" name="ruangan">
        </div>
        <div class="form-group">
          <label for="jammulai">Jam Mulai</label>
          <input type="text" class="form-control" id="jammulai" placeholder="00:00" name="jammulai">
        </div>
        <div class="form-group">
          <label for="jamberakhir">Jam Selesai</label>
          <input type="text" class="form-control" id="jamberakhir" placeholder="00:00" name="jamberakhir">
        </div>
        <div class="form-group">
          <label for="sks">SKS</label>
          <input type="text" class="form-control" id="sks" placeholder="2 (angka)" name="sks">
        </div>
      </div>
      <div class="modal-footer">
        <a href="{{url('mengajars')}}" class="btn btn-default" role="button">Kembali</a>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

    </div>
  </div>
</div>

@endsection