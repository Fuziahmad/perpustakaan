<div class="container pt-2 ">
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif ?>

    <a href="<?= base_url('register') ?>" class="btn btn-success mb-2">Tambah Data</a>
    <div class="card">
  <div class="card-header bg-info text-white">
  <h5 class="card-title">Data Anggota</h5>
  </div>
  <div class="card-body">
    <div class="table-responsive">
        <table id="myTable" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Email</th>
      <th scope="col">Username</th>
      <th scope="col">Nama</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">Alamat</th>
      <th scope="col">Status</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1; foreach($getData as $isi) { ?>
    <tr>
      <th scope="row"><?= $no++; ?></th>
      <td><?= $isi['email'] ?></td>
      <td><?= $isi['username'] ?></td>
      <td><?= $isi['nama'] ?></td>
      <td><?= $isi['jk']?></td>
      <td><?= $isi['alamat'] ?></td>
      <td><?= $isi['status'] ?></td>
      <td>
        <a href="<?= base_url('anggota/editAnggota/'.$isi['id']) ?>" class="btn btn-success mb-2">Edit</a>
        <button type="button" class="btn btn-danger" id="hapusModal"  data-bs-toggle="modal" data-bs-target="#hapusModal<?= $isi['id'] ?>">Hapus</button>
      </td>
    </tr>

    <!-- Button trigger modal -->
              <!-- Modal -->
              <div class="modal fade" id="hapusModal<?= $isi['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Data</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Apakah Anda yakin ingin menghapus Anggota ini?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                      <a href="<?= base_url('anggota/deleteAnggota/' . $isi['id']) ?>" class="btn btn-primary">Hapus</a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Modal -->

    <?php } ?>
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