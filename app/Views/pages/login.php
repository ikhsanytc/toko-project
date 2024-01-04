<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<style>
    body {
        background-color: #f8f9fa;
    }

    .login-container {
        max-width: 400px;
        margin: auto;
        margin-top: 100px;
    }
</style>
<section class="login-container">
    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>
    <div class="card">
        <div class="card-body">
            <h2 class="text-center mb-4">Login</h2>
            <form method="post" action="<?= base_url('/login') ?>">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" required name="name">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" required name="password">
                </div>
                <!-- <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember">
                    <label class="form-check-label" for="remember">Ingat Saya</label>
                </div> -->
                <button type="submit" class="btn btn-primary" style="width: 100%;">Login</button>
            </form>
            <div class="mt-3 text-center">
                <a href="<?= base_url('/register') ?>">Don't have account? Register</a>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>