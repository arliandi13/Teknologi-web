<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Forum</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('asset/css/dashboard_user.css') ?>">
  <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-dark text-white sidebar" id="sidebar">
      <div class="sidebar-header p-3 d-flex align-items-center">
        <img src="https://via.placeholder.com/40" class="rounded-circle me-2" alt="avatar">
        <div>
          <div class="fw-bold">Robby Tantular</div>
          <small class="text-success">● Online</small>
        </div>
      </div>
      <ul class="nav flex-column p-2">
        <li class="nav-item"><a class="nav-link text-white" href="#"><i data-feather="home"></i> Dashboard</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="#"><i data-feather="list"></i> Kategori Diskusi</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="<?= base_url('/forum') ?>"><i data-feather="users"></i> Buat Postingan</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="#"><i data-feather="message-square"></i> Data Diskusi</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="#"><i data-feather="user-check"></i> Data Admin</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="#"><i data-feather="lock"></i> Ganti Password</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="#"><i data-feather="log-out"></i> Logout</a></li>
      </ul>
    </div>

    <!-- Page Content -->
    <div class="flex-grow-1">
      <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm px-3">
        <button class="btn btn-outline-secondary me-2" id="toggleSidebar"><i data-feather="menu"></i></button>
        <span class="navbar-text ms-auto">Robby Tantular - Admin <i data-feather="user"></i></span>
        <a href="<?= base_url('/logout') ?>" class="btn btn-outline-danger ms-2">
          <i data-feather="log-out"></i> Logout
        </a>

      </nav>

      <div class="container-fluid p-4">
        <h4>Diskusi / Posting</h4>
        <table class="table table-bordered mt-3 bg-white">
          <thead class="table-light">
            <tr>
              <th>Judul Diskusi</th>
              <th>Kategori</th>
              <th>Member</th>
              <th><i data-feather="eye"></i></th>
              <th><i data-feather="message-square"></i></th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><a href="#">Mempromosikan Produk Online</a></td>
              <td><span class="badge bg-primary">Internet Marketing</span></td>
              <td>Muhammad Irsyad</td>
              <td>12</td>
              <td>3</td>
              <td><a href="#" class="btn btn-success btn-sm">Lihat Komentar</a></td>
            </tr>
          </tbody>
        </table>
        <p class="text-muted small">Copyright © 2019 - Website Forum Indonesia</p>
      </div>
    </div>
  </div>

  <!-- JS -->
  <script>
    feather.replace();

    document.getElementById('toggleSidebar').addEventListener('click', () => {
      document.getElementById('sidebar').classList.toggle('collapsed');
    });
  </script>
</body>
</html>
