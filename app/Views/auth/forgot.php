<?= $this->extend('auth/template'); ?>

<?= $this->section('content'); ?>
<div class="card-body">
    <p class="login-box-msg"><?= lang('Auth.forgotPassword') ?></p>

    <?= view('Myth\Auth\Views\_message_block') ?>

    <p><?= lang('Auth.enterEmailForInstructions') ?></p>
    <form action="<?= route_to('forgot') ?>" method="post">
        <?= csrf_field() ?>
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control<?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.emailAddress') ?>">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
            <div class="invalid-feedback">
                <?= session('errors.email') ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.sendInstructions') ?></button>
            </div>
            <!-- /.col -->
        </div>
    </form>
    <p class="mt-3 mb-1">
        <a href="<?= route_to('login') ?>" class="text-center"><?= lang('Auth.signIn') ?>?</a>
    </p>
</div>
<!-- /.login-card-body -->
<?= $this->endSection(); ?>