@extends('layouts.argon')
@section('content')
<h2>Tabel Prestasi</h2><br>

<div class="card">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <form method="POST" action="{{url('matakuliahs/'.$data->kodemk)}}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="kode">Kode Matakuliah</label>
                <input type="text" class="form-control" id="kode" name="kode" value="{{$data->kodemk}}" disabled>
            </div>
            <div class="form-group">
                <label for="nama">Nama Matakuliah</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{$data->namamk}}">
            </div>
            <div class="form-group">
                <label for="sks">Jumlah SKS</label>
                <input type="text" class="form-control" id="sks" name="sks" value="{{$data->sks}}">
            </div>
            <div>
                <a href="{{url('matakuliahs')}}" class="btn btn-default" role="button">Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>      
      </div>
    </div>
  </div>
</div>

@endsection

