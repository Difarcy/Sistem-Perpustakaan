<?= $this->extend('layout/template'); ?>

<?= $this->section('sidebar'); ?>
  <?= $this->include('layout/sidebar'); ?>
<?= $this->endSection(); ?>

<?= $this->section('topbar'); ?>
  <?= $this->include('layout/topbar'); ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col mt-4">
            <form action="/users/add" method="POST" enctype="multipart/form-data">
                      <?= csrf_field(); ?>
                        <div class="row g-3">
                            <div class="col-md-5 justify-content-center">
                                <label for="profil">Profil (Max 3MB)</label>
                                <input type="file" id="cover" name="profil" class="form-control <?= ($validation->showError('profil')) ? 'is-invalid' : '' ; ?>" onchange="previewImage()">
                                <div class="invalid-feedback">
                                        <!-- ambil error dari $validation -->
                                        <?= $validation->showError('profil'); ?>
                                </div>
                                <img src="" class="img-fluid mt-3 img-preview mx-auto d-block rounded" id="img-preview" width="220px" alt="">
                            </div>
                            <div class="col-md-7">
                                <div class="mb-3">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : '' ; ?>" name="nama" id="nama" value="<?= old('nama'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->showError('nama'); ?>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="noTelp">Nomor Telepon</label>
                                            <input type="text" class="form-control <?= ($validation->showError('noTelp')) ? 'is-invalid' : '' ; ?>" name="noTelp" id="noTelp" value="<?= old('noTelp'); ?>">
                                            <div class="invalid-feedback">
                                                    <?= $validation->showError('noTelp'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="jenisKelamin">Jenis Kelamin</label>
                                            <select class="form-control" name="status" id="jenisKelamin">
                                                <option value="L">Laki-Laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="tempat">Tempat lahir</label>
                                            <input type="text" class="form-control <?= ($validation->showError('tempat')) ? 'is-invalid' : '' ; ?>" name="tempat" id="tempat" value="<?= old('tempat'); ?>">
                                            <div class="invalid-feedback">
                                                    <?= $validation->showError('tempat'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="tanggal">Tanggal lahir</label>
                                            <input type="date" class="form-control <?= ($validation->showError('tanggal')) ? 'is-invalid' : '' ; ?>" name="tanggal" id="tanggal" value="<?= old('tanggal'); ?>">
                                            <div class="invalid-feedback">
                                                    <?= $validation->showError('tanggal'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control <?= ($validation->showError('email')) ? 'is-invalid' : '' ; ?>" name="email" id="email" value="<?= old('email'); ?>">
                                    <div class="invalid-feedback">
                                            <?= $validation->showError('email'); ?>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary w-100" name="submit">Submit</button>
                            </div>
                        </div>
                    </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>