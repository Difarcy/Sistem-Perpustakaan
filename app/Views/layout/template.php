<?= $this->include('layout/header'); ?>
<div class="d-flex" style="min-height:100vh;">
  <aside>
    <?= $this->renderSection('sidebar'); ?>
  </aside>
  <div class="flex-grow-1 d-flex flex-column" style="overflow:hidden;">
    <header style="width:100%;overflow-x:hidden;">
      <?= $this->renderSection('topbar'); ?>
    </header>
    <main style="flex:1 1 0;overflow-x:auto;">
      <?= $this->renderSection('content'); ?>
    </main>
  </div>
</div>
<?= $this->include('layout/footer'); ?>

