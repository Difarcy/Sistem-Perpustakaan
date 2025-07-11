<div class="row mt-4 justify-content-center">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-primary shadow-sm h-100 py-2">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="text-uppercase text-primary small fw-bold mb-1">Jumlah Anggota</div>
                        <div class="h5 mb-0 fw-bold text-dark"><?= $jumlahUser; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-secondary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-success shadow-sm h-100 py-2">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="text-uppercase text-success small fw-bold mb-1">Jumlah Buku</div>
                        <div class="h5 mb-0 fw-bold text-dark"><?= $jumlahBuku; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-book-reader fa-2x text-secondary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-info shadow-sm h-100 py-2">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="text-uppercase text-info small fw-bold mb-1">Jumlah Judul Buku</div>
                        <div class="h5 mb-0 fw-bold text-dark"><?= $jumlahJudulBuku; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-book fa-2x text-secondary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-danger shadow-sm h-100 py-2">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="text-uppercase text-danger small fw-bold mb-1">Total Denda</div>
                        <div class="h5 mb-0 fw-bold text-dark"><?= $totalDenda; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-money-bill-alt fa-2x text-secondary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 