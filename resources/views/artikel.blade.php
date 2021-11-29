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
    	<div class="row">
            @foreach($data as $d)
            <div class="col-md-4 col-sm-6">
              <div class="post mb-20">
              <div class="post-img"> <img class="img-responsive" src="{{asset('assets/undana/artikel/'.$d->gambar)}}" alt="" style="width: 1620px; heigh: 1020px;"/> </div>
              <div class="post-info">
                <h3><a href="/artikels/{{$d->idartikels}}">{{$d->judul}}</a></h3>
                <p>{{$d->tanggal}}</p>
                <a class="readmore" href="{{url('/artikels/'.$d->idartikels)}}"><span>Baca lebih lanjut <i class="eicon mdi mdi-arrow-right"></i></span></a> </div>
              </div>
            </div>
            @endforeach
			<!--=== Post End ===-->
        </div>
      
      <div class="row">
      	<div class="col-md-12">
      		<ul class="pagination">
                <!-- <li><a href="#">Prev</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">Next</a></li> -->
                <li>{{$data->links()}}</li>
            </ul>
      	</div>
      </div>
    </div>
  </section>
@endsection