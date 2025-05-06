<?= $this->extend('template/main') ?>
<?= $this->section('content') ?>
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
<?= $this->endSection() ?>




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
