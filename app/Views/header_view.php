<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?></title>
  <link href="<?= base_url(); ?>/css/style.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">

</head>

<body>

  <!-- Modal Login -->
  <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center w-100" id="exampleModalLabel">Log in</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <?= view('Myth\Auth\Views\_message_block') ?>
        <div class="modal-body my-3 mx-3">
          <form action="<?= url_to('login') ?>" method="post">
            <?= csrf_field(); ?>

            <div class="form-floating mb-3">
              <input type="text" name="login" class="form-control  <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" id="loginInput" placeholder="<?= lang('Auth.emailOrUsername') ?>">
              <label for="loginInput"><?= lang('Auth.emailOrUsername') ?></label>
              <div class="invalid-feedback">
                <?= session('errors.login') ?>
              </div>
            </div>

            <div class="form-floating mb-3">
              <input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" id="passwordInput" placeholder="Enter your password">
              <label for="passwordInput">Password</label>
              <div class="invalid-feedback">
                <?= session('errors.password') ?>
              </div>
            </div>

            <span class="form-check mb-3">
              <label class="form-check-label" for="rememberPasswordCheck">
                <input class="form-check-input" name="remember" type="checkbox" id="rememberPasswordCheck" <?php if (old('remember')) : ?> checked <?php endif ?>>
                <?= lang('Auth.rememberMe') ?>
              </label>
            </span>

            <div class="d-grid">
              <button type="submit" class="btn btn-lg btn-primary">Log in</button>
            </div>
          </form>

          <p class="mt-3"><a href="<?= url_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a></p>

        </div>
      </div>
    </div>
  </div>


  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand" href="/">Perpustakaan</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link <?= ($title === 'Daftar Buku' || $title === 'Tambah Buku' || $title === 'Edit Buku' ? 'active' : null); ?>" aria-current="page" href="<?= base_url('buku') ?>">Buku</a>
          </li>

          <?php if (logged_in()) : ?>
            <li class="nav-item">
              <a class="nav-link <?= ($title === 'Buku Saya' ? 'active' : null); ?>" aria-current="page" href="<?= base_url('Buku/bukuSaya') ?>">Buku Saya</a>
            </li>
          <?php endif ?>
          <?php if (in_groups('admin')) : ?>
            <li class="nav-item">
              <a class="nav-link <?= ($title === 'Daftar Peminjaman Buku' ? 'active' : null); ?>" aria-current="page" href="<?= base_url('peminjamanBuku') ?>">Pinjaman Buku</a>
            </li>
          <?php endif ?>

          <?php if (in_groups('admin')) : ?>
            <li class="nav-item">
              <a class="nav-link <?= ($title === 'Daftar Anggota' || $title === 'Tambah Anggota' || $title === 'Edit Anggota' ? 'active' : null); ?>" href="<?= base_url('anggota') ?>">Anggota</a>
            </li>
          <?php endif ?>
          <li class="nav-item">
            <a class="nav-link <?= ($title === 'Maker' || $title === 'Maker' || $title === 'Maker' ? 'active' : null); ?>" href="<?= base_url('maker') ?>">Maker</a>
          </li>
        </ul>

        <div class="navbar-nav ms-auto">
          <?php if (!logged_in()) :  ?>
            <li class="nav-item">
              <a class="nav-link <?= ($title === 'Daftar Maker' || $title === 'Tambah Maker' || $title === 'Edit Maker' ? 'active' : null); ?>" href="" data-bs-toggle="modal" data-bs-target="#loginModal">Login/Register</a>
            </li>
          <?php else : ?>
            <div class="btn-group">
              <button type="button" class="btn dropdown-toggle border-0" data-bs-toggle="dropdown" aria-expanded="false">
                <strong>hi.. <?= user()->nama; ?></strong>
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?= base_url('anggota/profil/' . user()->id); ?>">Profil</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <?php if (!logged_in()) : ?>
                  <li><button class="btn border-0" type="button" data-bs-toggle="modal" data-bs-target="#loginModal" style="margin-left: 3px;">Log in</button></li>
                <?php endif  ?>
                <li><a class="dropdown-item" href="<?= base_url('logout'); ?>">Logout</a></li>
              </ul>
            </div>
          <?php endif ?>

        </div>
      </div>
    </div>
  </nav>