<?= $this->extend('admin/login/template'); ?>

<?= $this->section('contentLogin'); ?>
<div class="container register">
    <div class="row justify-content-center">
        <div class="konten col-8">
            <div class="judul">
                <strong><?= lang('Auth.register') ?></strong>
            </div>
            <?= view('Myth\Auth\Views\_message_block') ?>
            <div class="isiform">
                <form action="<?= route_to('register') ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="row">
                        <div class="col-3"></div>
                        <div class="input-group mb-3 col">
                            <span class="input-group-text" id="basic-addon1"><?= lang('Auth.email') ?></span>
                            <input type="email" name="email"
                                class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>"
                                placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" aria-label="email"
                                aria-describedby="basic-addon1">
                            <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
                        </div>
                        <div class="col-3"></div>
                    </div>

                    <div class="row">
                        <div class="col-3"></div>
                        <div class="input-group mb-3 col">
                            <span class="input-group-text" id="basic-addon2"><?= lang('Auth.username') ?></span>
                            <input type="text" name="username"
                                class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>"
                                placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>"
                                aria-label="username" aria-describedby="basic-addon2">
                        </div>
                        <div class="col-3"></div>
                    </div>

                    <div class="row">
                        <div class="col-3"></div>
                        <div class="input-group mb-3 col">
                            <span class="input-group-text" id="basic-addon3"><?= lang('Auth.password') ?></span>
                            <input type="password" name="password"
                                class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"
                                placeholder="<?= lang('Auth.password') ?>" aria-label="password"
                                aria-describedby="basic-addon3">
                        </div>
                        <div class="col-3"></div>
                    </div>

                    <div class="row">
                        <div class="col-3"></div>
                        <div class="input-group mb-3 col">
                            <span class="input-group-text" id="basic-addon4"><?= lang('Auth.repeatPassword') ?></span>
                            <input type="password" name="pass_confirm"
                                class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>"
                                placeholder="<?= lang('Auth.repeatPassword') ?>" aria-label="repeatPassword"
                                aria-describedby="basic-addon4">
                        </div>
                        <div class="col-3"></div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-5"></div>
                        <div class="col ms-2">
                            <button type="submit"
                                class="btn btn-outline-primary"><strong><?= lang('Auth.register') ?></strong></button>
                        </div>
                    </div>
                </form>
            </div>
            <hr>

            <p><?= lang('Auth.alreadyRegistered') ?> <a href="<?= route_to('login') ?>"><?= lang('Auth.signIn') ?></a>
            </p>
        </div>
    </div>
</div>
<div class="div" style="height: 200px;"></div>

<?= $this->endSection(); ?>