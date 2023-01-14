<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-form-{{ $i }}" >
  Hapus
</button>

<!-- Modal -->
<div class="modal fade" id="delete-form-{{ $i }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Yakin menghapus mahasiswa ini?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Klik hapus untuk menghapus data Mahasiswa</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form method="POST" action="{{ url('delete') }}">
          <input type="hidden" name="oldImg" value="{{ $mahasiswa->img }}">
          {{ csrf_field() }}
          <input type="hidden" value="{{ $mahasiswa->id }}" name="id">
          <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
      </div>
    </div>
  </div>
</div>