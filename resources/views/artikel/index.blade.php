@extends('layouts.argon')
@section('sidenav')
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link " href="{{url('dashboard')}}">
      <i class="ni ni-tv-2 text-primary"></i>
      <span class="nav-link-text">Dashboard</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('profil')}}">
      <i class="ni ni-planet text-success"></i>
      <span class="nav-link-text">Profil</span>
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
    <a class="nav-link" href="{{url('semester')}}">
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
    <a class="nav-link" href="{{url('jurnalback')}}">
      <i class="ni ni-send text-dark"></i>
      <span class="nav-link-text">Jurnal</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('penelitianback')}}">
      <i class="ni ni-ruler-pencil text-dark"></i>
      <span class="nav-link-text">Penelitian</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="{{url('artikelback')}}">
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
  <li class="nav-item">
    <a class="nav-link" href="{{url('user')}}">
      <i class="ni ni-single-02 text-dark"></i>
      <span class="nav-link-text">User</span>
    </a>
  </li>
</ul>
@endsection
@section('nama')
  <span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->name }}</span>
@endsection
@section('content')
<h2>Daftar Matakuliah</h2><br>
<div class="accordion" id="accordionExample">
    <div class="card">
        <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <h3 class="mb-0">Tambah Artikel</h3>
        </div>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
              @if(session('status'))
                <div class="alert alert-success" role="alert">
                    {{session('status')}}
                </div>
              @endif
              @if(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{session('error')}}
                </div>
              @endif
              <div class="m-4">
                <form enctype="multipart/form-data" method="POST" action="{{url('artikels')}}">
                    @csrf
                      <div class="form-group">
                        <label for="judul">Judul Artikel</label>
                        <input type="text" class="form-control" id="judul" placeholder="judul artikel" name="judul">
                      </div>
                      <div class="form-group">
                        <label for="isi">Isi Artikel</label>
                        <textarea id="isi" name="isi"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar">
                      </div>
                      <div class="form-group text-right">
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                  </form>
              </div>
            </div>
        </div>
  </div>
</div>
<div class="card">
    <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Data Artikel</h3>
      </div>
      <br>
    </div>
    </div>
    <div class="table-responsive">
    <table class="table align-items-center table-flush datatable-basic" id="tableartikel">
      <thead class="thead-light">
        <tr>
          <th scope="">Judul Artikel</th>
          <th scope="">Tanggal Publish</th>
          <th scope="">Isi</th>
          <th scope="">Gambar</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      @foreach($data as $d)
          <tr>
          <td>{{$d->judul}}</td>
          <td>{{date('d-m-Y',strtotime($d->tanggal))}}</td>
          <td name="isi">{{$d->isi}}</td>
          <td><img src="{{asset('assets/undana/artikel/'.$d->gambar)}}" height='100px'/></td>
          <td class="text-right">
            <div class="dropdown">
                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                  <div class="dropdown-item">
                    <a class="dropdown-item" href="{{url('artikels/'.$d->idartikels.'/edit')}}">Edit</a>
                  </div> 
                    <form class="dropdown-item" method="POST" action="{{url('artikels/'.$d->idartikels)}}">
                      @csrf
                      @method('DELETE')
                      <input class="dropdown-item" type="submit" value="Hapus" onclick="if(!confirm('apakah anda yakin menghapus data ini?')) return false;">
                    </form>
                </div>
            </div>
          </td>
          </tr>
          @endforeach
      </tbody>
    </table>
  </div>
    </div>
</div>

@endsection
@section('javascript')
<script>
    CKEDITOR.replace( 'isi' );
</script>
<script type="text/javascript">
    // START SCRIPT TABEL
    $.extend($.fn.dataTable.defaults, {
    	autoWidth: false,
    	columnDefs: [{
    		orderable: false,
    		width: '100px'
    	}],
    	dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
    	language: {
    		search: '<span>Filter:</span> _INPUT_',
            // searchPlaceholder: 'Type to filter...',
            lengthMenu: '<span>Menampilkan :</span> _MENU_',
            paginate: {'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;'}
        },
        drawCallback: function () {
        	$(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
        },
        preDrawCallback: function () {
        	$(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
        }
    });
    $('.datatable-basic').DataTable();
    // END SCRIPT TABEL

    $(document).ready( function () {
        $('#tablematakuliah').DataTable();
    });
</script> 
@endsection

