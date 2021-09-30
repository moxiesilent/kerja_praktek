@extends('layouts.argon')
@section('content')
<h2>Tabel Prestasi</h2><br>

<div class="card">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Tabel Prestasi</h3>
      </div>
      <div class="col text-right">
      <a href="" role="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#modalTambahMateri">
        Tambah Materi
      </a>
      <a href="" role="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#modalTambahTugas">
        Tambah Tugas
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
          <th scope="col">Nama matakuliah</th>
          <th scope="col">Jam mulai</th>
          <th scope="col">Jam berakhir</th>
          <th scope="col">Ruangan</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $d)
          <tr>
            <td>{{$d->idprestasi}}</td>
            <td>{{$d->namakegiatan}}</td>
            <td>{{$d->tahun}}</td>
            <td>{{$d->tingkat}}</td>
            <td>{{$d->prestasi}}</td>
            <td><a href="#modalEdit" data-toggle="modal" class="btn-sm btn-warning" onclick="getEditForm({{ $d->idprestasi }})">edit</a>
                <a href="{{url('prestasis/'.$d->idprestasi.'/edit')}}" class="btn-sm btn-warning">editt</a>
                <form method="POST" action="{{url('prestasis/'.$d->idprestasi)}}">
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
<div class="modal fade" id="modalTambahMateri" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTambahLabel">Tambah Prestasi Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{url('prestasis')}}">
        @csrf
        <div class="form-group">
          <label for="kegiatan">Nama kegiatan</label>
          <input type="text" class="form-control" id="kegiatan" placeholder="Lomba xxx 2015" name="kegiatan">
        </div>
        <div class="form-group">
          <label for="tahun">Tahun</label>
          <input type="text" class="form-control" id="tahun" placeholder="20xx" name="tahun">
        </div>
        <div class="radio">
            <label>Tingkat</label><br>
            <label><input type="radio" name="tingkat" value="lokal"> Lokal</label>&nbsp&nbsp
            <label><input type="radio" name="tingkat" value="regional"> Regional</label>&nbsp&nbsp
            <label><input type="radio" name="tingkat" value="nasional"> Nasional</label>&nbsp&nbsp
            <label><input type="radio" name="tingkat" value="internasional"> Internasional</label>
        </div><br>
        <div class="form-group">
          <label for="prestasi">Prestasi yang dicapai</label>
          <input type="text" class="form-control" id="prestasi" placeholder="Juara x Kategori xxx" name="prestasi">
        </div>
      </div>
      <div class="modal-footer">
        <a href="{{url('prestasis')}}" class="btn btn-default" role="button">Kembali</a>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </form>
      </div>
    </div>
  </div>
</div>

@endsection