
<div class="container-fluid px-0">
  <div class="row justify-content-center align-items-center" style="min-height:100vh; margin:0;">
    <div class="col-12 d-flex justify-content-center" style="margin:0;">
      <div class="card border-0 shadow-lg rounded-4 overflow-hidden w-100" style="max-width:900px; height:88vh; min-height:400px; margin:0;">
        <div class="row g-0 align-items-center h-100">
          <!-- Kolom Gambar -->
          <div class="col-md-6 d-none d-md-block bg-light text-center p-4 h-100">
            <img src="/assets/img/book.png" alt="Login Illustration" class="img-fluid rounded-4 h-100" style="object-fit:contain; max-height:100%;">
          </div>
          <!-- Kolom Form Login -->
          <div class="col-md-6 col-12 d-flex align-items-center justify-content-center h-100">
            <div class="w-100 px-4">
              <div class="text-center mb-3">
                <h2 class="fw-bold text-primary mb-2 login-page-title">LibraByte</h2>
                <div class="text-muted login-page-subtitle" style="margin-bottom: 3.5rem;">Kelola LibraByte Anda dengan Mudah dan Efisien</div>
              </div>
              <!-- Flash Data -->
              <div class="flash-data-berhasil" data-flashdataberhasil="<?= session()->getFlashData('success'); ?>"></div>
              <div class="flash-data-gagal" data-flashdatagagal="<?= session()->getFlashData('gagal'); ?>"></div>
              <form action="<?= base_url('login/auth'); ?>" method="post" class="d-flex flex-column align-items-center">
                <div class="mb-2 w-100 d-flex justify-content-center">
                  <input type="text" value="<?= old('username'); ?>" name="username" class="form-control form-control-sm" placeholder="Username" id="username" required autofocus style="font-size:0.85rem; max-width:300px; text-align:left;">
                </div>
                <div class="mb-2 w-100 d-flex justify-content-center">
                  <input type="password" name="password" class="form-control form-control-sm" placeholder="Password" id="password" required style="font-size:0.85rem; max-width:300px; text-align:left;">
                </div>
                <div class="w-100 d-flex justify-content-center">
                  <button type="submit" class="btn btn-primary btn-sm mt-2" style="font-size:0.8rem; max-width:300px; width:100%; height:30px; line-height:1.3; padding:0 0.75rem;">LOG IN</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  .login-page-title { font-size: 1rem !important; }
  .login-page-subtitle { font-size: 0.85rem !important; }
</style>