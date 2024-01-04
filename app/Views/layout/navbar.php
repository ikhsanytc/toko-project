<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Toko Baju</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link <?= ($title == 'Home') ? 'active' : '' ?>" href="<?= base_url('/') ?>">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($title == 'Produk kami') ? 'active' : '' ?>" href="<?= base_url('/produk') ?>">Produk</a>
                </li>
                <?php if ($title == 'Home') : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#about-us">Tentang Kami</a>
                    </li>
                <?php endif; ?>
                <?php if (isset($_COOKIE['login'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link <?= ($title == 'Keranjang') ? 'active' : '' ?>" href="<?= base_url('/keranjang') ?>">Keranjang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($title == 'Transaksi kamu') ? 'active' : '' ?>" href="<?= base_url('/transaction') ?>">Transaksi</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a href="<?= base_url('/login') ?>" class="nav-link <?= ($title == 'Login') ? 'active' : '' ?>">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('/register') ?>" class="nav-link <?= ($title == 'Register') ? 'active' : '' ?>">Register</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<div class="p-2"></div>