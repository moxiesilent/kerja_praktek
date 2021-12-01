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
    <a class="nav-link active" href="{{url('dosen')}}">
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
<h2>Daftar Dosen</h2><br>
<div class="card">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Daftar Dosen</h3>
      </div>
      <div class="col text-right">
        <a href="" data-toggle="modal" data-target="#modalTambah">
          <button class="btn btn-icon btn-primary" type="button">
            <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
            <span class="btn-inner--text">Tambah Dosen</span>
          </button>
        </a>
        <a href="" data-toggle="modal" data-target="#modalImport">
          <button class="btn btn-icon btn-warning" type="button">
            <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
            <span class="btn-inner--text">Import Dosen</span>
          </button>
        </a>
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
  </div>
  <div class="table-responsive" width="100%">
    <table class="table align-items-center table-flush datatable-basic" id="tabledosen">
      <thead class="thead-light">
        <tr>
          <th>NIP</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Jabatan</th>
          <th>Bidang Keahlian</th>
          <th>Foto</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $d)
          <tr>
          <td>{{$d->nip}}</td>
          <td>{{$d->nama}}</td>
          <td>{{$d->email}}</td>
          <td>{{$d->jabatan}}</td>
          <td>{{$d->bidangkeahlian}}</td>
          <td><img src="{{asset('images/'.$d->foto)}}" height='100px'/></td>
          <td class="text-right">
            <div class="dropdown">
                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                  <div class="dropdown-item">
                    <a class="dropdown-item" href="{{url('dosen/detail/'.$d->nip)}}">Detail</a>
                  </div> 
                  <div class="dropdown-item">
                    <a class="dropdown-item" href="{{url('dosens/'.$d->nip.'/edit')}}">Edit</a>
                  </div> 
                    <form class="dropdown-item" method="POST" action="{{url('dosens/'.$d->nip)}}">
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
        <h5 class="modal-title" id="modalTambahLabel">Tambah Dosen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form enctype="multipart/form-data" method="POST" action="{{url('dosens')}}">
      @csrf
        <div class="form-group">
          <label for="nip">NIP</label>
          <input type="text" class="form-control" id="nip" placeholder="1234xxxx" name="nip">
        </div>
        <div class="form-group">
          <label for="nama">Nama Lengkap</label>
          <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap" name="nama">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" placeholder="contoh@gmail.com" name="email">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="form-group">
          <label for="tanggallahir">Tanggal Lahir</label>
          <input type="date" class="form-control" id="tanggallahir" placeholder="01/01/1990" name="tanggallahir">
        </div>
        <div class="form-group">
          <div class="radio">
              <label>Jenis Kelamin</label><br>
              <label><input type="radio" name="jeniskelamin" value="laki-laki"> Laki-laki</label>&nbsp&nbsp
              <label><input type="radio" name="jeniskelamin" value="perempuan"> Perempuan</label>&nbsp&nbsp
          </div>
        </div>
        <div class="form-group">
          <label for="alamat">Alamat</label>
          <textarea class="form-control" id="alamat" name="alamat"></textarea>
        </div>
        <div class="form-group">
          <label for="riwayatpendidikan">Riwayat Pendidikan</label>
          <textarea class="form-control" id="riwayatpendidikan" name="riwayatpendidikan"></textarea>
        </div>
        <div class="form-group">
          <label for="jabatan">Jabatan</label>
          <input type="text" class="form-control" id="jabatan" placeholder="dosen" name="jabatan">
        </div>
        <div class="form-group">
          <label for="bidang">Bidang Keahlian</label>
          <textarea class="form-control" id="bidang" placeholder="Olahraga Pendidikan, Ilmu Kesehatan Olahraga, Pendidikan Olahraga, ..." name="bidang"></textarea>
        </div>
        <div class="form-group">
          <label for="foto">Foto</label>
          <input type="file" class="form-control" id="foto" name="foto">
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

    </div>
  </div>
</div>

<div class="modal fade" id="modalImport" tabindex="-1" role="dialog" aria-labelledby="modalImportLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalImportLabel">Import Dosen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" enctype="multipart/form-data" action="{{url('/dosen/import')}}">
      @csrf
        <div class="form-group">
          <label for="file">Pilih File</label>
          <input type="file" class="form-control" id="file" name="file" accept=".xlsx">
          <span style="color:red;">
            *Format File: xlsx
            <br>
            *File yang diimport hanya membaca halaman pertama saja
            <br>
            *Contoh format, klik <a href="{{ asset('Format_Dosen.xlsx') }}">disini!</a>
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
        $('#tabledosen').DataTable();
    });
</script> 
@endsection