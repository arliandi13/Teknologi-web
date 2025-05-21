<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>JPOT.id - Navbar Laporan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .navbar-custom {
      background-color: #fff;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      z-index: 1030;
    }
    .navbar-custom .search-input {
      border: 1px solid #ccc;
      border-radius: 20px;
      padding: 5px 10px;
      width: 100%;
      max-width: 500px;
    }
    .navbar-custom .search-group {
      flex: 1;
      max-width: 500px;
      margin: 0 1rem;
    }
    .navbar-custom .search-group button {
      border-radius: 20px;
    }
    .navbar-custom .navbar-icons i {
      margin: 0 10px;
      cursor: pointer;
    }
    .navbar-custom .profile-img {
      width: 32px;
      height: 32px;
      border-radius: 50%;
      object-fit: cover;
    }
    /* Posisi badge di pojok kanan atas lonceng */
    .navbar-icons .position-relative {
      position: relative;
    }
    .navbar-icons .position-absolute {
      position: absolute;
      top: 0;
      right: 0;
      transform: translate(50%, -50%);
      font-size: 0.65rem;
      padding: 2px 5px;
      pointer-events: none;
    }
  </style>
</head>
<body>

<?php
  // Contoh session data user, ganti sesuai session aslimu
  $name = session()->get('user_name') ?? 'Pengguna';
  $photo = session()->get('photo') ?? 'https://via.placeholder.com/32';
  
?>

<nav class="navbar navbar-expand-lg navbar-light navbar-custom px-3 sticky-top d-flex align-items-center justify-content-between">
  <!-- Left: Sidebar toggle + Logo -->
  <div class="d-flex align-items-center">
    <button class="btn btn-outline-secondary me-2" id="toggleSidebar">
      <i data-feather="menu"></i>
    </button>
    <span class="fw-bold text-danger me-2">▶ JPOT.id</span>
  </div>

  <!-- Middle: Search bar -->
  <div class="search-group d-flex align-items-center mb-3">
    <form action="<?= base_url('/forum') ?>" method="get" class="d-flex w-100">
      <input
        type="text"
        name="q"
        class="form-control search-input"
        placeholder="Cari judul diskusi..."
        value="<?= esc($q ?? '') ?>"
      >
      <button type="submit" class="btn btn-outline-secondary ms-1">
        <i data-feather="search"></i>
      </button>
    </form>
  </div>

  <!-- Right: Icons + User -->
  <div class="d-flex align-items-center navbar-icons">
    <div class="position-relative dropdown">
      <i data-feather="bell" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 24px;"></i>
      <?php if (!empty($reportCount) && $reportCount > 0): ?>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
          <?= $reportCount ?>
        </span>
      <?php endif; ?>

      <ul class="dropdown-menu dropdown-menu-end shadow p-2" style="min-width: 300px; max-height: 400px; overflow-y: auto;">
        <li class="dropdown-header fw-bold">Laporan Masuk</li>
        <?php if (!empty($adminReports)): ?>
          <?php foreach ($adminReports as $report): ?>
            <li class="dropdown-item small">
              <div>
                <strong><?= ucfirst($report['reported_type']) ?> #<?= $report['reported_id'] ?></strong><br>
                <span class="text-muted"><?= esc($report['reason']) ?></span>
              </div>
              <form action="/admin/report/updateStatus" method="post" class="mt-1">
                <input type="hidden" name="id" value="<?= $report['id'] ?>">
                <select name="status" onchange="this.form.submit()" class="form-select form-select-sm mt-1">
                  <option value="pending" <?= $report['status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
                  <option value="reviewed" <?= $report['status'] === 'reviewed' ? 'selected' : '' ?>>Ditinjau</option>
                  <option value="resolved" <?= $report['status'] === 'resolved' ? 'selected' : '' ?>>Selesai</option>
                </select>
              </form>
            </li>
            <hr class="my-1">
          <?php endforeach; ?>
        <?php else: ?>
          <li class="dropdown-item text-muted">Tidak ada laporan.</li>
        <?php endif; ?>
      </ul>
    </div>

    <img src="<?= base_url('uploads/users/' . $photo) ?>" class="ms-3 profile-img" alt="User Photo">
  </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
<script>
  feather.replace()
</script>

</body>
</html>
