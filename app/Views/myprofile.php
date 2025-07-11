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

  <!-- flash data dengan sweet alert -->
  <div class="flash-data-gagal" data-flashdatagagal="<?= session()->getFlashData('gagal'); ?>"></div>

<div class="container mt-5">
    <div class="row">
        <div class="col">

        <div class="card mx-5" style="max-width: 1000px;">
            <div class="row g-0">
                <div class="col-md-3 my-auto ms-3">
                    <img src="/profile/<?= $user['profil']; ?>" class="card-img" alt="...">
                </div>
                <div class="col-md">
                <div class="card-body">
                    <div class="row">
                      <div class="col-6">
                        <h5 class="card-title"><?= $user['nama']; ?></h5>
                        <p class="card-text"> <b> <?= $user['no_anggota']; ?></b></p>
                        <p class="card-text"><?= ($user['jenis_kelamin'] == "L")? 'Laki-Laki' : 'Perempuan' ; ?></p>
                        <p class="card-text"><?= $user['no_telp']; ?></p>
                        <p class="card-text"><?= $user['ttl']; ?></p>
                        
                        <p class="card-text"><b>
                        <?php if( $user['role'] == 0 ): ?>
                            Admin
                        <?php elseif( $user['role'] == 1 ): ?>
                            Staff
                        <?php else: ?>
                            Anggota
                        <?php endif; ?>
                        </b></p>

                      </div>
                      <div class="col-6">
                        <p class="card-text"><?= $user['email']; ?></p>
                        <form action="/myprofile/edit/<?= $user['id']; ?>" method="POST">
                            <div class="mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Password lama" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password_baru" class="form-control" placeholder="Password baru" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Ubah Password</button>
                        </form>

                      </div>
                    </div>
                   
                    <a class="btn btn-primary mt-3" href="/dashboard" class="btn btn-primary text-center">Kembali</a>
                       
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