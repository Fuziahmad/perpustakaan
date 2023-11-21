<div class="container mt-3">
    <div class="row">
        
        <!-- Button trigger modal -->
      
            <!-- Modal -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Edit Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda yakin ingin menyimpan perubahan pada data Buku ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="button" class="btn btn-primary" onclick="document.querySelector('#editForm').submit();">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
              <!-- end Modal -->
            
            <div class="col-6">
                <h3 class="mb-2">Edit Buku</h3>
                <hr>
            <form id="editForm" action="/buku/updateBuku/<?= $getData['kd_buku']; ?>" method="post">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Judul Buku</label>
                    <input type="text" name="judul_buku" class="form-control" id="exampleFormControlInput1" value="<?= old('judul_buku', $getData['judul_buku']); ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Pengarang</label>
                    <input type="text" class="form-control" name="pengarang" id="exampleFormControlInput1" value="<?= old('pengarang', $getData['pengarang']); ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Penerbit</label>
                    <input type="text" class="form-control" name="penerbit" id="exampleFormControlInput1" value="<?= old('penerbit', $getData['penerbit']); ?>">
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#editModal">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
