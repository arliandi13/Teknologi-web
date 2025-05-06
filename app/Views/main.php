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
        <div class="d-flex align-items-center">
            <span class="me-2" style="color: #00ff88; font-size: 12px;">●</span>
            <div>
                <div class="fw-bold text-white"><?= esc(session()->get('user_name')) ?></div>
                <div class="text-success small">Online</div>
    </div>
</div>

    </div>
      <ul class="nav flex-column p-2">
        <li class="nav-item"><a class="nav-link text-white" href="#"><i data-feather="home"></i> Dashboard</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="#"><i data-feather="user-check"></i> Frofile</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="<?= base_url('/forum') ?>"><i data-feather="users"></i> Buat Postingan</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="#"><i data-feather="list"></i> Kategori Diskusi</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="#"><i data-feather="message-square"></i> Direct Massage</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="#"><i data-feather="lock"></i> Ganti Password</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="#"><i data-feather="log-out"></i> Logout</a></li>
      </ul>
    </div>
