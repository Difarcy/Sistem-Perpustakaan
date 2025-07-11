<?= $this->extend('layout/template'); ?>
<?= $this->section('template'); ?>

<!-- Main Content -->
<div id="content">

<div class="container mt-5">
    <div class="row">
        <div class="col">

        <div class="card mx-5" style="max-width: 1000px;">
            <div class="row g-0">
                <div class="col-md-3">
                <img src="/profile/<?= $user['profil']; ?>" class="card-img" alt="...">
                </div>
                <div class="col-md">
                <div class="card-body">

                    <h5 class="card-title"><?= $user['nama']; ?></h5>
                    <p class="card-text"> <b> <?= $user['no_anggota']; ?></b></p>
                    <td class="jenis_kelamin"><?= esc( (($user['jenis_kelamin'] == 'L') ? 'Laki-Laki' : 'Perempuan') ); ?></td>
                    <p class="card-text"><?= $user['no_telp']; ?></p>
                    <p class="card-text"><?= $user['ttl']; ?></p>
                    <p class="card-text"><?= $user['email']; ?></p>
                   
                    <a href="/staff" class="btn btn-primary text-center">Kembali</a>
                       
                </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

</div>
<!-- End of Main Content -->

<?= $this->endSection('template'); ?>