<?= $this->extend('layout/template'); ?>

<?= $this->section('sidebar'); ?>
  <?= $this->include('layout/sidebar'); ?>
<?= $this->endSection(); ?>

<?= $this->section('topbar'); ?>
  <?= $this->include('layout/topbar'); ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<!-- Main Content -->
<div id="content">

<div class="container mt-5">
    <div class="row">
        <div class="col">

        <div class="card mx-5" style="max-width: 1000px;">
            <div class="row g-0">
                <div class="col-md-3">
                <img src="/covers/<?= $book['cover']; ?>" class="card-img" alt="...">
                </div>
                <div class="col-md">
                <div class="card-body">

                    <h5 class="card-title"><?= $book['judul']; ?></h5>
                    <p class="card-text"> <b> <?= $book['isbn']; ?></b></p>
                    <p class="card-text"><?= $book['pengarang']; ?></p>
                    <p class="card-text"><?= $book['penerbit']; ?></p>
                    <p class="card-text"><?= $book['section']; ?></p>
                   
                    <a href="/books" class="btn btn-primary text-center">Kembali</a>
                       
                </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

</div>
<!-- End of Main Content -->
<?= $this->endSection(); ?>