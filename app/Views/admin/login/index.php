<?= $this->extend('admin/login/template'); ?>

<?= $this->section('contentLogin'); ?>
<div class="container">
    <div class="judul">
        <div class="row">
            <div class="col-2"></div>
            <div class="atas col">
                <strong>Welcome Admin</strong>
            </div>
        </div>
        <div class="row">
            <div class="col-2"></div>
            <div class="bawah col">
                <h4>Enjoy Your Job !</h4>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="konten col-8">
            <div class="judul">
                <strong><?= lang('Auth.loginTitle') ?></strong>
            </div>
            <?= view('Myth\Auth\Views\_message_block') ?>
            <div class="isiform">
                <form action="<?= route_to('login') ?>" method="post">
                    <?= csrf_field() ?>

                    <?php if ($config->validFields === ['email']) : ?>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="input-group mb-3 col">
                            <span class="input-group-text" id="basic-addon1"
                                style="width: 150px;"><?= lang('Auth.email') ?></span>
                            <input type="text"
                                class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
                                placeholder="<?= lang('Auth.email') ?>" aria-label="Username"
                                aria-describedby="basic-addon1">
                            <div class="invalid-feedback">
                                <?= session('errors.login') ?>
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <?php else : ?>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="input-group mb-3 col">
                            <span class="input-group-text" id="basic-addon2"
                                style="width: 150px;"><?= lang('Auth.emailOrUsername') ?></span>
                            <input type="text" name="login"
                                class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
                                placeholder="<?= lang('Auth.emailOrUsername') ?>" aria-label="Username"
                                aria-describedby="basic-addon2">
                            <div class="invalid-feedback">
                                <?= session('errors.login') ?>
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <?php endif; ?>

                    <div class="row">
                        <div class="col-2"></div>
                        <div class="input-group mb-3 col">
                            <span class="input-group-text" id="basic-addon3"
                                style="width: 150px;"><?= lang('Auth.password') ?></span>
                            <input type="password" name="password"
                                class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"
                                placeholder="<?= lang('Auth.password') ?>" aria-label="Password"
                                aria-describedby="basic-addon3">
                            <div class="invalid-feedback">
                                <?= session('errors.password') ?>
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col">
                            <?php if ($config->allowRemembering) : ?>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" name="remember" class="form-check-input"
                                        <?php if (old('remember')) : ?> checked <?php endif ?>>
                                    <?= lang('Auth.rememberMe') ?>
                                </label>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-5"></div>
                        <div class="col ms-2">
                            <button type="submit" class="btn btn-outline-primary"><strong>Login</strong></button>
                        </div>
                    </div>
                </form>
            </div>
            <?php if ($config->activeResetter) : ?>
            <p><a href="<?= route_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a></p>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="div" style="height: 200px;"></div>

<?= $this->endSection(); ?>