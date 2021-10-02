@extends('layouts.profile')

@section('title')
<title>Struktur Organisasi | PENJASKESREK FKIP UNDANA</title>
@endsection

@section('webprofile')
  <!--=== page-title-section start ===-->
  <section class="title-hero-bg parallax-effect" style="background-image: url(assets/undana/VISI_MISI_HEADER.jpg);">
  <div class="parallax-overlay"></div>
    <div class="container">
      <div class="page-title text-center white-color">
        <h1>Struktur Organisasi</h1>
        <h4 class="text-uppercase mt-30">Pendidikan Jasmani Kesehatan dan Rekreasi</h4>
      </div>
    </div>
  </section>
  <!--=== page-title-section end ===--> 
  
  <!--=== Blogs Start ===-->
  <section class="white-bg">
    <div class="container">
      <img src="{{asset('assets/undana/struktur.png')}}" alt="" style="height: 100%; width: 100%; border: 1px solid black ;"><br><br><br>
      <a href= "{{asset('assets/undana/struktur.png')}}" download="strukturPJOK.png" class="btn btn-gradient btn-md" style="margin:auto;">Unduh Struktur</a>
    </div>
  </section>
  <!--=== Blogs End ===-->
@endsection