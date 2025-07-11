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

<?php if(session()->getFlashdata('success')): ?>
<div class="flash-data-berhasil" data-flashdataberhasil="<?= session()->getFlashdata('success'); ?>"></div>

<?php elseif(session()->getFlashdata('gagal')) : ?>
<div class="flash-data-gagal" data-flashdatagagal="<?= session()->getFlashdata('gagal'); ?>"></div>
<?php endif; ?>

<div class="container mt-2">
    <div class="row">
        <div class="col">

        <div class="card mx-5" style="max-width: px;">
            <div class="row g-0">
                <div class="col-md-3">
                <img src="/covers/<?= $book['cover']; ?>" class="card-img image-detail" alt="...">
                </div>
                <div class="col-md">
                <div class="card-body">

                    <h5 class="card-title"><?= $book['judul']; ?></h5>
                    <p class="card-text"> <b> <?= $book['isbn']; ?></b></p>
                    <p class="card-text"><?= $book['pengarang']; ?></p>
                    <p class="card-text"><?= $book['penerbit']; ?></p>
                   
                    <a href="/books/byIsbn" class="btn btn-primary text-center">Kembali</a>
                       
                </div>
                </div>
            </div>
        </div>

        <table class="table table-hover">
            <thead class="">
                <tr align="center">
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">Section</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php csrf_field(); ?>
                <?php $i = 1  ?>
                <?php foreach($books as $book):  ?>
                    <tr id="dataTabel">
                    <th scope="row"><?= esc($i); ?></th>
                    <!-- esc() = untuk bantu mencegah XSS attack-->
                    <td class="id"><?= esc($book['id']); ?></td>
                    <td class="section"><?= esc($book['section']); ?></td>
                    <td class="status"><?= esc($book['status']); ?></td>
                            
                    <td id="button">
                    <a href="/books/edit/<?= $book['id']; ?>" class="btn btn-warning rounded-circle d-flex justify-content-center align-items-center p-0" style="width:32px;height:32px;"><i class="fas fa-edit"></i></a>
                    <a href="/books/delete/<?= $book['id']; ?>" class="btn btn-danger rounded-circle d-flex justify-content-center align-items-center p-0 tombol-hapus" style="width:32px;height:32px;"><i class="fas fa-trash"></i></a>
                    </td>
                    </tr>
                <?php $i ++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>

        </div>
    </div>
</div>


</div>
<?= $pager->links('buku', 'custom_pagination') ?>
<!-- End of Main Content -->
<?= $this->endSection('content'); ?>