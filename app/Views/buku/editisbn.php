<?= $this->extend('layout/template'); ?>
<?= $this->section('template'); ?>
<!-- Main Content -->
<div id="content">

<div class="container mt-3">
    <div class="row">
        <div class="col">

        <form action="/books/updateisbn" method="POST" enctype="multipart/form-data">
          <?= csrf_field(); ?>
          <input type="hidden" name="oldCover" value="<?= $book['cover']; ?>">
            <div class="row">
                <div class="col-md-5 justify-content-center">
                    <label for="cover">Cover (Max 3MB)</label>
                    <input type="file" name="cover" class="form-control <?= ($validation->showError('cover')) ? 'is-invalid' : '' ; ?>" id="cover" value="<?= (old('cover')? old('cover') : $book['cover']); ?>" onchange="previewImage()">
                    <div class="invalid-feedback">
                        <?= $validation->showError('cover'); ?>
                    </div>
                    <img src="/covers/<?= (old('cover')? old('cover') : $book['cover']); ?>" class="img-fluid mt-3 img-preview mx-auto d-block rounded" id="img-preview" width="220px" alt="">
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <label for="isbn">Isbn</label>
                        <input type="text" class="form-control <?= ($validation->showError('isbn')) ? 'is-invalid' : '' ; ?>" name="isbn" id="isbn" value="<?= (old('isbn')? old('isbn') : $book['isbn']); ?>" readonly >
                        <div class="invalid-feedback">
                                <!-- ambil error dari $validation -->
                                <?= $validation->showError('isbn'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control <?= ($validation->showError('judul')) ? 'is-invalid' : '' ; ?>" name="judul" id="judul" value="<?= (old('judul')? old('judul') : $book['judul']); ?>">
                        <div class="invalid-feedback">
                                <!-- ambil error dari $validation -->
                                <?= $validation->showError('judul'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pengarang">Pengarang</label>
                        <input type="text" class="form-control <?= ($validation->showError('pengarang')) ? 'is-invalid' : '' ; ?>" name="pengarang" id="pengarang" value="<?= (old('pengarang')? old('pengarang') : $book['pengarang']); ?>">
                        <div class="invalid-feedback">
                                <!-- ambil error dari $validation -->
                                <?= $validation->showError('pengarang'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="penerbit">Penerbit</label>
                        <input type="text" class="form-control <?= ($validation->showError('penerbit')) ? 'is-invalid' : '' ; ?>" name="penerbit" id="penerbit" value="<?= (old('penerbit')? old('penerbit') : $book['penerbit']); ?>">
                        <div class="invalid-feedback">
                                <!-- ambil error dari $validation -->
                                <?= $validation->showError('penerbit'); ?>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
        <div class="float-right mt-4">
        <button type="submit" class="btn btn-primary " name="submit">Update</button>
        </div>
        </form>

        </div>
    </div>
</div>

</div>
<!-- End of Main Content -->
<?= $this->endSection('template'); ?>