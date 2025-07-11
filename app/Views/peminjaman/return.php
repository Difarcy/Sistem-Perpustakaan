<?= $this->extend('layout/template'); ?>
<?= $this->section('template'); ?>
<!-- Main Content -->

<div id="content">
<div class="container mt-3">

<form id="form-pengambalian" class="form-pengambalian" action="/peminjaman/savepengembalian/<?= $pinjam['id_peminjaman']; ?>" method="POST">
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
                    <tr>
                        <td>
                        <select class="form-control status" name="status" id="statusBuku">
                                    <option selected value="Tersedia">Tersedia</option>
                                    <option value="Rusak">Rusak</option>
                                    <option value="Hilang">Hilang</option>
                        </select>
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
                    <tr>
                        <td>
                            <?php if( $denda == 0 ): ?>
                                <div class="alert alert-success">Belum melebihi Deadline</div>
                            <?php else: ?>
                                <div class="alert alert-danger">Melebihi Deadline!</div> 
                                <input type="hidden" name="deadline" value="<?= $denda; ?>"> 
                            <?php endif; ?>
                        </td>
                    </tr>

            </tbody>

        </table>
        </div>
        <a class="mx-auto btn btn-primary" href="/peminjaman" class="btn btn-primary text-center">Kembali</a>
        <!-- <a href="/peminjaman/savepengembalian/<?= $pinjam['id_peminjaman']; ?>" class="btn btn-success mx-auto">Selesai Peminjaman</a> -->
        <button type="submit" class="btn btn-success tombol-pengembalian mx-auto">Selesai Peminjaman</button>
</form>
</div>
</div>
</div>

<!-- End of Main Content -->
<?= $this->endSection('template'); ?>