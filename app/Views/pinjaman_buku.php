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
            <h5 class="card-title">Data Pinjaman Buku</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Username</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $displayedIds = []; 
                        foreach ($getData as $isi) :
                            if (!in_array($isi['id_user'], $displayedIds)) {
                                array_push($displayedIds, $isi['id_user']); 
                        ?>
                                <tr>
                                    <th scope="row"><?= $no++; ?></th>
                                    <td><?= $isi['username'] ?></td>
                                    <td><?= $isi['nama'] ?></td>
                                    <td><?= $isi['alamat'] ?></td>
                                    <td>
                                        <a href="PeminjamanBuku/detail/<?= $isi['id_user']; ?>" class="btn btn-success">Detail</a>
                                    </td>
                                </tr>
                        <?php
                            }
                        endforeach
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
