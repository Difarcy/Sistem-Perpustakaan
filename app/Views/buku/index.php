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
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Tambah Data
    </button>
  
  <form action="" method="GET" class="row g-2 align-items-center w-100">
    <div class="col-auto flex-grow-1">
      <input class="form-control me-2" name="keyword" type="text" placeholder="cari...">
    </div>
    <div class="col-auto">
      <button class="btn btn-outline-success" type="submit">Cari</button>
    </div>
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
            <?php if( !$books ){ ?>

                <div class="row mt-4 text-center">
                    <div class="col">
                        <div class="alert alert-danger" role="alert">
                            Buku Tidak ditemukan!
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col">
                        <a class="btn btn-primary" href="/books" class="btn btn-primary text-center">Kembali</a>
                    </div>
                </div>

                <?php }else{ ?>    

        <table class="table table-hover">
            <thead class="">
                <tr align="center">
                <th scope="col">#</th>
                <th scope="col">Cover</th>
                <th scope="col">ID</th>
                <th scope="col">ISBN</th>
                <th scope="col">Judul</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="">
                <?php csrf_field(); ?>
                <?php $i = 1 + ($pagePerView * ($currentPage -1)) ?>
                <?php foreach($books as $book):  ?>
                    <tr id="dataTabel">
                    <th scope="row"><?= esc($i); ?></th>
                    <!-- esc() = untuk bantu mencegah XSS attack-->
                    <td><img src="/covers/<?= esc($book['cover']); ?>" class="image" alt="Cover"></td>
                    <td class="id"><?= esc($book['id']); ?></td>
                    <td class="isbn"><?= esc($book['isbn']); ?></td>
                    <td class="judul"><?= esc($book['judul']); ?></td>
                    <td class="status"><?= esc($book['status']); ?></td>
                            
                    <td id="button">
                    <a href="/books/detail/<?= $book['id']; ?>" class="btn btn-primary rounded-circle d-flex justify-content-center align-items-center p-0" style="width:32px;height:32px;"><i class="fas fa-info"></i></a>
                    <a href="/books/edit/<?= $book['id']; ?>" class="btn btn-warning rounded-circle d-flex justify-content-center align-items-center p-0" style="width:32px;height:32px;"><i class="fas fa-edit"></i></a>
                    <a href="/books/delete/<?= $book['id']; ?>" class="btn btn-danger rounded-circle d-flex justify-content-center align-items-center p-0 tombol-hapus" style="width:32px;height:32px;"><i class="fas fa-trash"></i></a>
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

<?= $pager->links('buku', 'custom_pagination') ?>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Buku</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
        <form action="/books/add" method="POST" enctype="multipart/form-data">
          <?= csrf_field(); ?>
            <div class="row">
                <div class="col-md-5 justify-content-center">
                    <label for="cover">Cover (Max 3MB)</label>
                    <input type="file" name="cover" class="form-control <?= ($validation->hasError('cover')) ? 'is-invalid' : '' ; ?>" id="cover"  onchange="previewImage()">
                    <div class="invalid-feedback">
                            <?= $validation->showError('cover'); ?>
                    </div>
                    <img src="" class="img-fluid mt-3 img-preview mx-auto d-block rounded" id="img-preview" width="220px" alt="">
                </div>
                <div class="col-md-7">
                    <div class="mb-3">
                        <label for="isbn">Isbn</label>
                        <input type="text" class="form-control <?= ($validation->showError('isbn')) ? 'is-invalid' : '' ; ?>" name="isbn" id="isbn" value="<?= old('isbn'); ?>" >
                        <div class="invalid-feedback">
                                <?= $validation->showError('isbn'); ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control <?= ($validation->showError('judul')) ? 'is-invalid' : '' ; ?>" name="judul" id="judul" value="<?= old('judul'); ?>">
                        <div class="invalid-feedback">
                                <?= $validation->showError('judul'); ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="pengarang">Pengarang</label>
                        <input type="text" class="form-control <?= ($validation->showError('pengarang')) ? 'is-invalid' : '' ; ?>" name="pengarang" id="pengarang" value="<?= old('pengarang'); ?>">
                        <div class="invalid-feedback">
                                <?= $validation->showError('pengarang'); ?>
                        </div>
                    </div>
                    <!-- Lanjutkan migrasi field lain jika ada -->
                    <button type="submit" class="btn btn-primary w-100" name="submit">Tambah Buku</button>
                </div>
            </div>
        </form>
        </div>
    </div>
  </div>
</div>
  

<!-- End of Main Content -->
<?= $this->endSection('content'); ?>