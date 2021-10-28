@extends('layouts.profile')

@section('title')
<title>Artikel | PENJASKESREK FKIP UNDANA</title>
@endsection

@section('webprofile')
 <!--=== page-title-section start ===-->
 <section class="title-hero-bg parallax-effect" style="background-image: url(assets/undana/VISI_MISI_HEADER.jpg);">
  <div class="parallax-overlay"></div>
    <div class="container">
      <div class="page-title text-center white-color">
        <h1>Artikel</h1>
        <h4 class="text-uppercase mt-30">Pendidikan Jasmani Kesehatan dan Rekreasi</h4>
      </div>
    </div>
  </section>
  <!--=== page-title-section end ===--> 
  
  <!--=== Blogs Start ===-->
  <section class="white-bg">
    <div class="container">
    	<h2 class="font-600">{{$artikel->judul}}</h2>
        <span><img src="{{asset('assets/undana/tanggal.png')}}" alt=""></span>{{$artikel->tanggal}}
        <br><br>
      <div class="col-md-12">
        <div class="intro-img"><img class="img-responsive" src="{{asset('assets/undana/artikel/'.$artikel->gambar)}}" alt=""/></div>
      </div>
      <br>
      <div class="col-md-12">
        <?php echo $artikel->isi?>
      </div>
      
      <div class="col-md-12"><br><br><br>Admin PENJASKESREK UNDANA</div>
    </div>
  </section>
  <!--=== Blogs End ===-->
@endsection