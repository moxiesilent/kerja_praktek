@extends('layouts.profile')

@section('title')
<title>Prestasi | PENJASKESREK FKIP UNDANA</title>
@endsection

@section('webprofile')
<!--=== page-title-section start ===-->
<section class="title-hero-bg parallax-effect" style="background-image: url(assets/undana/VISI_MISI_HEADER.jpg);">
<div class="parallax-overlay"></div>
<div class="container">
    <div class="page-title text-center white-color">
        <h1>Prestasi Mahasiswa</h1>
        <h4 class="text-uppercase mt-30">Pendidikan Jasmani Kesehatan dan Rekreasi</h4>
    </div>
</div>
</section>
<!--=== page-title-section end ===--> 

<section class="white-bg">
    <div class="container" style="width: 100%;">
      @foreach($data as $d)
        <div class="col-md-4">
          <div class="testimonial-content" style="margin-bottom: 10px; margin-top: 10px;"> 
            <div class="team-member-container gallery-image-hover">
            @if($d->foto)
            <img src="{{asset('assets/undana/prestasi/'.$d->foto)}}" class="img-responsive"style="height: 334px; width: 604px;">
            @else
            <img src="{{asset('assets/undana/prestasi/pres.jpg')}}" class="img-responsive">
            @endif
              <div class="member-caption">
                <div class="member-description">
                  <div class="member-description-wrap">
                    <h4 class="member-title">{{$d->namakegiatan}}</h4>
                    <p class="member-subtitle">Tingkat {{$d->tingkat}}</p>
                    <p class="member-subtitle">{{$d->prestasi}}</p>
                    <p class="member-subtitle">{{$d->tahun}}</p>
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