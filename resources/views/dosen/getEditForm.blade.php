<form method="POST" action="{{url('dosens/'.$data->nip)}}">
    <div class="modal-header">
    <h5 class="modal-title" id="modalEditLabel">Tambah Prestasi Baru</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="kegiatan">Nama kegiatan</label>
        <input type="text" class="form-control" id="kegiatan" name="kegiatan" value="{{$data->nama}}">
    </div>
    <div class="form-group">
        <label for="tahun">Tahun</label>
        <input type="text" class="form-control" id="tahun" name="tahun" value="{{$data->jabatan}}">
    </div>
    <br>
    <div class="form-group">
        <label for="prestasi">Prestasi yang dicapai</label>
        <input type="text" class="form-control" id="prestasi" placeholder="Juara x Kategori xxx" name="prestasi" value="{{$data->jabatan}}">
    </div>
    </div>
    <div class="modal-footer">
    <a href="{{url('dosens')}}" class="btn btn-default" role="button">Back</a>
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>      