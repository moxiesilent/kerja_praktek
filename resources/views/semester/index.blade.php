@extends('layouts.argon')
@section('content')
<h2>Daftar Matakuliah</h2><br>
<div class="card">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Daftar Semester</h3>
      </div>
      <div class="col text-right">
      <a href="" role="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#modalTambah">
        Tambah Semester
      </a>
      </div>
      <br>
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
          <th>Id Semester</th>
          <th>Nama Semester</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $d)
          <tr>
          <td>{{$d->idsemester}}</td>
          <td>{{$d->nama_semester}}</td>
          <td class="text-right">
            <div class="dropdown">
                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                  <div class="dropdown-item">
                    <a class="dropdown-item" href="{{url('semesters/'.$d->idsemester.'/edit')}}">Edit</a>
                  </div> 
                    <form class="dropdown-item" method="POST" action="{{url('semesters/'.$d->idsemester)}}">
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
        <h5 class="modal-title" id="modalTambahLabel">Tambah Semester</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{url('semesters')}}">
      @csrf
        <div class="form-group">
          <label for="nama">Nama Semester</label>
          <input type="text" class="form-control" id="nama" placeholder="Gasal 2020/2021" name="nama">
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

