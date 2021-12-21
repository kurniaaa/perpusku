<?= $this->extend('auth/template'); ?>

<?= $this->section('content'); ?>
<div class="card-body">
    <p class="login-box-msg"><?= lang('Auth.register') ?></p>
    <?= view('Myth\Auth\Views\_message_block') ?>
    <form action="<?= route_to('register') ?>" method="post">
        <?= csrf_field() ?>
        <div class="input-group mb-3">
            <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
            <div class=" input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
            <div class="invalid-feedback">
                <?= session('errors.email') ?>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" value="<?= old('username') ?>" placeholder="Username">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
            <div class="invalid-feedback">
                <?= session('errors.username') ?>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" autocomplete="off" placeholder="<?= lang('Auth.password') ?>">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
            <div class="invalid-feedback">
                <?= session('errors.password') ?>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="password" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm" placeholder="<?= lang('Auth.repeatPassword') ?>">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
            <div class="invalid-feedback">
                <?= session('errors.pass_confirm') ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.register') ?></button>
            </div>
            <!-- /.col -->
        </div>
    </form>
    <p class="mt-3 mb-1">
        <?= lang('Auth.alreadyRegistered') ?>
        <a href="<?= route_to('login') ?>" class="text-center"><?= lang('Auth.signIn') ?></a>
    </p>
</div>
<!-- /.form-box -->
<?= $this->endSection(); ?>