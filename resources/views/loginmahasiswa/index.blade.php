@extends('layouts.frontend')
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
  <div class="row justify-content-center">
    @foreach($data as $d)
      <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="https://demos.creative-tim.com/argon-dashboard/assets/img/theme/img-1-1000x600.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{$d->kodemk}}</h5>
          <p class="card-text">{{$d->namamk}}</p>
          <a href="" class="btn btn-primary">Pilih</a>
        </div>
      </div>&nbsp&nbsp&nbsp&nbsp&nbsp
    @endforeach
  </div>
</div>

@endsection

