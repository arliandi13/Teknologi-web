<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kelola Laporan - JPOT.id</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <div class="container">
    <h2 class="mb-4">Daftar Laporan Masuk</h2>

    <?php if (session()->getFlashdata('message')): ?>
      <div class="alert alert-success"><?= session()->getFlashdata('message') ?></div>
    <?php endif; ?>

    <table class="table table-bordered">
    <thead class="table-light">
  <tr>
    <th>Tipe</th>
    <th>ID</th>
    <th>Alasan</th>
    <th>Status</th>
    <th>Aksi</th>
  </tr>
</thead>
    <tbody>
    <?php foreach ($reports as $report): ?>
        <tr>
        <td><?= ucfirst($report['reported_type']) ?></td>
        <td><?= $report['reported_id'] ?></td>
        <td><?= esc($report['reason']) ?></td>
        <td>
            <form action="<?= base_url('/admin/report/updateStatus') ?>" method="post" class="d-flex">
            <input type="hidden" name="id" value="<?= $report['id'] ?>">
            <select name="status" class="form-select form-select-sm me-2" onchange="this.form.submit()">
                <option value="pending" <?= $report['status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
                <option value="reviewed" <?= $report['status'] === 'reviewed' ? 'selected' : '' ?>>Ditinjau</option>
                <option value="resolved" <?= $report['status'] === 'resolved' ? 'selected' : '' ?>>Selesai</option>
            </select>
            </form>
        </td>
        <td class="text-center">
            <a href="<?= base_url('topic/' . $report['reported_id']) ?>" class="btn btn-sm btn-primary">Lihat</a>
        </td>
        </tr>
    <?php endforeach ?>
    </tbody>

  </div>
</body>
</html>
