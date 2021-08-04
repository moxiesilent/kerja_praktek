@extends('layouts.argon')
@section('content')
<h2>Tabel Prestasi</h2><br>

<div class="card">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <form method="POST" action="{{url('prestasis/'.$data->idprestasi)}}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="kegiatan">Nama kegiatan</label>
                <input type="text" class="form-control" id="kegiatan" name="kegiatan" value="{{$data->namakegiatan}}">
            </div>
            <div class="form-group">
                <label for="tahun">Tahun</label>
                <input type="text" class="form-control" id="tahun" name="tahun" value="{{$data->tahun}}">
            </div>
            <div class="radio">
                <label>Tingkat</label><br>
                <label><input type="radio" name="tingkat" value="lokal"> Lokal</label>&nbsp&nbsp
                <label><input type="radio" name="tingkat" value="regional"> Regional</label>&nbsp&nbsp
                <label><input type="radio" name="tingkat" value="nasional"> Nasional</label>&nbsp&nbsp
                <label><input type="radio" name="tingkat" value="internasional"> Internasional</label>
            </div><br>
            <div class="form-group">
                <label for="prestasi">Prestasi yang dicapai</label>
                <input type="text" class="form-control" id="prestasi" placeholder="Juara x Kategori xxx" name="prestasi" value="{{$data->prestasi}}">
            </div>
            <div>
            <a href="{{url('prestasis')}}" class="btn btn-default" role="button">Back</a>
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>      
      </div>
    </div>
  </div>
</div>

@endsection

