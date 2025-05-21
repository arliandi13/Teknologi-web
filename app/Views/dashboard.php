<?= $this->extend('template/mainadmin') ?>
<?= $this->section('content') ?>

<div class="container my-4">
  <h4 class="mb-4">Laporan Forum</h4>
  <div class="row">
    <div class="col-md-6 mb-4">
      <div class="card shadow-sm">
        <div class="card-body">
          <canvas id="chartPie" height="300"></canvas>
        </div>
      </div>
    </div>
    <div class="col-md-6 mb-4">
      <div class="card shadow-sm">
        <div class="card-body">
          <canvas id="chartLine" height="300"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  // Pie Chart Data
  const kategoriLabels = <?= json_encode(array_keys($kategoriForum)) ?>;
  const kategoriData = <?= json_encode(array_values($kategoriForum)) ?>;

  const ctxPie = document.getElementById('chartPie').getContext('2d');
  new Chart(ctxPie, {
    type: 'pie',
    data: {
      labels: kategoriLabels,
      datasets: [{
        data: kategoriData,
        backgroundColor: ['#ff6384', '#36a2eb', '#ffce56', '#4caf50', '#8e44ad', '#f39c12'],
      }]
    },
    options: {
      responsive: true,
      plugins: {
        title: {
          display: true,
          text: 'Jumlah Forum per Kategori'
        }
      }
    }
  });

  // Line Chart Data
  const tanggalLabels = <?= json_encode(array_keys($forumHarian)) ?>;
  const jumlahForum = <?= json_encode(array_values($forumHarian)) ?>;

  const ctxLine = document.getElementById('chartLine').getContext('2d');
  new Chart(ctxLine, {
    type: 'line',
    data: {
      labels: tanggalLabels,
      datasets: [{
        label: 'Forum Dibuat per Hari',
        data: jumlahForum,
        fill: false,
        borderColor: 'rgba(75,192,192,1)',
        tension: 0.3
      }]
    },
    options: {
      responsive: true,
      plugins: {
        title: {
          display: true,
          text: 'Aktivitas Forum Harian'
        }
      },
      scales: {
        x: {
          ticks: {
            maxRotation: 90,
            minRotation: 45,
            autoSkip: true,
            maxTicksLimit: 10
          }
        }
      }
    }
  });
</script>
<?= $this->endSection() ?>
