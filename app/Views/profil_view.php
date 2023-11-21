<div class="container pt-2">
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif ?>


    <div class="card">
        <div class="card-header bg-info text-white">
            <h5 class="card-title">Profil</h5>
        </div>
        <div class="card-body">
            <div class="row">
            <?php if (session()->has('errors')) : ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach (session('errors') as $error) : ?>
                            <li><?= $error ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php endif ?>
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
                                Apakah Anda yakin ingin menyimpan perubahan pada profil?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-primary" onclick="document.querySelector('#editForm').submit();">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end Modal -->

                <form id="editForm" action="<?= base_url('anggota/updateProfil/' . user()->id) ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Username</span>
                        <input type="text" name="username" class="form-control" aria-label="Username" value="<?= old('username', $getData['username']); ?>">

                        <span class="input-group-text">Email</span>
                        <input type="email" name="email" value="<?= old('email', $getData['email']); ?>"class="form-control" aria-label="Server">
                    </div>
                    
                    <div class="input-group mb-3">
                        <span class="input-group-text">Nama</span>
                        <input type="text" name="nama" value="<?= old('nama', $getData['nama']); ?>"class="form-control" aria-label="nama">

                        <span class="input-group-text">Jenis Kelamin</span>
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
                    <div class="input-group mb-3">
                        <span class="input-group-text">Alamat</span>
                        <textarea name="alamat" class="form-control" aria-label="Username"><?= old('alamat', $getData['alamat']); ?></textarea>

                    </div>
                    <div class="mb-3 w-100 d-flex justify-content-end">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#editModal">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>