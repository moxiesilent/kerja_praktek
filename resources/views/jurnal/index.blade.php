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
    <a class="nav-link active" href="{{url('jurnal')}}">
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
        <h3 class="mb-0">Jurnal</h3>
      </div>
      <div class="col text-right">
      <a href="" role="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#modalTambah">
        Tambah Jurnal
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
          <th scope="col">Judul</th>
          <th scope="col">Nama Dosen</th>
          <th scope="col">Dihasilkan/dipublikasikan pada</th>
          <th scope="col">Tahun</th>
          <th scope="col">Tingkat</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $d)
          <tr>
            <td>{{$d->id}}</td>
            <td>{{$d->judul}}</td>
            <td>{{$d->dosen}}</td>
            <td>{{$d->lokasi}}</td>
            <td>{{$d->tahun}}</td>
            <td>{{$d->tingkat}}</td>
            <td class="text-right">
            <div class="dropdown">
                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                  <div class="dropdown-item">
                    <a class="dropdown-item" href="{{url('jurnals/'.$d->id.'/edit')}}">Edit</a>
                  </div> 
                    <form class="dropdown-item" method="POST" action="{{url('jurnals/'.$d->id)}}">
                      @csrf
                      @method('DELETE')
                      <a class="dropdown-item" type="submit" onclick="if(!confirm('apakah anda yakin menghapus data ini?')) return false;">Hapus</a>
                    </form>
                </div>
            </div>
          </td>
            <td><a href="" class="btn-sm btn-warning">editt</a>
                <form method="POST" action="">
                @csrf
                @method('DELETE')
                <input type="submit" value='hapus' class='btn-sm btn-danger' onclick="if(!confirm('apakah anda yakin menghapus data ini?')) return false;"/>
                </form>
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
        <h5 class="modal-title" id="modalTambahLabel">Tambah Jurnal Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{url('jurnals')}}">
        @csrf
        <div class="form-group">
          <label for="kegiatan">Judul</label>
          <input type="text" class="form-control" id="kegiatan" placeholder="tuliskan judul jurnal" name="judul">
        </div>
        <div class="form-group">
          <label for="tahun">Tahun</label>
          <input type="text" class="form-control" id="tahun" placeholder="20xx" name="tahun">
        </div>
        <div class="form-group">
          <label for="dosen">Nama Dosen</label>
          <select class="form-control" data-toggle="select" title="Simple select" data-placeholder="Pilih Dosen" name="dosen">
            @foreach($dosen as $dos)
                <option value="{{$dos->nip}}">{{$dos->nama}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="lokasi">Lokasi</label>
          <input type="text" class="form-control" id="lokasi" placeholder="lokasi" name="lokasi">
        </div>
        <div class="radio">
            <label>Tingkat</label><br>
            <label><input type="radio" name="tingkat" value="lokal"> Lokal</label>&nbsp&nbsp
            <label><input type="radio" name="tingkat" value="regional"> Regional</label>&nbsp&nbsp
            <label><input type="radio" name="tingkat" value="nasional"> Nasional</label>&nbsp&nbsp
            <label><input type="radio" name="tingkat" value="internasional"> Internasional</label>
        </div>
      </div>
      <div class="modal-footer">
        <a href="{{url('jurnals')}}" class="btn btn-default" role="button">Kembali</a>
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
