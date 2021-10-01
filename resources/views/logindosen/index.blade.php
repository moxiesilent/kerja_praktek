@extends('layouts.argon')
@section('content')
<h2>Daftar Matakuliah</h2><br>
<div class="card">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Halaman login dosen</h3>
      </div>
      <div class="col text-right">
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
  
@endsection

