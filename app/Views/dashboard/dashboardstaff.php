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
<!-- Alert Sukses login -->
<div class="flash-data-berhasil" data-flashdataberhasil="<?= session()->getFlashData('success'); ?>"></div>

<div class="container-fluid">

    <!-- Cards -->
    <div class="row mt-4 justify-content-center">
        <div class="col-xl-3 col-md-6 mb-4 mx-3">
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
        <div class="col-xl-3 col-md-6 mb-4 mx-3">
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
        <div class="col-xl-3 col-md-6 mb-4 mx-3">
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
    </div>
  
    <!-- Chart -->
    <div class="row">
        <div class="col">
            <div class="card shadow mb-2">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Penghasilan Perpustakaan Tahun <?= $tahun; ?></h6>
                
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                <canvas id="myChart"></canvas>
                </div>
            </div>
            </div>
        </div>
    </div>

</div>

</div>


<script>

var ctx = document.getElementById("myChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Des"],
    datasets: [{
      label: "Pendapatan",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: <?php echo json_encode($dataDenda) ; ?>,
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          beginAtZero: true,
          maxTicksLimit: 5,
          padding: 10,
          callback: function(value, index, values) {
             return value.toLocaleString("id-ID",{style:"currency", currency:"IDR"});
           }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ' + tooltipItem.yLabel.toLocaleString("id-ID",{style:"currency", currency:"IDR"});
        }
      }
    }
  }
});

</script>



<!-- End of Main Content -->
<?= $this->endSection(); ?>