<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
@yield('title')
<meta name="description" content="Onepage Parallax HTML5 Template" />
<meta name="keywords" content="onepage, parallax, chaos, creative, hexagon, gradient, portfolio" />
<link rel="shortcut icon" href="{{asset('assets/undana/pjrklogo.ico')}}">
<link rel="stylesheet" href="{{asset('assets/css/master.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">

<style>
  html{
    scroll-behavior: smooth;
  }
  p{
    color: black;
  }
  table,th,td{
    border: 1px solid black;
    text-align: center;
    padding: 20px;
    color: black;
  }
  .td2{
    text-align: left;
  }
</style>
</head>
<body>

<!--=== Loader Start ======-->

<!--=== Loader End ======--> 

<!--=== Wrapper Start ===-->
<div class="wrapper"> 
  
  <!--=== Header Start ===-->
  <nav class="navbar navbar-default navbar-fixed navbar-transparent white bootsnav on no-full">
  	
    <div class="container">   
      <!--=== Start Header Navigation ===-->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"> <i class="mdi mdi-menu"></i> </button>
        <div class="logo"> <a href="index.html"> <img class="logo logo-display" src="{{asset('assets/undana/navbarfix.png')}}" alt=""> <img class="logo logo-scrolled" src="{{asset('assets/undana/navbarfix.png')}}" alt=""> </a> </div>
      </div>
      <!--=== End Header Navigation ===--> 
      
      <!--=== Collect the nav links, forms, and other content for toggling ===-->
      <div class="collapse navbar-collapse" id="navbar-menu">
        <ul class="nav navbar-nav navbar-right" data-in="fadeIn" data-out="fadeOut">
          <li><a href="/#hero">Home</a></li>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Tentang</a>
            <ul class="dropdown-menu">
              <li><a href="{{url('/sambutan')}}">Sambutan Kepala Program Studi</a></li>
              <li><a href="{{url('/visimisi')}}">Visi & Misi</a></li>
              <li><a href="{{url('/tentangkami')}}">Tentang Kami</a></li>
              <li><a href="{{url('/struktur')}}">Struktur Organisasi</a></li>
              <li><a href="{{url('/profildosen')}}">Profil Para Pengajar</a></li>
              <li><a href="{{url('/artikels')}}">Artikel</a></li>
            </ul>
          </li>
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Akademik</a>
            <ul class="dropdown-menu">
              <li><a href="{{url('/kurikulum')}}">Kurikulum</a></li>
              <li><a href="{{url('/jurnal')}}">Jurnal Penelitian Dosen</a></li>
              <li><a href="{{url('/penelitian')}}">Penelitian dan PKM</a></li>
              <!-- <li><a href="work-metro.html">Unit GKM dan Laboratorium</a></li> -->
            </ul>
          </li>
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Kemahasiswaan</a>
            <ul class="dropdown-menu">
              <li><a href="{{url('/prestasimahasiswa')}}">Prestasi</a></li>
              <li><a href="blog-details.html">Himpunan Mahasiswa</a></li>
            </ul>
          </li>
          <li> <a href="#contact">Hubungi Kami</a></li>
          <li> <a href="{{url('/login')}}">E-Learning</a></li>
        </ul>
      </div>
      <!--=== /.navbar-collapse ===--> 
    </div>
  </nav>
  <!--=== Header End ===--> 
  
  @yield('webprofile')
  
  <!--=== Footer Start ===-->
  <footer class="footer">
    <div class="footer-main">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-md-4">
            <div class="widget widget-links">
              <h5 class="widget-title">Tentang Kami</h5>
              <div class="footer-about">
              	<p>Universitas Nusa Cendana, disingkat UNDANA, adalah universitas negeri pertama di Provinsi Nusa Tenggara Timur yang berdiri pada tanggal 1 September 1962.</p>
              	<ul class="social-media">
				  <li><a href="#" class="mdi mdi-facebook"></a></li>
				  <li><a href="#" class="mdi mdi-twitter"></a></li>
				  <li><a href="#" class="mdi mdi-pinterest"></a></li>
				  <li><a href="#" class="mdi mdi-dribbble"></a></li>
				</ul>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div class="widget widget-links">
              <h5 class="widget-title">Tautan Cepat</h5>
              <ul>
                <li><a href="{{url('/artikels')}}">Artikel</a></li>
                <li><a href="{{url('/visimisi')}}">Visi & Misi</a></li>
                <li><a href="{{url('/profildosen')}}">Profil Para Pengajar</a></li>
                <li><a href="{{url('/jurnal')}}">Jurnal Penelitian Dosen</a></li>
                <li><a href="{{url('/kurikulum')}}">Kurikulum Pembelajaran</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-6 col-md-5" id="contact">
            <div class="widget widget-text">
              <h5 class="widget-title">Hubungi Kami</h5>
              <ul class="footer-contact">
              	<li><i class="mdi mdi-map-marker"></i> <p><a href="https://goo.gl/maps/tCZrSnYQ3pXq51E8A" target="_blank">Jl. Jend Soeharto, Lasiana, Klp. Lima, Kota Kupang, Nusa Tenggara Timur, Indonesia</a></p></li>
                <li><i class="mdi mdi-email"></i> <p><a href="mailto:s160418075@student.ubaya.ac.id">chaos@gmail.com</a></p></li>
                <li><i class="mdi mdi-phone"></i> <p>+49 30 47373795</p></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
       <div class="row">
        	<div class="col-md-2 col-md-offset-5">
        		<div class="logo-footer"><a href="index.html"><img class="img-responsive" src="{{asset('assets/undana/navbarfix.png')}}" alt="chaos-logo"/></a></div>
        	</div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="copy-right">©  2021 PENJASKESREK FKIP UNDANA Designed by <span class="pink-color">William & Matthew UBAYA</span></div>
          </div>
        </div>
        
      </div>
    </div>
  </footer>
  <!--=== Footer End ===--> 
  
</div>
<!--=== Wrapper End ===--> 

<!--=== Javascript Plugins ===--> 
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/smoothscroll.js')}}"></script>  
<script src="{{asset('assets/js/plugins.js')}}"></script> 
<script src="{{asset('assets/js/master.js')}}"></script>  
<!--=== Javascript Plugins End ===-->

</body>
</html>