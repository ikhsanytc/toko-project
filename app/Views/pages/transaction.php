<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="container">
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('pesan') ?>
        </div>
    <?php endif; ?>
    <div class="row">
        <?php foreach ($transactions as $transaction) : ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?= base_url('img/' . $transaction['img']) ?>" class="card-img-top" alt="Product 1">
                    <div class="card-body">
                        <h5 class="card-title"><?= $transaction['name_product'] ?></h5>
                        <p class="card-text">Rp <?= number_format($transaction['gross_amount'], 0, ',', '.') ?></p>
                        <?php if ($transaction['status'] == 'settlement') : ?>
                            <button type="button" class="btn btn-success">Telah di bayar</button>
                        <?php elseif ($transaction['status'] == 'pending') : ?>
                            <button type="button" class="btn btn-warning">Pending/belum di bayar</button>
                        <?php endif; ?>
                        <a href="<?= base_url('/transaction/' . $transaction['uuid_user'] . '/' . $transaction['order_id']) ?>" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection() ?>