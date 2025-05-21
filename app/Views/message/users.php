<?= $this->extend('message/main') ?>
<?= $this->section('content') ?>

<!-- Bootstrap 5 CSS dan Feather Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
<script src="https://unpkg.com/feather-icons"></script>

<h2 class="mb-4 fw-bold text-primary">Daftar User</h2>

<ul class="list-group">
  <?php foreach ($users as $user): ?>
    <li class="list-group-item bg-white rounded shadow-sm mb-3 border-0"
        style="transition: transform 0.3s ease, box-shadow 0.3s ease;">
      <a href="<?= site_url('message/chat/' . $user['id']) ?>" 
         class="d-flex align-items-center text-decoration-none text-dark">
        
        <img src="<?= base_url('uploads/users/' . $user['photo']) ?>" 
             class="rounded-circle me-3 border border-2 border-primary"
             width="50" height="50" alt="avatar"
             style="transition: transform 0.3s ease;"/>
        
        <div class="flex-grow-1">
          <span class="fw-semibold fs-5"><?= esc($user['name']) ?></span>
        </div>
        
        <i data-feather="chevron-right" class="text-primary" style="width:24px; height:24px;"></i>
      </a>
    </li>
  <?php endforeach; ?>
</ul>

<script>
  feather.replace(); // Render Feather icons

  // Hover efek untuk list item
  document.querySelectorAll('ul.list-group li.list-group-item').forEach(function(item) {
    item.addEventListener('mouseenter', function() {
      this.style.transform = 'scale(1.02)';
      this.style.boxShadow = '0 4px 15px rgba(0, 123, 255, 0.25)';
      this.querySelector('img').style.transform = 'scale(1.1)';
    });
    item.addEventListener('mouseleave', function() {
      this.style.transform = 'scale(1)';
      this.style.boxShadow = 'none';
      this.querySelector('img').style.transform = 'scale(1)';
    });
  });
</script>

<!-- Bootstrap JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?= $this->endSection() ?>
