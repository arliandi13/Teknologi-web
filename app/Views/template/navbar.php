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
</style>


<?php
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
    <form action="<?= base_url('/dbuser') ?>" method="get" class="d-flex w-100">
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
    <div class="position-relative">
      <i data-feather="bell"></i>
      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">9+</span>
    </div>
    <img src="<?= base_url('uploads/users/' . $photo) ?>" class="ms-3 profile-img" alt="User Photo">
  </div>
</nav>
