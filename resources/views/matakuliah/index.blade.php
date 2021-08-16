@extends('layouts.argon')
@section('content')
<h2>Daftar Matakuliah</h2><br>
<div class="card">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Daftar Matakuliah</h3>
      </div>
      <div class="col text-right">
      <a href="" role="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#modalTambah">
        Tambah Matakuliah
      </a>
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
  </div>
  <div class="table-responsive">
    <table class="table align-items-center table-flush">
      <thead class="thead-light">
        <tr>
          <th>Kode MK</th>
          <th>Nama Matakuliah</th>
          <th>Jumlah SKS</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $d)
          <tr>
          <td>{{$d->kodemk}}</td>
          <td>{{$d->namamk}}</td>
          <td>{{$d->sks}}</td>
          <td><a href="#modalEdit" data-toggle="modal" class="btn-sm btn-warning" onclick="getEditForm({{ $d->kodemk }})">edit</a>
                <a href="{{url('matakuliahs/'.$d->kodemk.'/edit')}}" class="btn-sm btn-warning">editt</a>
                <form method="POST" action="{{url('matakuliahs/'.$d->kodemk)}}">
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
        <h5 class="modal-title" id="modalTambahLabel">Tambah Matakuliah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{url('matakuliahs')}}">
      @csrf
        <div class="form-group">
          <label for="nama">Nama Matakuliah</label>
          <input type="text" class="form-control" id="nama" placeholder="Bahasa Indonesia" name="nama">
        </div>
        <div class="form-group">
          <label for="kode">Kode Matakuliah</label>
          <input type="text" class="form-control" id="kode" placeholder="KMP xxxx" name="kode">
        </div>
        <div class="form-group">
          <label for="sks">Jumlah SKS</label>
          <input type="text" class="form-control" id="sks" placeholder="xx (angka)" name="sks">
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
@endsection

