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

    <!-- Button trigger modal -->
    <a href="/staff/addstaff" class="btn btn-primary">Tambah Staff</a>
  
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
            <?php if( !$users ){ ?>

                <div class="row mt-4 text-center">
                    <div class="col">
                        <div class="alert alert-danger" role="alert">
                            Tidak ada data Staff! 
                        </div>
                    </div>
                </div>

                <?php }else{ ?>    

        <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="">
                <tr align="center">
                <th scope="col">#</th>
                <th scope="col">Profil</th>
                <th scope="col">ID Staff</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="">
                <?php csrf_field(); ?>
                <?php $i = 1; ?>
                <?php foreach($users as $user):  ?>
                    <tr id="dataTabel">
                    <th scope="row"><?= esc($i); ?></th>
                    <!-- esc() = untuk bantu mencegah XSS attack-->
                    <td><img src="/profile/<?= esc($user['profil']); ?>" class="image" alt="profil"></td>
                    <td class="no_anggota"><?= esc($user['no_anggota']); ?></td>
                    <td class="nama"><?= esc($user['nama']); ?></td>
                    <td class="jenis_kelamin"><?= esc( (($user['jenis_kelamin'] == 'L') ? 'Laki-Laki' : 'Perempuan') ); ?></td>
                    <td class="email"><?= esc($user['email']); ?></td>
                            
                    <td id="button">
                    <a href="/staff/detail/<?= $user['id']; ?>" class="btn btn-primary rounded-circle d-flex justify-content-center align-items-center p-0" style="width:32px;height:32px;"><i class="fas fa-info"></i></a>
                    <a href="/staff/edit/<?= $user['id']; ?>" class="btn btn-warning rounded-circle d-flex justify-content-center align-items-center p-0" style="width:32px;height:32px;"><i class="fas fa-edit"></i></a>
                    <a href="/staff/delete/<?= $user['id']; ?>" class="btn btn-danger rounded-circle d-flex justify-content-center align-items-center p-0 tombol-hapus" style="width:32px;height:32px;"><i class="fas fa-trash"></i></a>
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