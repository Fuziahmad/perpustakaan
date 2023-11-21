<div class="container pt-2">
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif ?>


    <div class="card">
        <div class="card-header bg-info text-white">
            <h5 class="card-title">Buku Saya</h5>
        </div>
        <div class="card-body">
            <p>Total Buku : <?= $jumlahPeminjaman; ?></p>
            <div class="row">
                <?php foreach ($getData as $isi) : ?>
                    <div class="col-sm-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?= $isi['judul_buku'] ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?= $isi['pengarang'] ?></h6>
                                <p class="card-text">Penerbit : <?= $isi['penerbit'] ?></p>
                                <p class="text-body-secondary text-sm">Tgl Pinjam <?= $isi['pinjam']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>