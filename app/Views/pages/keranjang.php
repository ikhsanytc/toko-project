<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="p-5"></div>
<div class="container mt-4">
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan') ?>
        </div>
    <?php endif; ?>
    <?php if (empty($items)) : ?>
        <div class="alert alert-info">
            <p class="text-center">tidak ada barang di keranjang mu... ayo belanja sekarang!</p>
        </div>
    <?php endif; ?>
    <div class="row">
        <!-- Loop untuk setiap item dalam keranjang -->
        <?php foreach ($items as $item) :  ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?= base_url('img/' . $item['img']) ?>" class="card-img-top" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title"><?= $item['name_product'] ?></h5>
                        <p class="card-text">Rp <?= number_format($item['price'], 0, ',', '.') ?>,-</p>
                        <p class="card-text">Jumlah: <?= $item['quantity'] ?></p>
                        <p class="card-text">Subtotal: Rp <?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?>,-</p>
                        <a href="<?= base_url('/pay/' . $item['uuid_product'] . '/' . $item['id']) ?>" class="btn btn-primary" style="width: 100%;">Bayar</a>
                        <div class="p-1"></div>
                        <form action="<?= base_url('/cancelPay') ?>" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                            <button type="submit" class="btn btn-outline-danger" style="width: 100%;">Hapus produk</button>
                        </form>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->endSection() ?>