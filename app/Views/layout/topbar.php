<nav class="navbar navbar-expand navbar-light px-4 py-2" style="min-height:56px; border-bottom:1px solid #eee; background-color:#fff; width:100%; position:relative; left:0; margin:0; padding:0;">
  <div class="container-fluid p-0" style="justify-content: flex-end;">
    <div class="d-flex align-items-center" style="gap: 0.75rem; padding-right: 1.5rem;">
      <span class="fw-semibold text-dark"><?= session()->get('nama'); ?></span>
      <img src="/profile/<?= session()->get('profil') ?? 'no-profil.png'; ?>" alt="Profile" class="rounded-circle" width="36" height="36">
    </div>
  </div>
</nav> 