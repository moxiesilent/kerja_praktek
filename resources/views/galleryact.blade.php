@extends('layouts.profile')

@section('title')
<title>Tentang Kami | PENJASKESREK FKIP UNDANA</title>
@endsection

@section('styling-css')
<style type="text/css">
  div.gallery {
    margin: 5px;
    float: left;

  }

  div.gallery:hover {
    transform: scale(1.2);
  }

  div.gallery img {
    width: 100%;
    height: auto;
  }

  div.desc {
    padding: 15px;
    text-align: center;
  }
</style>
@endsection

@section('webprofile')
  <!--=== page-title-section start ===-->
  <section class="title-hero-bg parallax-effect" style="background-image: url(assets/undana/VISI_MISI_HEADER.jpg);">
  <div class="parallax-overlay"></div>
    <div class="container">
      <div class="page-title text-center white-color">
        <h1>Galeri Kegiatan</h1>
        <h4 class="text-uppercase mt-30">Pendidikan Jasmani Kesehatan dan Rekreasi</h4>
      </div>
    </div>
  </section>
  <!--=== page-title-section end ===--> 
  
  <!--=== Blogs Start ===-->
  <section class="white-bg">
    <div class="container">
      @foreach ($data as $d)
      <div class="col-md-4">
        <div class="gallery">
          <a target="_blank" href="{{ asset('assets/undana/galeri/'.$d->file )}}">
            <img src="{{ asset('assets/undana/galeri/'.$d->file )}}" alt="">
          </a>
        </div>
      </div>
      @endforeach
    </div>
  </section>
  <!--=== Blogs End ===-->
@endsection