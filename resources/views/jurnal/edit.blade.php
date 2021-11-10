@extends('layouts.argon')
@section('sidenav')
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link" href="{{url('dashboard')}}">
      <i class="ni ni-tv-2 text-primary"></i>
      <span class="nav-link-text">Dashboard</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('prestasi')}}">
      <i class="ni ni-trophy text-orange"></i>
      <span class="nav-link-text">Prestasi</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('dosen')}}">
      <i class="ni ni-single-02 text-primary"></i>
      <span class="nav-link-text">Dosen</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('matakuliah')}}">
      <i class="ni ni-books text-yellow"></i>
      <span class="nav-link-text">Matakuliah</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('mahasiswa')}}">
      <i class="ni ni-single-02 text-default"></i>
      <span class="nav-link-text">Mahasiswa</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{url('semester')}}">
      <i class="ni ni-key-25 text-info"></i>
      <span class="nav-link-text">Semester</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('mengajar')}}">
      <i class="ni ni-calendar-grid-58 text-pink"></i>
      <span class="nav-link-text">Jadwal</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="{{url('jurnal')}}">
      <i class="ni ni-send text-dark"></i>
      <span class="nav-link-text">Jurnal</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('artikelback')}}">
      <i class="ni ni-spaceship text-dark"></i>
      <span class="nav-link-text">Artikel</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('galeri')}}">
      <i class="ni ni-image text-dark"></i>
      <span class="nav-link-text">Galeri</span>
    </a>
  </li>
</ul>
@endsection
@section('content')
<h2>Tabel jurnal</h2><br>

<div class="card">
  <div class="card-header border-0">
    <div class="col align-items-center">
        <h3 class="mb-0">Ubah Jurnal</h3><br>
      <form method="POST" action="{{url('jurnals/'.$data->id)}}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="kegiatan">Judul</label>
                <input type="text" class="form-control" id="kegiatan" value="{{$data->judul}}" name="judul">
            </div>
            <div class="form-group">
                <label for="tahun">Tahun</label>
                <input type="text" class="form-control" id="tahun" value="{{$data->tahun}}" name="tahun">
            </div>
            <div class="form-group">
                <label for="penulis">Nama Dosen</label>
                <select id="penulis" class="form-control" data-toggle="select" title="Simple select" data-placeholder="Pilih Dosen" name="penulis">
                    @foreach($dosen as $dos)
                        @if($dos->nip == $data->dosens_nip)
                            <option value="{{$dos->nip}}" selected>{{$dos->nama}}</option>
                        @else
                            <option value="{{$dos->nip}}">{{$dos->nama}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="lokasi">Lokasi</label>
                <input type="text" class="form-control" id="lokasi" value="{{$data->lokasi}}" name="lokasi">
            </div>
            <div class="radio">
                <label>Tingkat</label><br>
                @if($data->tingkat == 'lokal')
                <label><input type="radio" name="tingkat" value="lokal" checked> Lokal</label>&nbsp&nbsp
                <label><input type="radio" name="tingkat" value="regional"> Regional</label>&nbsp&nbsp
                <label><input type="radio" name="tingkat" value="nasional"> Nasional</label>&nbsp&nbsp
                <label><input type="radio" name="tingkat" value="internasional"> Internasional</label>
                @elseif($data->tingkat == 'regional')
                <label><input type="radio" name="tingkat" value="lokal" > Lokal</label>&nbsp&nbsp
                <label><input type="radio" name="tingkat" value="regional" checked> Regional</label>&nbsp&nbsp
                <label><input type="radio" name="tingkat" value="nasional"> Nasional</label>&nbsp&nbsp
                <label><input type="radio" name="tingkat" value="internasional"> Internasional</label>
                @elseif($data->tingkat == 'nasional')
                <label><input type="radio" name="tingkat" value="lokal" > Lokal</label>&nbsp&nbsp
                <label><input type="radio" name="tingkat" value="regional" > Regional</label>&nbsp&nbsp
                <label><input type="radio" name="tingkat" value="nasional" checked> Nasional</label>&nbsp&nbsp
                <label><input type="radio" name="tingkat" value="internasional"> Internasional</label>
                @else
                <label><input type="radio" name="tingkat" value="lokal" > Lokal</label>&nbsp&nbsp
                <label><input type="radio" name="tingkat" value="regional" > Regional</label>&nbsp&nbsp
                <label><input type="radio" name="tingkat" value="nasional" > Nasional</label>&nbsp&nbsp
                <label><input type="radio" name="tingkat" value="internasional" checked> Internasional</label>
                @endif
            </div>
            <div>
            <a href="{{url('jurnals')}}" class="btn btn-default" role="button">Back</a>
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>      
      </div>
    </div>
  </div>
</div>

@endsection

