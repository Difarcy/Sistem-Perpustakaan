<?= $this->extend('layout/template'); ?>
<?= $this->section('template'); ?>
<!-- Main Content -->

<div id="content">
<div class="container mt-3">

    <div class="row">

        <!-- tabel Buku -->
        <div class="col-6">
            <h5 class="text-center">Tanggal Peminjaman <br><?= $tanggal; ?></h5>
        <table class="table table-hover">

            <thead class="">    
                <tr align="center">
                <div class="col-md-3 mb-4 mx-auto">
                    <img src="/covers/<?= $pinjam['cover']; ?>" class="image-detail" alt="...">
                </div>
            </thead>

            <tbody>
                    <tr>
                        <td><?= esc($pinjam['id_buku']); ?></td>
                    </tr>
                    <tr>
                        <td><?= esc($pinjam['judul']); ?></td>
                    </tr>
                    <tr>
                        <td><?= esc($pinjam['isbn']); ?></td>
                    </tr>
                    <tr>
                        <td><?= esc($pinjam['pengarang']); ?></td>
                    </tr>
                    <tr>
                        <td><?= esc($pinjam['penerbit']); ?></td>
                    </tr>
            </tbody>

        </table>
        </div>

        <!-- Tabel User -->
        <div class="col-6">
            <h5 class="text-center">Tanggal Pengembalian <br><?= $datePengembalian; ?></h5>
        <table class="table table-hover">

        <thead class="">
                <tr align="center">
                <div class="col-md-3 mb-4 mx-auto">
                    <img src="/profile/<?= $pinjam['profil']; ?>" class="image-detail" alt="...">
                </div>
            </thead>

            <tbody>
                    <tr>
                        <td><?= esc($pinjam['no_anggota']); ?></td>
                    </tr>
                    <tr>
                        <td><?= esc($pinjam['nama']); ?></td>
                    </tr>
                    <tr>
                        <td><?= (esc($pinjam['jenis_kelamin']) == 'L' ? 'Laki-Laki' : 'Perempuan' ); ?></td>
                    </tr>
                    <tr>
                        <td><?= esc($pinjam['no_telp']); ?></td>
                    </tr>
                    <tr>
                        <td><?= esc($pinjam['email']); ?></td>
                    </tr>

            </tbody>

        </table>
        </div>

        <a class="mx-auto btn btn-primary" href="/pengembalian" class="btn btn-primary text-center">Kembali</a>

</div>
</div>
</div>

<!-- End of Main Content -->
<?= $this->endSection('template'); ?>