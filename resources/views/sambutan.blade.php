@extends('layouts.profile')

@section('title')
<title>Sambutan | PENJASKESREK FKIP UNDANA</title>
@endsection

@section('webprofile')
 <!--=== page-title-section start ===-->
 <section class="title-hero-bg parallax-effect" style="background-image: url(assets/undana/VISI_MISI_HEADER.jpg);">
  <div class="parallax-overlay"></div>
    <div class="container">
      <div class="page-title text-center white-color">
        <h1>Sambutan Ketua Program Studi</h1>
        <h4 class="text-uppercase mt-30">Pendidikan Jasmani Kesehatan dan Rekreasi</h4>
      </div>
    </div>
  </section>
  <!--=== page-title-section end ===--> 
  
  <!--=== Blogs Start ===-->
  <section class="white-bg">
    <div class="container">
    	<h2 class="font-600">Sambutan Kaprodi</h2>
      <br><br>
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <div class="intro-img"><img class="img-responsive" src="{{asset('images/'.$data[0]->foto_kaprodi)}}" alt=""/></div>
      </div>
      <div class="col-md-4"></div>
      <div class="col-md-12">
        @foreach($data as $d)
        {!!html_entity_decode($d->sambutan)!!}
        @endforeach
      </div>
    </div>
  </section>
  <!--=== Blogs End ===-->
@endsection