@extends('layouts.profile')

@section('title')
<title>Dosen | PENJASKESREK FKIP UNDANA</title>
@endsection

@section('webprofile')
<!--=== page-title-section start ===-->
<section class="title-hero-bg parallax-effect" style="background-image: url(undana/VISI_MISI_HEADER.jpg);">
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
    <div class="container" style="max-width: 60%">
        <div class="col-md-4">
        <div class="intro-img"><img class="img-responsive" src="{{asset('images/'.$data[0]->foto)}}" alt="" style="height: 440px; width: 564px;"/></div>
        </div>
        <div class="col-md-8">
        <h3>Nama Beserta Gelar | <i>Full Name with Title</i></h3>
        <h2>{{$data[0]->nama}}</h2>
        <br>
        <h3>Jabatan | <i>Position</i></h3>
        <p>{{$data[0]->jabatan}}</p>
        <br>
        <h3>Riwayat Pendidikan | <i>Educational Background</i></h3>
        <ul>
            @foreach(explode(',', $data[0]->riwayat_pendidikan) as $rows)
            <li>{{$rows}}</li>
            @endforeach
        </ul>
        <br>
        <h3>Bidang Keahlian | <i>Fields of Expertise</i></h3>
        <ul>
            @foreach(explode(',', $data[0]->bidangkeahlian) as $rows)
            <li>{{$rows}}</li>
            @endforeach
        </ul>
        </div>
    </div>
</section>
@endsection