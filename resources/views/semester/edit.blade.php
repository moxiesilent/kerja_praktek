@extends('layouts.argon')
@section('content')
<h2>Tabel Prestasi</h2><br>

<div class="card">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <form method="POST" action="{{url('semesters/'.$data->idsemester)}}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="kegiatan">Nama Semester</label>
                <input type="text" class="form-control" id="kegiatan" name="kegiatan" value="{{$data->nama_semester}}">
            </div>
            <div>
            <a href="{{url('semesters')}}" class="btn btn-default" role="button">Back</a>
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>      
      </div>
    </div>
  </div>
</div>

@endsection

