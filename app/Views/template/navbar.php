<style>
  .navbar.sticky-top {
    z-index: 1030;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
  }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm px-3 sticky-top">
  <button class="btn btn-outline-secondary me-2" id="toggleSidebar"><i data-feather="menu"></i></button>
  <span class="navbar-text ms-auto"><?= esc(session()->get('user_name')) ?> <i data-feather="user"></i></span>
</nav>


