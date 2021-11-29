@extends('layouts.profile')

@section('title')
<title>Tentang Kami | PENJASKESREK FKIP UNDANA</title>
@endsection

@section('styling-css')
<style type="text/css">
  div.gallery {
    margin: 5px;
    border: 1px solid #ccc;
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
      <div class="col-md-4">
      <div class="gallery">
        <a target="_blank" href="img_5terre.jpg">
          <img src="https://www.w3schools.com/css/img_5terre.jpg" alt="Cinque Terre" width="600" height="400">
        </a>

      </div>
      </div>

      <div class="col-md-4">
      <div class="gallery">
        <a target="_blank" href="img_forest.jpg">
          <img src="https://www.w3schools.com/css/img_forest.jpg" alt="Forest" width="600" height="400">
        </a>

      </div>
      </div>

      <div class="col-md-4">
      <div class="gallery">
        <a target="_blank" href="img_lights.jpg">
          <img src="https://www.w3schools.com/css/img_lights.jpg" alt="Northern Lights" width="600" height="400">
        </a>

      </div>
      </div>

      <div class="col-md-4">
      <div class="gallery">
        <a target="_blank" href="img_mountains.jpg">
          <img src="https://www.w3schools.com/css/img_mountains.jpg" alt="Mountains" width="600" height="400">
        </a>

      </div>
      </div>

    </div>
  </section>
  <!--=== Blogs End ===-->
@endsection