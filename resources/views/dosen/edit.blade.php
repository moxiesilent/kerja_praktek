@extends('layouts.argon')
@section('content')
<h2>Tabel Prestasi</h2><br>

<div class="card">
  <div class="card-header border-0">
    <div class="row align-items-center">
    <div class="col">
        <h3 class="mb-0">Daftar Dosen</h3>
      </div>
      <div class="col text-right">
      </div>
    </div>
  </div>
    <form method="POST" action="{{url('dosens/'.$data->nip)}}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
        <div class="form-group">
          <label for="nip">NIP</label>
          <input type="text" class="form-control" id="nip" name="nip" value="{{$data->nip}}">
        </div>
        <div class="form-group">
          <label for="nama">Nama Lengkap</label>
          <input type="text" class="form-control" id="nama" name="nama" value="{{$data->nama}}">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="{{$data->email}}">
        </div>
        <div class="form-group">
          <label for="tanggallahir">Tanggal Lahir</label>
          <input type="date" class="form-control datepicker" id="tanggallahir" name="tanggallahir" value="{{$data->tanggallahir}}">
        </div>
        <div class="form-group">
          <label for="jabatan">Jabatan</label>
          <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{$data->jabatan}}">
        </div>
        <div class="form-group">
          <label for="bidang">Bidang Keahlian</label>
          <textarea class="form-control" id="bidang" name="bidang">{{$data->bidangkeahlian}}</textarea>
        </div>
        <div class="form-group">
          <label for="foto">Foto</label>
          <input type="file" class="form-control" id="foto" name="foto">
          <img src="{{asset('images/'.$data->foto)}}" height='100px'/>
        </div>
      </div>
            <div>
                <a href="{{url('dosens')}}" class="btn btn-default" role="button">Back</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>      
      </div>
    </div>
  </div>
</div>

@endsection

