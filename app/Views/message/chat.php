<?= $this->extend('message/main') ?>
<?= $this->section('content') ?>

<!-- Load Bootstrap 5 CSS dan Feather Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://unpkg.com/feather-icons"></script>

<!-- Header Direct Message -->
<div class="d-flex justify-content-between align-items-center gap-3 mb-4">
  <?php 
    $receiverPhoto = !empty($receiver['photo']) ? base_url('uploads/users/' . $receiver['photo']) : 'https://via.placeholder.com/40';
  ?>
  <div class="d-flex align-items-center gap-3">
    <img src="<?= esc($receiverPhoto) ?>" class="rounded-circle" width="48" height="48" alt="avatar">
    <div>
      <h5 class="mb-0 text-dark"><?= esc($receiver['name']) ?></h5>
    </div>
  </div>

  <!-- Dropdown User List -->
  <div class="dropdown">
    <button class="btn btn-light border-0" type="button" id="dropdownUserChat" data-bs-toggle="dropdown" aria-expanded="false" title="Pilih pengguna untuk chat">
      <i data-feather="message-square" class="text-primary" style="width: 24px; height: 24px;"></i>
    </button>
    <ul class="dropdown-menu dropdown-menu-end p-2 shadow rounded-3 border-0" aria-labelledby="dropdownUserChat" style="max-height: 350px; overflow-y: auto; min-width: 250px;">
      <?php if (!empty($users)): ?>
        <?php foreach ($users as $user): ?>
          <?php if ($user['id'] !== session()->get('user_id')): ?>
          <li>
            <a class="dropdown-item d-flex align-items-center py-2 rounded" href="<?= site_url('message/chat/' . $user['id']) ?>">
              <img src="<?= base_url('uploads/users/' . (!empty($user['photo']) ? $user['photo'] : 'default.jpg')) ?>" class="rounded-circle me-2 border" width="36" height="36" alt="avatar">
              <div class="d-flex flex-column">
                <strong><?= esc($user['name']) ?></strong>
              </div>
            </a>
          </li>
          <?php endif; ?>
        <?php endforeach; ?>
      <?php else: ?>
        <li><span class="dropdown-item text-muted">Tidak ada user lain</span></li>
      <?php endif; ?>
    </ul>
  </div>
</div>

<!-- Chat Box -->
<div id="chat-box" class="p-3 mb-3">
  <?php foreach ($messages as $msg): ?>
    <?php 
      $isSender = ($msg['sender_id'] == session()->get('user_id'));
      $alignClass = $isSender ? 'justify-content-end' : 'justify-content-start';
      $photo = $msg['sender_photo'] ?? 'default.jpg';
      $photoUrl = base_url('uploads/users/' . $photo);
    ?>

    <div class="d-flex <?= $alignClass ?> mb-3">
      <?php if (!$isSender): ?>
        <img src="<?= esc($photoUrl) ?>" class="rounded-circle me-2" width="40" height="40" alt="avatar">
      <?php endif; ?>

      <div class="chat-bubble <?= $isSender ? 'sender' : 'receiver' ?>">
        <?= nl2br(esc($msg['content'])) ?>
        <div class="chat-meta"><?= date('d M Y H:i', strtotime($msg['created_at'])) ?></div>
      </div>

      <?php if ($isSender): ?>
        <img src="<?= esc($photoUrl) ?>" class="rounded-circle ms-2" width="40" height="40" alt="avatar">
      <?php endif; ?>
    </div>
  <?php endforeach; ?>
</div>

<!-- Input Form -->
<form action="<?= site_url('message/sendMessage') ?>" method="post" class="d-flex align-items-center gap-2 mb-4">
  <input type="hidden" name="receiver_id" value="<?= $receiver['id'] ?>">
  <textarea id="content" name="content" class="form-control rounded-pill px-3 py-2" rows="1" placeholder="Ketik pesan..." required style="resize: none;"></textarea>
  <button type="submit" class="btn btn-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
    <i data-feather="send"></i>
  </button>
</form>

<!-- Feather Icons & Auto Scroll -->
<script>
  feather.replace();
  const chatBox = document.getElementById('chat-box');
  chatBox.scrollTop = chatBox.scrollHeight;
</script>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Style -->
<style>
  body {
    background: linear-gradient(to right, #e0f7fa, #ffffff);
    font-family: 'Segoe UI', sans-serif;
  }

  #chat-box {
    background-color: #ffffff;
    border-radius: 1rem;
    padding: 1rem;
    height: 400px;
    overflow-y: auto;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
  }

  #chat-box::-webkit-scrollbar {
    width: 8px;
  }

  #chat-box::-webkit-scrollbar-thumb {
    background-color: rgba(0, 0, 0, 0.15);
    border-radius: 4px;
  }

  .chat-bubble {
    border-radius: 1rem;
    padding: 0.75rem 1rem;
    max-width: 70%;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    font-size: 1rem;
    line-height: 1.5;
    word-wrap: break-word;
  }

  .chat-bubble.sender {
    background-color: #0d6efd;
    color: white;
    margin-left: auto;
  }

  .chat-bubble.receiver {
    background-color: #f1f1f1;
    color: #333;
    margin-right: auto;
  }

  .chat-meta {
    font-size: 0.75rem;
    color: #888;
    margin-top: 0.3rem;
  }

  textarea.form-control {
    border-radius: 50px;
    resize: none;
    transition: 0.3s ease;
  }

  textarea.form-control:focus {
    box-shadow: 0 0 0 0.15rem rgba(13, 110, 253, 0.25);
  }

  .btn-primary {
    background-color: #0d6efd;
    border-color: #0d6efd;
    transition: 0.3s ease;
  }

  .btn-primary:hover {
    background-color: #0b5ed7;
  }

  .dropdown-menu a:hover {
    background-color: #f0f8ff;
  }

  .rounded-circle {
    object-fit: cover;
  }

  textarea::placeholder {
    color: #999;
  }
</style>

<?= $this->endSection() ?>
