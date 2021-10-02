@extends('layouts.profile')

@section('title')
<title>Penelitian dan PKM | PENJASKESREK FKIP UNDANA</title>
@endsection

@section('webprofile')
  <!--=== page-title-section start ===-->
  <section class="title-hero-bg parallax-effect" style="background-image: url(undana/VISI_MISI_HEADER.jpg);">
  <div class="parallax-overlay"></div>
    <div class="container">
      <div class="page-title text-center white-color">
        <h1>Penelitian dan PKM</h1>
        <h4 class="text-uppercase mt-30">Pendidikan Jasmani Kesehatan dan Rekreasi</h4>
      </div>
    </div>
  </section>
  <!--=== page-title-section end ===--> 
  
  <!--=== Blogs Start ===-->
  <section class="white-bg">
    <div class="container">
      <div class="col-md-12">
        <h2 class="font-600">Publikasi Penelitian</h2>
        <table style="width: 100%; color: black;">
          <tr>
            <th style="width: 10%;">Tahun</th>
            <th style="width: 60%;">Judul Penelitian</th>
            <th style="width: 15%;">Sumber dan Jenis Dana</th>
            <th style="width: 15%;">Jumlah Dana (dalam juta rupiah)</th>
          </tr>
          @foreach($data as $d)
            @if($d->tipe == "Penelitian")
            <tr>
                <td>{{$d->tahun}}</td>
                <td>{{$d->judul}}</td>
                <td>{{$d->sumberdana}}</td>
                <td>{{$d->jumlahdana}}</td>
            </tr> 
            @endif
          @endforeach
        </table><br>
        <h2 class="font-600">Publikasi Pengabdian</h2>
        <table style="width: 100%; color: black;">De
          <tr>
            <th style="width: 10%;">Tahun</th>
            <th style="width: 60%;">Judul Penelitian</th>
            <th style="width: 15%;">Sumber dan Jenis Dana</th>
            <th style="width: 15%;">Jumlah Dana (dalam juta rupiah)</th>
          </tr>
          @foreach($data as $d)
            @if($d->tipe == "Pengabdian")
            <tr>
                <td>{{$d->tahun}}</td>
                <td>{{$d->judul}}</td>
                <td>{{$d->sumberdana}}</td>
                <td>{{$d->jumlahdana}}</td>
            </tr> 
            @endif
          @endforeach
        </table>
      </div>
    </div>
  </section>
  <!--=== Blogs End ===-->
@endsection