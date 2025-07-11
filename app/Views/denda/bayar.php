<?= $this->extend('layout/template'); ?>
<?= $this->section('template'); ?>
<!-- Main Content -->

<div id="content">
<div class="container mt-3">

<form id="form-pengambalian" class="form-pengambalian" action="/denda/savebayar/<?= $denda['id_denda']; ?>" method="POST">
    <?= csrf_field() ; ?>
    <div class="row">

        <!-- tabel Buku -->
        <div class="col-6">
            <h5 class="text-center mb-3">Tanggal Peminjaman <br><?= $tanggal; ?></h5>

        <table class="table table-hover">

            <thead class="">
            </thead>

            <tbody>
                    <tr>
                        <h4>Data Buku</h4>
                    </tr>
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
                    <tr>
                        <td>
                            <div class="alert alert-danger">
                                <?= $statusDenda; ?>
                            </div> 
                        </td>
                    </tr>

            </tbody>

        </table>
        </div>

        <!-- Tabel User -->
        <div class="col-6">
            <h5 class="text-center mb-3">Tanggal Deadline <br><?= $deadline; ?></h5>
        <table class="table table-hover">

        <thead class="">
            </thead>

            <tbody>
                    <tr>
                        <h4>Data User</h4>
                    </tr>
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
                    <tr>
                        <td>
                            <div class="alert alert-danger"><?= $currency; ?></div>
                        </td>
                    </tr>

            </tbody>

        </table>
        </div>
        <a class="mx-auto btn btn-primary" href="/denda" class="btn btn-primary text-center">Kembali</a>
        <!-- <a href="/peminjaman/savepengembalian/<?= $denda['id_peminjaman']; ?>" class="btn btn-success mx-auto">Selesai Peminjaman</a> -->
        <button type="submit" class="btn btn-success tombol-bayar mx-auto">Bayar Denda</button>
</form>
</div>
</div>
</div>

<!-- End of Main Content -->
<?= $this->endSection('template'); ?>