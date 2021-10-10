@extends('layouts.argon')
@section('content')
<h2>Daftar Dosen</h2><br>
<div class="card">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Daftar Dosen</h3>
      </div>
      <div class="col text-right">
      <a href="" role="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#modalTambah">
        Tambah Dosen
      </a>
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
  </div>
  <div class="table-responsive">
    <table class="table align-items-center table-flush">
      <thead class="thead-light">
        <tr>
          <th>NIP</th>
          <th>Nama</th>
          <th>Tanggal Lahir</th>
          <th>Email</th>
          <th>Jabatan</th>
          <th>Bidang Keahlian</th>
          <th>Foto</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $d)
          <tr>
          <td>{{$d->nip}}</td>
          <td>{{$d->nama}}</td>
          <td>{{date('d-m-Y',strtotime($d->tanggallahir))}}</td>
          <td>{{$d->email}}</td>
          <td>{{$d->jabatan}}</td>
          <td>{{$d->bidangkeahlian}}</td>
          <td><img src="{{asset('images/'.$d->foto)}}" height='100px'/></td>
          <td class="text-right">
            <div class="dropdown">
                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                  <div class="dropdown-item">
                    <a class="dropdown-item" href="{{url('dosens/'.$d->nip.'/edit')}}">Edit</a>
                  </div> 
                    <form class="dropdown-item" method="POST" action="{{url('dosens/'.$d->nip)}}">
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
        <h5 class="modal-title" id="modalTambahLabel">Tambah Dosen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form enctype="multipart/form-data" method="POST" action="{{url('dosens')}}">
      @csrf
        <div class="form-group">
          <label for="nip">NIP</label>
          <input type="text" class="form-control" id="nip" placeholder="1234xxxx" name="nip">
        </div>
        <div class="form-group">
          <label for="nama">Nama Lengkap</label>
          <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap" name="nama">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" placeholder="contoh@gmail.com" name="email">
        </div>
        <div class="form-group">
          <label for="tanggallahir">Tanggal Lahir</label>
          <input type="date" class="form-control" id="tanggallahir" placeholder="01/01/1990" name="tanggallahir">
        </div>
        <div class="form-group">
          <label for="jabatan">Jabatan</label>
          <input type="text" class="form-control" id="jabatan" placeholder="dosen" name="jabatan">
        </div>
        <div class="form-group">
          <label for="bidang">Bidang Keahlian</label>
          <textarea class="form-control" id="bidang" placeholder="Olahraga Pendidikan, Ilmu Kesehatan Olahraga, Pendidikan Olahraga, ..." name="bidang"></textarea>
        </div>
        <div class="form-group">
          <label for="foto">Foto</label>
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

<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

    </div>
  </div>
</div>
@endsection
