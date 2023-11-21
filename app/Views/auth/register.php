    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 ">
          <div class="card border-0 shadow rounded-3 my-5">
            <div class="card-body p-4 p-sm-5">
              <h5 class="card-title text-center mb-5"><?= lang('Auth.register') ?></h5>
              <?= view('Myth\Auth\Views\_message_block') ?>
              <form action="<?= url_to('register') ?>" method="post">
                <?= csrf_field() ?>

                <div class="form-floating mb-3">
                  <input type="text" name="username" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" id="floatingInput" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                  <label for="floatingInput">Username</label>
                </div>

                <div class="form-floating mb-3">
                  <input type="email" name="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" id="floatingInput" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                  <label for="floatingInput">Email</label>
                  <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
                </div>

                <div class="form-floating mb-3">
                  <input type="text" name="nama" class="form-control" id="floatingInput" aria-describedby="namaHelp" placeholder="Nama" value="<?= old('nama'); ?>">
                  <label for="floatingInput">Nama</label>
                </div>

                <div class="form-floating mb-3">
                  <select name="jk" class="form-select" aria-label="Default select example" required>
                    <option disabled selected>Jenis Kelamin</option>
                    <option value="Laki Laki" <?= (old('jk') === 'Laki Laki' ? 'selected' : ''); ?>>Laki Laki</option>
                    <option value="Perempuan" <?= (old('jk') === 'Perempuan' ? 'selected' : ''); ?>>Perempuan</option>
                  </select>
                </div>


                <div class="form-floating mb-3">
                  <textarea type="text" name="alamat" class="form-control" id="floatingInput" aria-describedby="alamatHelp" placeholder="Alamat" style="height: 100px;"><?= old('alamat'); ?></textarea>
                  <label for="floatingInput">Alamat</label>
                </div>

                <div class="form-floating mb-3">
                  <select name="status" class="form-select" aria-label="Default select example" required>
                    <option selected disabled>Status</option>
                    <option value="Aktif" <?= (old('status') === 'Aktif' ? 'selected' : ''); ?>>Aktif</option>
                    <option value="Pasif" <?= (old('status') === 'Pasif' ? 'selected' : ''); ?>>Pasif</option>
                  </select>
                </div>

                <div class="form-floating mb-3">
                  <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" id="floatingInput" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                  <label for="floatingInput">Password</label>
                </div>

                <div class="form-floating mb-3">
                  <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" id="floatingInput" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                  <label for="floatingInput">Password Confirm</label>
                </div>
                <div class="d-grid">
                  <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit"><?= lang('Auth.register') ?></button>
                </div>
              </form>
              <hr>
              <p><?= lang('Auth.alreadyRegistered') ?> <a href="<?= url_to('login') ?>"><?= lang('Auth.signIn') ?></a></p>
            </div>
          </div>
        </div>
      </div>
    </div>