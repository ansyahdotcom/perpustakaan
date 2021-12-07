<?= $this->extend('layout/template_login') ?>
<?= $this->section('content'); ?>
<div class="login-box">
    <div class="flash-data" data-flashdata="<?= session()->get('message') ?>"></div>
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a>
        </div>
        <div class="card-body">

            <form action="login/login" method="post">
                <?= csrf_field() ?>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Username" name="username" required autocomplete="off" autofocus>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                </div>
                <div class="row">
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>