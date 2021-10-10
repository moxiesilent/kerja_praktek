@extends('layouts.argon')
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
            <td>{{$d->tahun}}</td>
            <td>{{$d->nama_penulis}}</td>
            <td>{{$d->tingkat}}</td>
            <td>{{$d->Lokasi}}</td>
            <td><a href="{{url('jurnals/'.$d->id.'/edit')}}" class="btn-sm btn-warning">editt</a>
                <form method="POST" action="{{url('jurnals/'.$d->id)}}">
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

@section('javascript')
<script>
function getEditForm(idprestasi){
  $.ajax({
    type:'POST',
    url:'{{route("prestasi.getEditForm")}}',
    data:{'_token':'<?php echo csrf_token() ?>',
          'idprestasi': idprestasi
        },
        success: function(data){
          $('#modalEdit').html(data.msg)
        }
  });
}
</script>
@endsection