<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit-data-form-{{ $i }}">
    Edit
</button>

<!-- Modal -->
<div class="modal fade" id="edit-data-form-{{ $i }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-titlep fs-5" id="exampleModalLabel">Edit</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        {{-- Form  --}}
        {{--==============--}}
        <form method="POST" action="{{ url('edit') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="mb-3">
                <label for="img-form" class="form-label">Uploud Foto</label>
                <input type="file" name="img" class="form-control" id="img-form" >
            </div>
            <input type="hidden" name="oldImage" value="{{ $mahasiswa->img }}">
            <div class="mb-3">
                <label for="name-form" class="form-label">Nama Mahasiswa</label>
                <input type="text" name="name" class="form-control" value="{{ $mahasiswa->name }}" id="name-form" >
            </div>
            <div class="mb-3">
                <label for="alamat-form" class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control" value="{{ $mahasiswa->alamat }}" id="alamat-form" >
            </div>
            <div class="mb-3">
                <select name="program_studi" id="prodi" class="form-control" required>
                    <option selected disabled>Pilih Program Studi</option>
                    <option value="Informatika" @if($mahasiswa->program_studi == 'Informatika') selected @endif >INFORMATIKA</option>
                    <option value="Matematika" @if($mahasiswa->program_studi == 'Matematika') selected @endif>Matematika</option>
                    <option value="Psikologi" @if($mahasiswa->program_studi == 'Psikologi') selected @endif>Psikolog</option>
                    <option value="Bahasa" @if($mahasiswa->program_studi == 'Bahasa') selected @endif>Bahasa</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="semester-form" class="form-label">Semester</label>
                <input type="text" name="semester" class="form-control" value="{{ $mahasiswa->semester}}" id="semester-form" >
            </div>
            <div class="mb-3">
                <label for="nim-form" class="form-label">NIM</label>
                <input type="text" name="nim" class="form-control" value="{{ $mahasiswa->nim}}" id="nim-form" >
            </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" >Edit Data</button>
            </div>
            <input type="hidden" name="id" value="{{ $mahasiswa->id }}">
        </form>
    </div>
    </div>
</div>