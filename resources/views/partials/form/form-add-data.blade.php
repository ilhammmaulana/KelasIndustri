<!-- Button trigger modal -->


<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-data-form">
    Tambah Data
</button>

<!-- Modal -->


<div class="modal fade" id="add-data-form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-titlep fs-5" id="exampleModalLabel">Tambah Mahasiswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        {{-- Form  --}}
        {{--==============--}}
        <form method="POST" action="{{ url("add") }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="mb-3">
                <label for="img-form" class="form-label">Uploud Foto</label>
                <input required type="file" name="img" class="form-control" id="img-form" >
            </div>
            <div class="mb-3">
                <label for="name-form" class="form-label">Nama Mahasiswa</label>
                <input required type="text" name="name" class="form-control" id="name-form" >
            </div>
            <div class="mb-3">
                <label for="alamat-form" class="form-label">Alamat</label>
                <input required type="text" name="alamat" class="form-control" id="alamat-form" >
            </div>
            <div class="mb-3">
                <select required name="program_studi" id="program_studi" class="form-control" required>
                    <option selected disabled>Pilih Program Studi</option>
                    <option value="Informatika">Informatika</option>
                    <option value="Matematika">Matematika</option>
                    <option value="Psikologi">Psikologi</option>
                    <option value="Bahasa">Bahasa</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="semester-form" class="form-label">Semester</label>
                <input required type="text" name="semester" class="form-control" id="semester-form" >
            </div>
            <div class="mb-3">
                <label for="nim-form" class="form-label">NIM</label>
                <input required type="text" name="nim" class="form-control" id="nim-form" >
            </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" >Tambahh Data</button>
            </div>
        </form>
    </div>
    </div>
</div>