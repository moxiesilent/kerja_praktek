@extends('layouts.frontend')
@section('topnav')

<nav class="navbar navbar-top navbar-dark bg-primary border-bottom">
<ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
  <div class="text-right">
    <a class="btn btn-default" href="{{ url()->previous() }}">
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
            <h4 class="mb-3">{{$d->topik}} - {{$d->judul}}</h4>
            <div class="row">
                <div class="col-4">
                    <a class="btn btn-dark" href="{{asset('materi/'.$d->file)}}">Download Materi</a>
                </div>
            </div>
        </div>
    </div>&nbsp
    @endforeach
  @else
  <div class="text-center">
    <h1 class="text-white">Tidak ada materi yang diberikan.</h1>
  </div>
  @endif
  </div>
</div>

@endsection

