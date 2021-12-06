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
    <a class="nav-link active" href="{{url('mengajar')}}">
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
<h2>Tabel Prestasi</h2><br>

<div class="card">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Jadwal</h3>
      </div>
      <div class="col text-right">
        <a href="" data-toggle="modal" data-target="#modalTambah">
          <button class="btn btn-icon btn-primary" type="button">
            <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
            <span class="btn-inner--text">Tambah Jadwal</span>
          </button>
        </a>

        <a href="" data-toggle="modal" data-target="#modalImport">
          <button class="btn btn-icon btn-warning" type="button">
            <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
            <span class="btn-inner--text">Import Jadwal</span>
          </button>
        </a>

        <a href="" data-toggle="modal" data-target="#modalImportMhs">
          <button class="btn btn-icon btn-success" type="button">
            <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
            <span class="btn-inner--text">Import Mahasiswa ke Kelas</span>
          </button>
        </a>
      </div>
    </div>
  </div>
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
  <div class="table-responsive">
    <table class="table align-items-center table-flush datatable-basic" id="tablemengajar">
      <thead class="thead-light">
        <tr>
          <th scope="col">Nomor</th>
          <th scope="col">Hari</th>
          <th scope="col">Jam Mulai</th>
          <th scope="col">Jam Selesai</th>
          <th scope="col">Kode Matakuliah</th>
          <th scope="col">Nama Matakuliah</th>
          <th scope="col">KP</th>
          <th scope="col">SKS</th>
          <th scope="col">Ruangan</th>
          <th scope="col">PJMK</th>
          <th scope="col">Semester</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $d)
          <tr>
            <td>{{$d->idmengajars}}</td>
            <td>{{$d->hari}}</td>
            <td>{{$d->jammulai}}</td>
            <td>{{$d->jamberakhir}}</td>
            <td>{{$d->kodemk}}</td>
            <td>{{$d->namamk}}</td>
            <td>{{$d->kp}}</td>
            <td>{{$d->sks}}</td>
            <td>{{$d->ruangan}}</td>
            <td>{{$d->dosen}}</td>
            <td>{{$d->semester}}</td>
            <td class="text-right">
            <div class="dropdown">
                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                  <div class="dropdown-item">
                    <a class="dropdown-item" href="{{url('mengajar/detail/'.$d->idmengajars)}}">Detail</a>
                  </div> 
                  <div class="dropdown-item">
                    <a class="dropdown-item" href="{{url('mengajars/'.$d->idmengajars.'/edit')}}">Edit</a>
                  </div> 
                    <form class="dropdown-item" method="POST" action="{{url('mengajars/'.$d->idmengajars)}}">
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


<!-- Modal -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTambahLabel">Tambah Pembelajaran Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{url('mengajars')}}">
        @csrf
        <div class="form-group">
          <label for="semester">Semester</label>
          <select class="form-control" data-toggle="select" title="Simple select" data-placeholder="Pilih Semester" name="semester">
            @foreach($semester as $sm)
                <option value="{{$sm->idsemester}}">{{$sm->nama_semester}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="dosen">Dosen Pengasuh</label>
          <select class="form-control" data-toggle="select" title="Simple select" data-placeholder="Pilih Dosen" name="dosen">
            @foreach($dosen as $dos)
                <option value="{{$dos->nip}}">{{$dos->nama}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="dosen">Dosen Anggota 1</label>
          <select class="form-control" data-toggle="select" title="Simple select" data-placeholder="Pilih Dosen" name="dosen2">
            <option value="">-</option>
            @foreach($dosen as $dos)
                <option value="{{$dos->nip}}">{{$dos->nama}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="dosen">Dosen Anggota 2</label>
          <select class="form-control" data-toggle="select" title="Simple select" data-placeholder="Pilih Dosen" name="dosen3">
            <option value="">-</option>
            @foreach($dosen as $dos)
                <option value="{{$dos->nip}}">{{$dos->nama}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="matakuliah">Matakuliah</label>
          <select class="form-control" data-toggle="select" title="Simple select" data-placeholder="Pilih Matakuliah" name="matakuliah">
            @foreach($matakuliah as $mk)
                <option value="{{$mk->kodemk}}">{{$mk->namamk}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="kp">Kelas Paralel</label>
          <input type="text" class="form-control" id="kp" placeholder="Kelas Paralel" name="kp">
        </div>
        <div class="form-group">
          <label for="hari">Hari</label>
          <input type="text" class="form-control" id="hari" placeholder="Hari" name="hari">
        </div>
        <div class="form-group">
          <label for="ruangan">Ruangan</label>
          <input type="text" class="form-control" id="ruangan" placeholder="Lapangan Bola" name="ruangan">
        </div>
        <div class="form-group">
          <label for="jammulai">Jam Mulai</label>
          <input type="text" class="form-control" id="jammulai" placeholder="00:00" name="jammulai">
        </div>
        <div class="form-group">
          <label for="jamberakhir">Jam Selesai</label>
          <input type="text" class="form-control" id="jamberakhir" placeholder="00:00" name="jamberakhir">
        </div>
        <div class="form-group">
          <label for="sks">SKS</label>
          <input type="text" class="form-control" id="sks" placeholder="2 (angka)" name="sks">
        </div>
      </div>
      <div class="modal-footer">
        <a href="{{url('mengajars')}}" class="btn btn-default" role="button">Kembali</a>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalImport" tabindex="-1" role="dialog" aria-labelledby="modalImportLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalImportLabel">Import Jadwal Mengajar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" enctype="multipart/form-data" action="{{url('/jadwal/import')}}">
      @csrf
        <div class="form-group">
          <label for="file">Pilih File</label>
          <input type="file" class="form-control" id="file" name="file" accept=".xlsx">
          <span style="color:red;">
            *Format File: xlsx
            <br>
            *File yang diimport hanya membaca halaman pertama saja
            <br>
            *Contoh format, klik <a href="{{ asset('Format_Jadwal.xlsx') }}">disini!</a>
          </span>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modalImportMhs" tabindex="-1" role="dialog" aria-labelledby="modalImportLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalImportLabel">Import Mahasiswa ke Kelas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" enctype="multipart/form-data" action="{{url('/mahasiswa_kelas/import')}}">
      @csrf
        <div class="form-group">
          <label for="file">Pilih File</label>
          <input type="file" class="form-control" id="file" name="file" accept=".xlsx">
          <span style="color:red;">
            *Format File: xlsx
            <br>
            *File yang diimport hanya membaca halaman pertama saja
            <br>
            *Contoh format, klik <a href="{{ asset('Format_Mahasiswa_Kelas.xlsx') }}">disini!</a>
          </span>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('javascript')
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
        $('#tablemengajar').DataTable();
    });
</script> 
@endsection