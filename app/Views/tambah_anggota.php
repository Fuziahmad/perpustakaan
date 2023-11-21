<div class="container mt-3">
  <div class="row">
    <div class="col-6">
      <h3 class="mb-2">Tambah Anggota</h3>
      <hr>
      <form action="<?= base_url('anggota/createAnggota') ?>" method="post">
        <?= csrf_field() ?>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Nama</label>
          <input type="text" name="nama" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin</label>
          <select class="form-select" name="jk" aria-label="Default select example">
            <option value="Laki Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Alamat</label>
          <textarea class="form-control" name="alamat"></textarea>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Status</label>
          <select class="form-select" name="status" aria-label="Default select example">
            <option value="Aktif">Aktif</option>
            <option value="Pasif">Pasif</option>
          </select>
        </div>
        <div class="mb-3">
          <button class="btn btn-primary" type="submit">Simpan</button>
        </div>
    </div>
    </form>
  </div>
</div>