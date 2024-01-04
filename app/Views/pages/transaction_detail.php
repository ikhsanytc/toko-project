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
                        <img src="<?= base_url('img/' . $transaction['img']) ?>" alt="Image produk" class="img-fluid product-image">
                    </div>
                    <div class="col-md-6">
                        <h2><?= $transaction['name_product'] ?></h2>
                        <?php if ($transaction['status'] == 'settlement') : ?>
                            <p class="lead">Transaksi telah di selesaikan oleh <?= $user['name'] ?></p>
                        <?php elseif ($transaction['status'] == 'pending') : ?>
                            <p class="lead">Transaksi belum di selesaikan, selesaikan cepat sebelum expired</p>
                        <?php endif; ?>
                        <h3 class="text-primary">Rp <?= number_format($transaction['gross_amount'], 0, ',', '.') ?>,-</h3>
                        <!-- <p>Stok: 50</p> -->
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Jumlah:</label>
                            <input type="number" class="form-control" id="quantity" readonly name="quantity" value="<?= $transaction['quantity'] ?>" min="1" required>
                        </div>
                        <a href="<?= base_url('/transaction') ?>" class="btn btn-primary">Back</a>
                        <?php if ($transaction['status'] == 'settlement') : ?>
                            <button type="button" class="btn btn-success">Berhasil di bayar</button>
                            <button type="button" class="btn btn-info"><?= $transaction['payment_type'] ?></button>
                        <?php elseif ($transaction['status'] == 'pending') : ?>
                            <a href="<?= base_url('/pay/' . $transaction['uuid_product'] . '/' . $transaction['id'] . '/' . $transaction['snapToken']) ?>" class="btn btn-primary">Bayar</a>
                        <?php endif; ?>
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