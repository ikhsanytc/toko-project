<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="p-3"></div>
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Produk</h2>
        <div class="row">
            <!-- Product 1 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?= base_url('img/shirt.jpg') ?>" class="card-img-top" alt="Product 1">
                    <div class="card-body">
                        <h5 class="card-title">Produk Name</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique illo pariatur rerum, optio quae provident praesentium ipsum saepe beatae quidem.</p>
                        <a href="<?= base_url('/detail') ?>" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <!-- Product 2 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?= base_url('img/shirt.jpg') ?>" class="card-img-top" alt="Product 2">
                    <div class="card-body">
                        <h5 class="card-title">Produk Name</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam illo repellat adipisci amet! Laudantium sunt modi nam quidem expedita iste!</p>
                        <a href="<?= base_url('/detail') ?>" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <!-- Product 3 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?= base_url('img/shirt.jpg') ?>" class="card-img-top" alt="Product 3">
                    <div class="card-body">
                        <h5 class="card-title">Produk Name</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut earum animi soluta delectus? Facere quo vitae, repudiandae dolore repellat error?</p>
                        <a href="<?= base_url('/detail') ?>" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?= base_url('img/shirt.jpg') ?>" class="card-img-top" alt="Product 3">
                    <div class="card-body">
                        <h5 class="card-title">Produk Name</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut earum animi soluta delectus? Facere quo vitae, repudiandae dolore repellat error?</p>
                        <a href="<?= base_url('/detail') ?>" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?= base_url('img/shirt.jpg') ?>" class="card-img-top" alt="Product 3">
                    <div class="card-body">
                        <h5 class="card-title">Produk Name</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut earum animi soluta delectus? Facere quo vitae, repudiandae dolore repellat error?</p>
                        <a href="<?= base_url('/detail') ?>" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?= base_url('img/shirt.jpg') ?>" class="card-img-top" alt="Product 3">
                    <div class="card-body">
                        <h5 class="card-title">Produk Name</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut earum animi soluta delectus? Facere quo vitae, repudiandae dolore repellat error?</p>
                        <a href="<?= base_url('/detail') ?>" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <!-- Add more products as needed -->
        </div>
    </div>
</section>
<footer class="bg-dark text-white text-center py-3">
    <div class="container">
        <p>&copy; 2024 Toko Baju Online</p>
    </div>
</footer>
<?= $this->endSection() ?>