@extends('layouts.profile')

@section('title')
<title>Visi, Misi, Tujuan | PENJASKESREK FKIP UNDANA</title>
@endsection

@section('webprofile')
<!--=== page-title-section start ===-->
<section class="title-hero-bg parallax-effect" style="background-image: url(assets/undana/VISI_MISI_HEADER.jpg);">
  <div class="parallax-overlay"></div>
    <div class="container">
      <div class="page-title text-center white-color">
        <h1>Visi, Misi, Tujuan</h1>
        <h4 class="text-uppercase mt-30">Pendidikan Jasmani Kesehatan dan Rekreasi</h4>
        <h2>FKIP UNDANA</h2>
      </div>
    </div>
  </section>
  <!--=== page-title-section end ===--> 
  
  <!--=== Blogs Start ===-->
  <section class="white-bg">
    @foreach($data as $d)
    <div class="container">
      <iframe width="100%" height="650" src="https://www.youtube.com/embed/p3EbT4SYqLs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <div class="container">
    	<h2 class="font-600">Visi Prodi Penjaskesrek FKIP Undana</h2>
        {!!html_entity_decode($d->visi)!!}
    </div>
    <br>
    <div class="container">
    	<h2 class="font-600">Misi Prodi Penjaskesrek FKIP Undana</h2>
      {!!html_entity_decode($d->misi)!!}
    </div>
    <br>
    <div class="container">
    	<h2 class="font-600">Tujuan Program Studi Penjaskesrek FKI Undana</h2>
      {!!html_entity_decode($d->tujuan)!!}
    </div>
    @endforeach
  </section>
  <!--=== Blogs End ===-->
@endsection