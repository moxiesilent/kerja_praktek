@extends('layouts.profile')

@section('title')
<title>Jurnal Penelitian Dosen | PENJASKESREK FKIP UNDANA</title>
@endsection

@section('webprofile')
  <!--=== page-title-section start ===-->
  <section class="title-hero-bg parallax-effect" style="background-image: url(undana/VISI_MISI_HEADER.jpg);">
  <div class="parallax-overlay"></div>
    <div class="container">
      <div class="page-title text-center white-color">
        <h1>Jurnal Penelitian Dosen</h1>
        <h4 class="text-uppercase mt-30">Pendidikan Jasmani Kesehatan dan Rekreasi</h4>
      </div>
    </div>
  </section>
  <!--=== page-title-section end ===--> 
  
  <!--=== Blogs Start ===-->
  <section class="white-bg">
    <div class="container">
      <div class="col-md-12">
        <h2 class="font-600">Jurnal Penelitian</h2>
        <p class="mt-30" style="color: black;">Jurnal penelitian dapat diakses melalui <a href="https://ejurnal.undana.ac.id/JPEHSS" target="_blank" style="color: blue;">link</a> ini.</p><br>
        <h2 class="font-600">Publikasi Penelitian</h2>
        <table style="width: 100%; color: black;">
          <tr>
            <th style="width: 10%;">Tahun</th>
            <th style="width: 40%;">Judul Penelitian</th>
            <th style="width: 20%;">Nama Dosen</th>
            <th style="width: 20%;">Dipublikasikan pada</th>
            <th style="width: 10%;">tingkat</th>
          </tr>
          @foreach($data as $d)
          <tr>
            <td>{{$d->tahun}}</td>
            <td>{{$d->judul}}</td>
            <td>{{$d->namadosen}}</td>
            <td>{{$d->lokasi}}</td>
            <td>{{$d->tingkat}}</td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </section>
  <!--=== Blogs End ===-->
@endsection