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

    .product-image {
        max-width: 100%;
    }
</style>
<!-- Product Detail Section -->
<!-- <div class="p-3"></div> -->
<section class="py-5">
    <div class="container">
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan') ?>
            </div>
        <?php endif; ?>
        <!-- <h2 class="text-center">Produk 'name product'</h2> -->
        <!-- <div class="p-2"></div> -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="<?= base_url('img/' . $clothe['img']) ?>" alt="Image produk" class="img-fluid product-image">
                    </div>
                    <div class="col-md-6">
                        <h2><?= $clothe['name_product'] ?></h2>
                        <p class="text-muted"><?= $clothe['category'] ?></p>
                        <p class="lead"><?= $clothe['description'] ?></p>
                        <h3 class="text-primary">Rp <?= number_format($clothe['price'], 0, ',', '.') ?>,-</h3>
                        <p>Stok: 50</p>
                        <form action="<?= base_url('/keranjang') ?>" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="uuid" value="<?= $clothe['uuid_product'] ?>">

                            <div class="mb-3">
                                <label for="quantity" class="form-label">Jumlah:</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1" required>
                            </div>
                            <?php if (!isset($_COOKIE['login'])) : ?>
                                <button type="button" class="btn btn-primary" disabled>Tambah ke Keranjang</button>
                                <button type="button" class="btn btn-primary">Log in</button>
                            <?php else : ?>
                                <button type="submit" class="btn btn-primary">Tambah ke Keranjang</button>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
    <div class="container">
        <p>&copy; 2024 Toko Baju Online</p>
    </div>
</footer>
<?= $this->endSection() ?>