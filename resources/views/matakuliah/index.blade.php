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
    </div>
  </div>
  <div class="table-responsive">
    <table class="table align-items-center table-flush">
      <thead class="thead-light">
        <tr>
          <th>Kode MK</th>
          <th>Nama Matakuliah</th>
          <th>Jumlah SKS</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $d)
          <tr>
          <td>{{$d->kodemk}}</td>
          <td>{{$d->namamk}}</td>
          <td>{{$d->sks}}</td>
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

