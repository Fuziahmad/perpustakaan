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
                        Apakah Anda yakin ingin menyimpan perubahan pada data Anggota ini?
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
            <?php if (session()->has('errors')) : ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach (session('errors') as $error) : ?>
                            <li><?= $error ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php endif ?>
            <h3 class="mb-2">Edit Anggota</h3>
            <hr>
            <form id="editForm" action="<?= base_url('anggota/updateAnggota/' . $getData['id']) ?>" method="post">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" value="<?= old('email', $getData['email']); ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="exampleFormControlInput1" value="<?= old('username', $getData['username']); ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" value="<?= old('nama', $getData['nama']); ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" name="jk" aria-label="Default select example">
                        <?php if (old('jk', $getData['jk']) === 'Laki Laki') : ?>
                            <option value="Laki Laki" selected>Laki Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        <?php elseif (old('jk', $getData['jk']) === 'Perempuan') : ?>
                            <option value="Laki Laki">Laki Laki</option>
                            <option value="Perempuan" selected>Perempuan</option>
                        <?php endif ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea class="form-control" name="alamat"><?= (old('alamat', $getData['alamat'])) ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Status</label>
                    <select class="form-select" name="status" aria-label="Default select example">
                        <?php if (old('status', $getData['status']) === 'Aktif') : ?>
                            <option value="Aktif" selected>Aktif</option>
                            <option value="Pasif">Pasif</option>
                        <?php elseif (old('status', $getData['status']) === 'Pasif') : ?>
                            <option value="Aktif">Aktif</option>
                            <option value="Pasif" selected>Pasif</option>
                        <?php endif ?>
                    </select>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#editModal">Simpan</button>
                </div>
        </div>
        </form>
    </div>
</div>