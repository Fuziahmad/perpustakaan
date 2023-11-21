<div class="container mt-3">
    <div class="row">
        <div class="col-6">
        <h3 class="mb-2">Tambah Buku</h3>
                <hr>
            <form action="<?= base_url('buku/createBuku') ?>" method="post">
            <?= csrf_field() ?>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Judul Buku</label>
  <input type="text" name="judul_buku" class="form-control" id="exampleFormControlInput1">
</div>
<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label">Pengarang</label>
  <input type="text" class="form-control" name="pengarang" id="exampleFormControlInput1">
</div>
<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label">Penerbit</label>
  <input type="text" class="form-control" name="penerbit" id="exampleFormControlInput1">
</div>
<div class="mb-3">
<button class="btn btn-primary" type="submit">Simpan</button>
</div>
</div>
</form>
</div>
</div>