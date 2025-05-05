<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Responsive Dash UI</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
  <script src="https://unpkg.com/feather-icons"></script>
  <link rel="stylesheet" href="<?= base_url('asset/css/dashboard.css') ?>">
</head>
<body>

<!-- Navbar for small screens -->
<nav class="navbar d-md-none bg-dark px-3">
  <button class="btn btn-sm text-white" id="menuToggle">
    <i data-feather="menu"></i>
  </button>
  <span class="navbar-brand text-white ms-2">Dash UI</span>
</nav>

<div class="d-flex">
  <!-- Sidebar -->
  <div class="sidebar p-3" id="sidebar">
    <h5 class="text-white mb-4 d-none d-md-block">Dashboard</h5>
    <a href="#" class="active"><i data-feather="user"></i> Admin</a>
    <hr class="text-secondary">
    <small class="text-secondary px-3">LAYOUTS & PAGES</small>
    <a href="#"><i data-feather="file-text"></i> Pages</a>
    <a href="#"><i data-feather="lock"></i> Authentication</a>
    <a href="#"><i data-feather="layout"></i> Layouts</a>
    <hr class="text-secondary">
    <small class="text-secondary px-3">UI COMPONENTS</small>
    <a href="#"><i data-feather="grid"></i> Components</a>
    <a href="#"><i data-feather="menu"></i> Menu Level</a>
    <hr class="text-secondary">
    <small class="text-secondary px-3">DOCUMENTATION</small>
    <a href="#"><i data-feather="book"></i> Docs</a>
    <a href="#"><i data-feather="activity"></i> Changelog</a>
    <a href="#"><i data-feather="download"></i> Download</a>
  </div>

  <!-- Content -->
  <div class="flex-grow-1">
    <div class="top-header d-flex justify-content-between align-items-center px-4">
      <h4 class="mb-0">JPOT.id</h4>
      <a href="<?= base_url('/logout') ?>" class="btn btn-outline-danger ms-2">
        <i data-feather="log-out"></i> Logout
      </a>

    </div>

    <div class="container my-4">
      <div class="row g-3">
        <div class="col-md-3 col-sm-6">
          <div class="card-box text-center">
            <i data-feather="briefcase"></i>
            <h3>18</h3>
            <p class="text-muted">Projects<br><small>2 Completed</small></p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="card-box text-center">
            <i data-feather="check-square"></i>
            <h3>132</h3>
            <p class="text-muted">Active Task<br><small>28 Completed</small></p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="card-box text-center">
            <i data-feather="users"></i>
            <h3>12</h3>
            <p class="text-muted">Teams<br><small>1 Completed</small></p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="card-box text-center">
            <i data-feather="bar-chart-2"></i>
            <h3>76%</h3>
            <p class="text-muted">Productivity<br><small>5% Completed</small></p>
          </div>
        </div>
      </div>

      <div class="mt-5">
        <h5>Active Projects</h5>
        <table class="table table-bordered mt-3 bg-white">
          <thead>
            <tr>
              <th>Project Name</th>
              <th>Hours</th>
              <th>Priority</th>
              <th>Members</th>
              <th>Progress</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Dropbox Design System</td>
              <td>34</td>
              <td><span class="priority-medium">Medium</span></td>
              <td>
                <img src="https://i.pravatar.cc/30?img=1" class="rounded-circle me-1" width="30">
                <img src="https://i.pravatar.cc/30?img=2" class="rounded-circle me-1" width="30">
              </td>
              <td>
                <div class="progress" style="height: 8px;">
                  <div class="progress-bar" style="width: 15%"></div>
                </div>
              </td>
            </tr>
            <tr>
              <td>Slack Team UI Design</td>
              <td>47</td>
              <td><span class="priority-medium">Medium</span></td>
              <td>
                <img src="https://i.pravatar.cc/30?img=3" class="rounded-circle me-1" width="30">
                <img src="https://i.pravatar.cc/30?img=4" class="rounded-circle me-1" width="30">
              </td>
              <td>
                <div class="progress" style="height: 8px;">
                  <div class="progress-bar" style="width: 35%"></div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script>
  feather.replace();

  const menuToggle = document.getElementById('menuToggle');
  const sidebar = document.getElementById('sidebar');

  menuToggle.addEventListener('click', () => {
    sidebar.classList.toggle('show-sidebar');
  });
</script>
</body>
</html>
