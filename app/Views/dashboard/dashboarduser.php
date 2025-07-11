
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

<!-- Alert Sukses login -->
<div class="flash-data-berhasil" data-flashdataberhasil="<?= session()->getFlashData('success'); ?>"></div>

<div class="container-fluid">

  <div class="row">
    
    <?php if($user): ?>
        <div class="col-8">
        <div class="card border-primary mx-5 mt-3 pb-3">
                <h5 class="text-center mt-3 text-primary fw-bold">Buku Yang Dipinjam</h5>
            <div class="row align-items-center">
                <div class="col-md-3 my-auto ms-3">
                <img src="/covers/<?= $user['cover']; ?>" class="card-img" alt="Cover">
                </div>
                <div class="col-md">
                <div class="card-body">

                    <h5 class="card-title"><?= $user['judul']; ?></h5>
                    <p class="card-text"> <b> <?= $user['isbn']; ?></b></p>
                    <p class="card-text"><?= $user['pengarang']; ?></p>
                    <p class="card-text"><?= $user['penerbit']; ?></p>
                    <div class="alert alert-danger">
                    <p class="card-text">Jatuh tempo pada <?= $deadline; ?></p>
                    </div>

                </div>
                </div>
            </div>
        </div>
        </div>
    <?php else: ?>
        <div class="col-8">
        <div class="card border-primary mx-5 mt-3 pb-3">
                <h5 class="text-center mt-3 text-primary fw-bold">Buku Yang Dipinjam</h5>
            <div class="row align-items-center">
            </div>  
        </div>
        </div>
    <?php endif; ?>

    

    <div class="col-4 my-auto">

        <div class="row my-3">
            <div class="card mt-3 border-left-danger shadow h-100 py-2 px-3">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-5 text-center">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Denda yang belum dibayar</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalDenda; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
            </div>
        </div>

        <div class="row my-3">
            <div class="card mt-3 border-left-info shadow h-100 py-2 px-3">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-5 text-center">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Buku yang telah dipinjam</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $getPeminjaman; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-book-reader fa-2x text-gray-300"></i>
                    </div>
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