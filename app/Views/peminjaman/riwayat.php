<?= $this->extend('layout/template'); ?>

<?= $this->section('sidebar'); ?>
  <?= $this->include('layout/sidebar'); ?>
<?= $this->endSection(); ?>

<?= $this->section('topbar'); ?>
  <?= $this->include('layout/topbar'); ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="container mt-4">
    <h3>Riwayat Peminjaman</h3>
    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Deadline</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($riwayat)): ?>
                <?php $i = 1; foreach ($riwayat as $row): ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= esc($row['id_buku']); ?></td>
                        <td><?= esc($row['tanggal_peminjaman']); ?></td>
                        <td><?= esc($row['deadline']); ?></td>
                        <td><?= esc($row['status']); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="5" class="text-center">Belum ada riwayat peminjaman.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?> 