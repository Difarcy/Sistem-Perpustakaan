<?= $this->extend('layout/template'); ?>
<?= $this->section('template'); ?>
<!-- Main Content -->

<div id="content">
<div class="container mt-3">

    <div class="row">

        <!-- tabel Buku -->
        <div class="col-6">
        <table class="table table-hover">

            <thead class="">    
                <tr align="center">
                <div class="col-md-3 mb-4 mx-auto">
                    <img src="/covers/<?= $denda['cover']; ?>" class="image-detail" alt="...">
                </div>
            </thead>

            <tbody>
                    <tr>
                        <td><?= esc($denda['id_buku']); ?></td>
                    </tr>
                    <tr>
                        <td><?= esc($denda['judul']); ?></td>
                    </tr>
                    <tr>
                        <td><?= esc($denda['isbn']); ?></td>
                    </tr>
                    <tr>
                        <td><?= esc($denda['pengarang']); ?></td>
                    </tr>
                    <tr>
                        <td><?= esc($denda['penerbit']); ?></td>
                    </tr>
            </tbody>

        </table>
        </div>

        <!-- Tabel User -->
        <div class="col-6">
        <table class="table table-hover">

        <thead class="">
                <tr align="center">
                <div class="col-md-3 mb-4 mx-auto">
                    <img src="/profile/<?= $denda['profil']; ?>" class="image-detail" alt="...">
                </div>
            </thead>

            <tbody>
                    <tr>
                        <td><?= esc($denda['no_anggota']); ?></td>
                    </tr>
                    <tr>
                        <td><?= esc($denda['nama']); ?></td>
                    </tr>
                    <tr>
                        <td><?= (esc($denda['jenis_kelamin']) == 'L' ? 'Laki-Laki' : 'Perempuan' ); ?></td>
                    </tr>
                    <tr>
                        <td><?= esc($denda['no_telp']); ?></td>
                    </tr>
                    <tr>
                        <td><?= esc($denda['email']); ?></td>
                    </tr>

            </tbody>

        </table>
        </div>
        <a class="mx-auto btn btn-primary" href="/denda" class="btn btn-primary text-center">Kembali</a>
        
    </div>
</div>
</div>

<!-- End of Main Content -->
<?= $this->endSection('template'); ?>