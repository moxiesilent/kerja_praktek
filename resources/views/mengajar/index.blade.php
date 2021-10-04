@extends('layouts.argon')
@section('content')
<h2>Tabel Prestasi</h2><br>

<div class="card">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Tabel Pembelajaran</h3>
      </div>
      <div class="col text-right">
      <a href="" role="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#modalTambah">
        Tambah Pembelajaran
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
          <th scope="col">Action</th>
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
            
            @if( $d->dosen2 == '')
                <td>{{$d->dosen}}</td>
                
            @else
                <td>{{$d->dosen}} / {{$d->dosen2}}</td>
            
            @endif
            
            <td><a href="{{url('mengajars/'.$d->idmengajars.'/edit')}}" class="btn-sm btn-warning">edit</a>
                <form method="POST" action="{{url('mengajars/'.$d->idmengajars)}}">
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
        <h5 class="modal-title" id="modalTambahLabel">Tambah Pembelajaran Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{url('mengajars')}}">
        @csrf
        <div class="form-group">
          <label for="dosen">Dosen Pengasuh 1</label>
          <select class="form-control" data-toggle="select" title="Simple select" data-placeholder="Pilih Dosen" name="dosen1">
            @foreach($dosen as $dos)
                <option value="{{$dos->nip}}">{{$dos->nama}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="dosen">Dosen Pengasuh 2 (optional)</label>
          <select class="form-control" data-toggle="select" title="Simple select" data-placeholder="Pilih Dosen" name="dosen2">
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
          <select class="form-control" data-toggle="select" title="Simple select" data-placeholder="Pilih Hari" name="hari">
            <option value="Senin">Senin</option>
            <option value="Selasa">Selasa</option>
            <option value="Rabu">Rabu</option>
            <option value="Kamis">Kamis</option>
            <option value="Jumat">Jumat</option>
            <option value="Sabtu">Sabtu</option>
            <option value="Minggu">Minggu</option>
          </select>
        </div>
        <div class="form-group">
          <label for="ruangan">Ruangan</label>
          <input type="text" class="form-control" id="ruangan" placeholder="Lapangan Bola" name="ruangan">
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