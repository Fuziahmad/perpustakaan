<div class="container pt-2 ">
  <div class="row">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
      <div class="card border-0 shadow rounded-3 my-5">
        <div class="card-body p-4 p-sm-5">
          <?= view('Myth\Auth\Views\_message_block') ?>
          <h5 class="card-title text-center mb-5">Log in</h5>

          <form action="<?= url_to('login') ?>" method="post">
            <?= csrf_field() ?>

            <?php if ($config->validFields === ['email']) : ?>
              <div class="form-floating mb-3">
                <input type="email" name="login" class="form-control  <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" id="floatingInput" placeholder="<?= lang('Auth.email') ?>">
                <label for="floatingInput"><?= lang('Auth.email') ?></label>
                <div class="invalid-feedback">
                  <?= session('errors.login') ?>
                </div>
              </div>
            <?php else : ?>
              <div class="form-floating mb-3">
                <input type="text" name="login" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" id="floatingInput" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                <label for="floatingInput"><?= lang('Auth.emailOrUsername') ?></label>
                <div class="invalid-feedback">
									<?= session('errors.login') ?>
								</div>
              </div>
            <?php endif; ?>

            <div class="form-floating mb-3">
              <input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" id="floatingPassword" placeholder="<?= lang('Auth.password') ?>">
              <label for="floatingPassword"><?= lang('Auth.password') ?></label>
              <div class="invalid-feedback">
								<?= session('errors.password') ?>
							</div>
            </div>

            <?php if ($config->allowRemembering) : ?>
            <div class="form-check mb-3">
            <label class="form-check-label">
									<input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
									<?= lang('Auth.rememberMe') ?>
								</label>
            </div>
            <?php endif; ?>

            <div class="d-grid">
              <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit"><?= lang('Auth.loginAction') ?></button>
            </div>
            <hr class="my-4">

            <?php if ($config->allowRegistration) : ?>
						<p><a href="<?= url_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a></p>
					<?php endif; ?>
					<?php if ($config->activeResetter) : ?>
						<p><a href="<?= url_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a></p>
					<?php endif; ?>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>