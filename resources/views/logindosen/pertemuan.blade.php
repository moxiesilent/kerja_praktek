@extends('layouts.argon')
@section('sidenav')
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link active" href="{{url('matakuliahDosen')}}">
      <i class="ni ni-tv-2 text-primary"></i>
      <span class="nav-link-text">Matakuliah</span>
    </a>
  </li>
</ul>
@endsection
@section('nama')
<span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->name }}</span>
@endsection
@section('content')
<h2>Daftar Matakuliah</h2><br>
<div class="card">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Jadwal Pertemuan</h3>
      </div>
      <div class="col text-right">
        <a href="" data-toggle="modal" data-target="#modalTambah">
          <button class="btn btn-icon btn-primary" type="button">
            <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
            <span class="btn-inner--text">Pertemuan Baru</span>
          </button>
        </a>
        <a href="{{url('matakuliahDosen')}}" class="btn btn-secondary" role="button">Back</a>
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
</div>
@foreach($data as $d)
<div class="card">
  <div class="card-header">
      <h4 class="mb-1">{{$d->topik}}</h5>
      <h5 class="mb-0">{{date('d-m-Y',strtotime($d->tanggal))}}</h5><br>
      <div class="row">
        <div class="col-4">
          <a href="{{url('matakuliahDosen/pertemuan/'.$d->idpertemuan)}}" role="button" class="btn btn-primary ">
            Lihat Materi
          </a>
          &nbsp
          <a href="{{url('matakuliahDosen/tugas/'.$d->idpertemuan)}}" role="button" class="btn btn-primary">
            Lihat Tugas
          </a>
        </div>
        <div class="col text-right">
          <div class="dropdown">
            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ellipsis-v"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
              <div class="dropdown-item">
                <a class="dropdown-item" href="">Edit</a>
              </div> 
                <form class="dropdown-item" method="POST" action="{{url('pertemuans/'.$d->idpertemuan)}}">
                  @csrf
                  @method('DELETE')
                  <input value="Hapus" class="dropdown-item" type="submit" onclick="if(!confirm('apakah anda yakin menghapus data ini?')) return false;">
                </form>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
@endforeach
<!-- Modal -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTambahLabel">Tambah Pertemuan Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{url('pertemuans')}}">
      @csrf
        <div class="form-group">
          <label for="tanggal">Tanggal</label>
          <input class="form-control" placeholder="Select date" type="date" value="" name="tanggal" id="tanggal">
        </div>
        <div class="form-group">
          <label for="topik">Topik</label>
          <input type="text" class="form-control" id="topik" placeholder="topik" name="topik">
        </div>
        <input type="hidden" value="{{request()->id}}" name="idmengajar">
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

