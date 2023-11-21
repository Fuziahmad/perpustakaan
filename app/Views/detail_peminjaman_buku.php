<div class="container pt-2 ">
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif ?>


    <?php if (in_groups('user')) : ?>
        <a href="<?= base_url('buku/tambah') ?>" class="btn btn-success mb-2">Tambah</a>
    <?php endif ?>

    <div class="card">
        <div class="card-header bg-info text-white">
            <h5 class="card-title">Detail Peminjaman Buku</h5>
        </div>
        <div class="card-body">
            <table class="mb-3">
                <tr>
                    <td><strong>Username</strong></td>
                    <td class="px-2">:</td>
                    <td><strong><?= $getData[0]['username']; ?></strong></td>
                </tr>
                <tr>
                    <td><strong>Nama</strong></td>
                    <td  class="px-2">:</td>
                    <td><strong><?= $getData[0]['nama']; ?></strong></td>
                </tr>
                <tr>
                    <td><strong>Alamat</strong></td>
                    <td  class="px-2">:</td>
                    <td><strong><?= $getData[0]['alamat']; ?></strong></td>
                </tr>
            </table>
            <div class="table-responsive">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Judul Buku</th>
                            <th scope="col">Pengarang</th>
                            <th scope="col">Pinjam</th>
                            <th scope="col">Kembali</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($getData as $isi) : ?>
                            <tr>
                                <th scope="row"><?= $no++; ?></th>
                                <td><?= $isi['judul_buku'] ?></td>
                                <td><?= $isi['pengarang'] ?></td>
                                <td><?= $isi['pinjam'] ?></td>
                                <td><?= $isi['kembali'] ?></td>
                                <td>
                                <span class="badge text-bg-<?= ($isi['status'] === 'Di Pinjam' ? 'warning' : 'success')  ?>"><?= $isi['status'] ?></span>
                                   
                                </td>
                                <td>
                                    <a href="<?= base_url('PeminjamanBuku/kembali/'.$isi['id']); ?>" class="btn btn-primary">Kembali</a>
                                </td>
                            </tr>

                            <!-- Button trigger modal hapus-->
                            <!-- Modal hapus-->
                            <div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Data</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus Buku ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <a href="<?= base_url('buku/deleteBuku/') ?> class=" btn btn-primary">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Modal -->
                        <?php endforeach ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>