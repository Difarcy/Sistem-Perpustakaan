<?= $this->extend('layout/template'); ?>

<?= $this->section('sidebar'); ?>
  <?= $this->include('layout/sidebar'); ?>
<?= $this->endSection(); ?>

<?= $this->section('topbar'); ?>
  <?= $this->include('layout/topbar'); ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<!-- Main Content -->

<nav class="navbar navbar-dark bg-light">

    <form action="" method="GET" class="form-inline">
        <input class="form-control mr-2 " name="keyword" type="text" placeholder="cari...">
        <button class="btn btn-outline-success" type="submit">Cari</button>
    </form>
  
</nav>

<div id="content">

<?php if(session()->getFlashdata('success')): ?>
<div class="flash-data-berhasil" data-flashdataberhasil="<?= session()->getFlashdata('success'); ?>"></div>

<?php elseif(session()->getFlashdata('gagal')) : ?>
<div class="flash-data-gagal" data-flashdatagagal="<?= session()->getFlashdata('gagal'); ?>"></div>
<?php endif; ?>

<div class="container mt-1">
    <div class="row">
        <div class="col">
            <?php if( !$denda ){ ?>

                <div class="row mt-4 text-center">
                    <div class="col">
                        <div class="alert alert-danger" role="alert">
                            Tidak ada data Denda!
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col">
                        <a class="btn btn-primary" href="/denda" class="btn btn-primary text-center">Kembali</a>
                    </div>
                </div>

            <?php }else{ ?>    

        <table class="table table-hover">
            <thead class="">
                <tr align="center">
                <th scope="col">#</th>
                <th class="judul_peminjaman" scope="col">Judul Buku</th>
                <th class="peminjaman_nama" scope="col">Nama</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="">
                <?php csrf_field(); ?>
                <?php $i = 1 + ($DataPerPage * ($currentPage -1)); ?>
                
                <?php foreach($denda as $d):  ?>
                    <tr id="dataTabel">
                    <th scope="row"><?= esc($i); ?></th>
                    <!-- esc() = untuk bantu mencegah XSS attack-->
                    <td class=""><?= esc($d['judul']); ?></td>
                    <td align="center" class="nama"><?= esc($d['nama']); ?></td>
                    <td align="center">
                        <?php if(esc($d['denda']) == 50000): ?>
                            Rusak
                        <?php elseif(esc($d['denda']) == 75000): ?>
                            Hilang
                        <?php else: ?>
                            Melebihi Deadline
                        <?php endif; ?>
                    </td>
                            
                    <td align="center"  id="button">
                    <a href="/denda/detail/<?= $d['id_denda']; ?>" class="btn btn-primary rounded-circle d-flex justify-content-center align-items-center p-0" style="width:32px;height:32px;"><i class="fas fa-info"></i></a>
                    <a href="/denda/bayar/<?= $d['id_denda']; ?>" class="btn btn-success rounded-circle d-flex justify-content-center align-items-center p-0" style="width:32px;height:32px;"><i class="fas fa-check"></i></a>
                     </td>
                    </tr>
                <?php $i ++; ?>
                <?php endforeach; ?>
                <?php }; ?>

            </tbody>
        </table>
        
    </div>
</div>
</div>
</div>

<!-- End of Main Content -->
<?= $this->endSection('content'); ?>