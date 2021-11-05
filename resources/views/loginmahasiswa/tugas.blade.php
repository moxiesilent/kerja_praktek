@extends('layouts.frontend')
@section('topnav')

<nav class="navbar navbar-top navbar-dark bg-primary border-bottom">
<ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
  <div class="text-right">
    <a class="btn btn-default" href="{{ url('loginmahasiswa') }}">
        Kembali
    </a>
  </div>
</ul>
</nav>
@section('content')

<div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
  <div class="container">
    <div class="header-body text-center mb-7">
      <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 col-md-8 px-5">
          <h1 class="text-white">Welcome, {{ auth()->user()->name }}!</h1>
          <p class="text-lead text-white"></p>
        </div>
      </div>
    </div>
  </div>
  <div class="separator separator-bottom separator-skew zindex-100">
    <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
      <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
    </svg>
  </div>
</div>
<!-- Page content -->
<div class="container mt--8 pb-5">
  <div class="col-12 justify-content-center">
  @if(count($data) > 0)
    @foreach($data as $d)
    <div class="card">
        <div class="card-header">
            @if(session('status'))
            <br>
            <div class="alert alert-success" role="alert">
                {{session('status')}}
            </div><br>
            @endif
            @if(session('error'))
            <br>
            <div class="alert alert-danger" role="alert">
                {{session('error')}}
            </div><br>
            @endif
            <h3 class="mb-3">{{$d->topik}} - {{$d->judul}}</h3>
            <div class="row-2">
                <h4 class="mb-3">{{$d->tanggal}}</h4>
                <div class="text-right">
                <a href="" data-toggle="modal" data-target="#modalTambah">
                    <button class="btn btn-icon btn-primary" type="button">
                    <span class="btn-inner--text">Submit Tugas</span>
                    </button>
                </a>
                </div>
            </div>
        </div>
        @if(count($kumpul))
        @foreach($kumpul as $k)
        <div class="card-body">
          <div class="">
            <h4>Tanggal pengumpulan :</h4>
            <h4>{{$k->tanggal}}</h4>
            <a class="btn btn-dark" href="{{asset('tugas/'.$k->file)}}">Download Tugas</a>
          </div>
        </div>
        @endforeach
        @endif
    </div>
    @endforeach
  @else
  <div class="text-center">
    <h1 class="text-white">Tidak ada tugas yang diberikan.</h1>
  </div>
  @endif
  </div>
</div>
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTambahLabel">Submit Tugas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form enctype="multipart/form-data" method="POST" action="{{url('pengumpulans')}}">
      @csrf
        <div class="form-group">
          <label for="file">File Tugas</label>
          <input type="file" class="form-control" id="file" name="file">
        </div>
        <input type="hidden" name="idtugas" value="{{request()->id}}">
        @foreach($user as $u)
        <input type="hidden" name="idmahasiswa" value="{{$u->idmahasiswa}}">
        @endforeach
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

