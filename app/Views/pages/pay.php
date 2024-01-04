<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<?php  ?>
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
                        <!-- <p class="text-muted">category</p> -->
                        <!-- <p class="lead">desc</p> -->
                        <h3 class="text-primary">Rp <?= number_format($transaction['price'], 0, ',', '.') ?>,-</h3>
                        <!-- <p>Stok: 50</p> -->
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Jumlah:</label>
                            <input type="number" class="form-control" readonly id="quantity" name="quantity" value="<?= $transaction['quantity'] ?>" min="1" required>
                        </div>
                        <button type="submit" id="pay" class="btn btn-primary">Bayar</button>
                        <?php if ($status == 'pending') : ?>
                            <a href="<?= base_url('/transaction/' . $transaction['uuid_user'] . '/' . $transaction['order_id']) ?>" class="btn btn-outline-primary">Balik</a>
                        <?php else : ?>
                            <a href="<?= base_url('/keranjang') ?>" class="btn btn-outline-primary">Balik</a>
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
<script>
    document.getElementById('pay').addEventListener('click', function() {
        window.snap.pay('<?= $snapToken ?>', {
            onSuccess: function(result) {
                $.post({
                    url: '/payProcess',
                    data: {
                        uuid_product: '<?= $transaction['uuid_product'] ?>',
                        uuid_user: '<?= $_COOKIE['login'] ?>',
                        status: result.transaction_status,
                        order_id: result.order_id,
                        payment_type: result.payment_type,
                        gross_amount: result.gross_amount,
                        img: '<?= $transaction['img'] ?>',
                        name_product: '<?= $transaction['name_product'] ?>',
                        quantity: <?= $transaction['quantity'] ?>,
                        price: <?= $transaction['price'] ?>,
                        snapToken: '<?= $snapToken ?>',
                        id: <?= $transaction['id'] ?>
                    }
                })

                window.location.replace(`<?= base_url('/transaction/' . $_COOKIE['login']) ?>/${result.order_id}`);
            },
            onPending: function(result) {
                console.log(result)

                $.post({
                    url: '/payProcess/pending',
                    data: {
                        uuid_product: '<?= $transaction['uuid_product'] ?>',
                        uuid_user: '<?= $_COOKIE['login'] ?>',
                        status: result.transaction_status,
                        order_id: result.order_id,
                        payment_type: result.payment_type,
                        gross_amount: result.gross_amount,
                        img: '<?= $transaction['img'] ?>',
                        name_product: '<?= $transaction['name_product'] ?>',
                        quantity: <?= $transaction['quantity'] ?>,
                        price: <?= $transaction['price'] ?>,
                        snapToken: '<?= $snapToken ?>',
                        id: <?= $transaction['id'] ?>
                    }
                })
                window.location.replace(`<?= base_url('/pay/' . $transaction['uuid_product'] . '/' . $transaction['id']) . '/' . $snapToken ?>`)
            }
        })
    })
</script>
<?= $this->endSection() ?>