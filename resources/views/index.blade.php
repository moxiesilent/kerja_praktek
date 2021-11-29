@extends('layouts.profile')

@section('title')
<title>Home | PENJASKESREK FKIP UNDANA</title>
@endsection

@section('webprofile')
  <!--=== Hero Slider Start ===-->
  
  <section class="home-slider" id="hero">
    <div class="default-slider slick">
      <div class="slide">
        <div class="slide-img parallax-effect" style="background:url(assets/undana/hero.png) center center / cover scroll no-repeat;"></div>
        <div class="hero-text-wrap">
          <div class="hero-text">
            <div class="container">
              <div class="white-color">
                <h3 class="upper-case">program studi</h3>
                <h1 class="upper-case font-600">penjaskesrek</h1>
                <h3 class="upper-case"><span class="font-800">Universitas Nusa Cendana</span></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="slide">
        <div class="slide-img parallax-effect" style="background:url(assets/undana/hero2.jpg) center center / cover scroll no-repeat;"></div>
        <div class="hero-text-wrap">
          <div class="hero-text white-color">
            <div class="container">
              <div class="white-color">
                <h3 class="upper-case">Pendidikan Jasmani</h3>
                <h3 class="upper-case">kesehatan dan rekreasi</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!--=== Hero Slider End ===--> 
  
  <!--=== Welcome Start ===-->
  <section id="welcomedrink">
  	<div class="container">
  		<div class="row">
        @foreach($profil as $p)
  			<div class="col-md-4">
  				<div class="intro-img"><img class="img-responsive" src="images/{{$p->foto_kaprodi}}" alt=""/></div>
  			</div>
        @endforeach
        <div class="col-md-6 heading-style-one">
  				<hr class="gradient-bg left-line">
  				<h2>Sambutan Kepala Prodi<br><span class="font-700">Pendidikan Jasmani<br>Kesehatan dan Rekreasi</span></h2>
  				<p class="mt-30 font-600">Sambutan <span class="font-700">Kepala Program Studi</span></p>
  				<!-- <p>Atas nama seluruh staf pengajar, staf administrasi dan mahasiswa, saya mengucapkan selamat datang di Program Studi Penjaskesrek, Fakultas Keguruan dan Ilmu Pendidikan, Universitas Nusa Cendana.</p> -->
          <p class="text-left mt-30"><a class="btn btn-gradient btn-md" href="/sambutan">Baca selengkapnya</a></p>
        </div>
  		</div>
  	</div>
  </section>
  <!--=== Welcome End ===--> 

  
  <!--=== Video Start ===-->
  <section class="parallax-bg fixed-bg pt-200 pb-200" style="background-image: url(assets/undana/header_profile.jpg);">
  	<div class="gradient-overlay"></div>
  	<div class="container">
  		<div class="row">
  			<div class="col-md-2 col-md-offset-5">
  				<div class="center-layout">
                <div class="v-align-middle">
                  <h2 class="font-600" style="letter-spacing: 14px; color: white;">VIDEO</h2>
                  <a class="popup-youtube" href="assets/undana/videoprofil.mp4">
                    <div class="play-button"><i class="eicon mdi mdi-play"></i> </div>
                  </a>
                  <h2 class="font-600" style="letter-spacing: 7px; color: white;">PROFIL</h2>
                </div>
              </div>
  			</div>
  		</div>
  	</div>
  </section>
  <!--=== Video End ===-->
  
  <!--=== Portfolio Start ===-->
  <section class="pb-0 white-bg">
    <div class="container">
      <div class="row">
        <div class="col-md-4 heading-style-one col-sm-4 col-xs-12">
        	<hr class="gradient-bg left-line">
			    <h2 class="font-700">Galeri</h2>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row mt-90">
        <div id="chaos-gallery" class="cbp">
          <div class="cbp-item web col-md-6 col-sm-6">
            <div class="portfolio gallery-image-hover text-left">
              <div class="folio-overlay"></div>
              <img src="{{ asset('images/gallerykegiatan.jpg') }}" alt="Yiyiyi">
              <div class="portfolio-wrap">
                <div class="portfolio-description">
                  <h3 class="portfolio-title">Kegiatan</h3>
                  <a href="/galerikegiatan" class="links">Kunjungi</a> </div>
              </div>
            </div>
          </div>
          <div class="cbp-item graphic col-md-6 col-sm-6">
            <div class="portfolio gallery-image-hover text-left">
              <div class="folio-overlay"></div>
              <img src="{{ asset('images/galleryroom.jpg') }}" alt="Yeyeye">
              <div class="portfolio-wrap">
                <div class="portfolio-description">
                  <h3 class="portfolio-title">Ruangan</h3>
                  <a href="/galeriruangan" class="links">Kunjungi</a> </div>
              </div>
            </div>
          </div>  
          <div class="cbp-item graphic col-md-6 col-sm-6">
            <div class="portfolio gallery-image-hover text-left">
              <div class="folio-overlay"></div>
              <img src="{{ asset('images/galleryfac.jpg') }}" alt="Yayaya">
              <div class="portfolio-wrap">
                <div class="portfolio-description">
                  <h3 class="portfolio-title">Faslilitas</h3>
                  <a href="/galerifasilitas" class="links">Kunjungi</a> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!--=== Portfolio End ===-->
  
  <!--=== Our Team Start ===-->
  <section>
    <div class="container">
      <div class="row">
  			<div class="col-md-12 heading-style-two text-center">
  				<h2 class="font-700"><span>Para Pengajar</span></h2>
  			</div>
  		</div>
      <div class="row mt-50">
        
          <div class="slick testimonial"> 
           	@foreach($dosen as $d)
            <!--=== Slide ===-->
            <div class="testimonial-item">
                <div class="col-md-12">
                    <div class="testimonial-content"> 
                    <div class="team-member-container gallery-image-hover"> <img src="{{asset('images/'.$d->foto)}}" class="img-responsive" alt="team-01" style="height: 440px; width: 390px;">
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
            </div>
            @endforeach
        </div>
      </div>
    </div>
  </section>
  <!--=== Our Team End ===--> 
   
  
 <!--=== Testimonails Start ===-->
 <section class="parallax-bg fixed-bg" data-stellar-background-ratio="0.2" style="background-image: url(assets/images/background/pattern-parallax.jpg); display:none;">
    <div class="container">
      <div class="row">
  			<div class="col-md-12 heading-style-two text-center">
  				<h2 class="font-700"><span>Testimoni</span></h2>
  			</div>
  		</div>
      <div class="row mt-60">
        
          <div class="slick testimonial"> 
           	
				<!--=== Slide ===-->
				<div class="testimonial-item">
			  		<div class="col-md-12">
					  <div class="testimonial-content"> 
					  	<div class="testimonial-content-in">
						  <div class="img">
						  <img class="img-responsive img-circle" src="undana/testi1.jpg" alt="avatar-4"/>
						  </div>
							<h5>Hendrik Adu, S.Pd</h5>
							<h6>Alumni PENJASKESREK FKIP UNDANA</h6>
							<p>“Prodi unggulan di mata masyarakat karena bisa membentuk fisik dan karakter peserta didik serta dapat mengembangkan bakat dan talenta yang dimiliki… Majulah Prodi Penjaskesrek.”</p>
						 </div>
					  </div>
				  </div>
				</div>
        <!--=== Slide ===-->
				<div class="testimonial-item">
			  		<div class="col-md-12">
					  <div class="testimonial-content">
					  <div class="testimonial-content-in">
						 <div class="img"> <img class="img-responsive img-circle" src="undana/testi2.jpg" alt="avatar-5"/>
						 </div>
							<h5>Yusuf Nikodemus Lopo, S.Pd</h5>
							<h6>Alumni PENJASKESREK FKIP UNDANA</h6>
							<p>“Prodi PENJASKESREK Undana merupakan salah satu prodi yang menyiapkan lulusan serta calon guru yang profesional dan siap bersaing di dunia kerja.”</p>
              <br>
						 </div>
					  </div>
					</div>
				</div>  
				<!--=== Slide ===-->
				<div class="testimonial-item">
			  		<div class="col-md-12">
					  <div class="testimonial-content"> 
					  	<div class="testimonial-content-in">
						 <div class="img"> <img class="img-responsive img-circle" src="undana/testi3.jpg" alt="avatar-6"/>
						 </div>
							<h5>M. Asyuroh. R, S.Pd</h5>
							<h6>Alumni PENJASKESREK FKIP UNDANA</h6>
							<p>“Saya sangat senang kuliah di Penjaskesrek Undana.”</p>
              <br><br><br>
						 </div>
					  </div>
				  </div>
				</div>
        <!--=== Slide ===-->
				<div class="testimonial-item">
			  		<div class="col-md-12">
					  <div class="testimonial-content">
					  <div class="testimonial-content-in">
						  <div class="img"><img class="img-responsive img-circle" src="assets/images/team/avatar-1.jpg" alt="avatar-1"/>
						  </div>
							<h5>Doris Campos</h5>
							<h6>founder@chaos.io</h6>
							<p>Mauris aliquam risus id dui elementum accumsan. Cum sociis natoque penatibus et magnis dis parturient montes mus.</p>
						 </div>
					  </div>
					</div>
				</div>
            
          </div>
        
      </div>
    </div>
  </section>
  <!--=== Testimonails End ===--> 
  
  <!--=== Blogs Start ===-->
  <section class="pb-0">
    <div class="container">
      <div class="row">
  			<div class="col-md-12 heading-style-two text-center">
  				<h2 class="font-700"><span>Artikel</span></h2>
  			</div>
  		</div>
      <div class="row mt-50">
          @foreach($data as $d)
          <div class="col-md-4 col-sm-6">
            <div class="post mb-20">
            <div class="post-img"> <img class="img-responsive" src="{{asset('assets/undana/artikel/'.$d->gambar)}}" alt="" style="width: 1620px; heigh: 1020px;"/> </div>
            <div class="post-info">
              <h3><a href="/artikels/{{$d->idartikels}}">{{$d->judul}}</a></h3>
              <p>{{$d->tanggal}}</p>
              <a class="readmore" href="/artikels/{{$d->idartikels}}"><span>Baca lebih lanjut <i class="eicon mdi mdi-arrow-right"></i></span></a> </div>
            </div>
          </div>
          @endforeach
        <!--=== Post End ===--> 
        <div class="col-md-4"></div>
        <div class="col-md-4"><a class="btn btn-gradient btn-md" href="/artikel" style="width: 100%;">Lihat Lebih Banyak</a></div>
        <div class="col-md-4"></div>
        
      </div>
    </div>
  </section>
  <!--=== Blogs End ===--> 
@endsection