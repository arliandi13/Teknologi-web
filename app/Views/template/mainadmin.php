<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= esc($title ?? 'Dashboard') ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('asset/css/dashboard_user.css') ?>">
  <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <?= $this->include('template/sidebaradmin') ?>

    <!-- Page Content -->
    <div class="flex-grow-1">
      <?= $this->include('template/navbar') ?>

      <div class="container-fluid p-4">
        <?= $this->renderSection('content') ?>
        <p class="text-muted small mt-4">Website JPOT.id Indonesia</p>
      </div>
    </div>
  </div>

  <!-- JS -->
  <script>
    feather.replace();
    document.getElementById('toggleSidebar')?.addEventListener('click', () => {
      document.getElementById('sidebar')?.classList.toggle('collapsed');
    });
  </script>
</body>
</html>
