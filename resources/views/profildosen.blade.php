@extends('layouts.profile')

@section('title')
<title>Profil Para Pengajar | PENJASKESREK FKIP UNDANA</title>
@endsection

@section('webprofile')
<!--=== page-title-section start ===-->
<section class="title-hero-bg parallax-effect" style="background-image: url(assets/undana/VISI_MISI_HEADER.jpg);">
<div class="parallax-overlay"></div>
<div class="container">
    <div class="page-title text-center white-color">
    <h1>Profil Para Pengajar</h1>
    <h4 class="text-uppercase mt-30">Pendidikan Jasmani Kesehatan dan Rekreasi</h4>
    </div>
</div>
</section>
<!--=== page-title-section end ===--> 

<section class="white-bg">
    <div class="container">
    @foreach($data as $d)
      <div class="col-md-3">
        <div class="testimonial-content" style="margin-bottom: 10px; margin-top: 10px;"> 
          <div class="team-member-container gallery-image-hover"> <img src="{{asset('images/'.$d->foto)}}" class="img-responsive">
            <div class="member-caption">
              <div class="member-description">
                <div class="member-description-wrap">
                  <h4 class="member-title">{{$d->nama}}</h4>
                  <p class="member-subtitle">{{$d->bidangkeahlian}}</p>
                  <ul class="member-icons">
                    <li class="social-icon"><a href="#"><i class="mdi mdi-facebook"></i></a></li>
                    <li class="social-icon"><a href="#"><i class="mdi mdi-twitter"></i></a></li>
                    <li class="social-icon"><a href="#"><i class="mdi mdi-google-plus"></i></a></li>
                    <li class="social-icon"><a href="#"><i class="mdi mdi-linkedin"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
    </div>
</section>
@endsection