<style>
  /* Sidebar sticky scrollable */
.sidebar {
  position: sticky;
  top: 0;
  height: 100vh;
  overflow-y: auto;
  min-width: 220px;
  z-index: 1020;
}

.sidebar::-webkit-scrollbar {
  width: 6px;
}
.sidebar::-webkit-scrollbar-thumb {
  background-color: rgba(255, 255, 255, 0.2);
  border-radius: 3px;
}

</style>


<div class="bg-dark text-white sidebar" id="sidebar">
  <div class="sidebar-header p-3 d-flex align-items-center border-bottom border-secondary">
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
    <li class="nav-item">
      <a class="nav-link text-white" href="<?= base_url('/admin') ?>">
        <i data-feather="home"></i> Dashboard
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="#">
        <i data-feather="user-check"></i> Frofile
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="<?= base_url('/userspengguna') ?>">
        <i data-feather="users"></i> Daftar User
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="#">
        <i data-feather="list"></i> Kategori Diskusi
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="#">
        <i data-feather="message-square"></i> Direct Massage
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="#">
        <i data-feather="lock"></i> Ganti Password
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="<?= base_url('/logout') ?>">
        <i data-feather="log-out"></i> Logout
      </a>
    </li>
  </ul>
</div>
