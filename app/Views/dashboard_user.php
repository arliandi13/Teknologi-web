<?= $this->extend('template/main') ?>

<?= $this->section('content') ?>

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
      <?php if (!empty($posts)): ?>
        <?php foreach ($posts as $post): ?>
          <tr>
            <td>
              <a href="<?= base_url('forum/detail/' . $post['id']) ?>">
                <?= esc($post['title']) ?>
              </a>
            </td>
            <td>
              <span class="badge bg-primary"><?= esc($post['category']) ?></span>
            </td>
            <td><?= esc($post['username']) ?></td>
            <td>-</td>
            <td><?= $post['comment_count'] ?></td>
            <td>
              <a href="<?= base_url('forum/detail/' . $post['id']) ?>" class="btn btn-success btn-sm">Lihat Komentar</a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="6" class="text-center">Belum ada postingan.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
<?= $this->endSection() ?>
