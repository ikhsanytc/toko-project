<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<style>
    body {
        padding-top: 56px;
    }

    @media (min-width: 768px) {
        body {
            padding-top: 0;
        }
    }

    .about-us-section {
        background-color: #f8f9fa;
        padding: 60px 0;
    }
</style>
<!-- <div class="p-2"></div> -->
<!-- Hero Section -->
<header class="bg-primary text-white text-center py-5">
    <div class="container">
        <div class="p-3"></div>
        <h1 class="display-4">Selamat Datang di Toko Baju Online</h1>
        <p class="lead">Temukan gaya terbaru kami dengan koleksi baju pria dan wanita</p>
    </div>
</header>
<section class="about-us-section" id="about-us">
    <div class="container">
        <div class="row" style="display: flex; justify-content: center; align-items: center;">
            <div class="col-lg-6">
                <h2 class="mb-4">Tentang Kami</h2>
                <p>Toko Baju Online adalah tempat Anda untuk menemukan gaya terbaru dan tren mode terkini. Kami menawarkan koleksi baju pria dan wanita yang dirancang dengan gaya modern dan kualitas terbaik.</p>
                <p>Dengan berbagai pilihan produk, kami berkomitmen untuk memberikan pengalaman berbelanja online yang nyaman dan memuaskan bagi pelanggan kami.</p>
            </div>
            <div class="col-lg-6">
                <h2 class="mb-4">Visi & Misi</h2>
                <h4>Visi</h4>
                <p>Menjadi toko baju online terkemuka dengan memberikan pengalaman belanja yang tak tertandingi.</p>
                <h4>Misi</h4>
                <ul>
                    <li>Menyediakan produk berkualitas tinggi dengan harga terjangkau.</li>
                    <li>Memberikan pelayanan pelanggan yang ramah dan profesional.</li>
                    <li>Terus berinovasi dalam mendefinisikan gaya dan tren fashion.</li>
                    <li>Menjaga kepuasan pelanggan sebagai prioritas utama.</li>
                </ul>
            </div>
        </div>
    </div>
    <div style="padding-bottom: 10em;"></div>
</section>
<!-- Featured Products -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Beberapa Produk</h2>
        <div class="row">
            <?php foreach ($clothes as $clothe) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?= base_url('img/' . $clothe['img']) ?>" class="card-img-top" alt="Product">
                        <div class="card-body">
                            <h5 class="card-title"><?= $clothe['name_product'] ?></h5>
                            <p class="card-text"><?= $clothe['description'] ?></p>
                            <a href="<?= base_url('/detail/' . $clothe['slug'] . '/' . $clothe['uuid_product']) ?>" class="btn btn-primary">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <center>
            <a href="<?= base_url('/produk') ?>" class="btn btn-primary">Lihat Lebih Banyak</a>
        </center>
    </div>
</section>


<!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
    <div class="container">
        <p>&copy; 2024 Toko Baju Online</p>
    </div>
</footer>
<?= $this->endSection() ?>