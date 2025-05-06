<?= $this->extend('template/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="mb-4">
        <?php if (!empty($topic['category'])): ?>
            <p class="text-muted">Kategori: <strong><?= esc($topic['category']) ?></strong></p>
        <?php endif; ?>

        <h3><?= esc($topic['title']) ?></h3>
        <p><?= nl2br(esc($topic['content'])) ?></p>

        <?php if (!empty($topic['attachment'])): ?>
            <?php
                $attachments = json_decode($topic['attachment'], true);
                foreach ($attachments as $file):
                    $ext = pathinfo($file, PATHINFO_EXTENSION);
                    $isImage = in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'gif', 'webp']);
            ?>
                <div class="mt-3">
                    <strong></strong><br>
                    <?php if ($isImage): ?>
                        <!-- Menampilkan gambar menyamping jika ada cukup ruang -->
                        <div class="d-flex flex-wrap">
                            <img src="<?= base_url('uploads/' . $file) ?>"
                                 class="img-thumbnail shadow-sm mt-2"
                                 style="max-width: 250px; max-height: 250px; object-fit: cover; margin-right: 10px;">
                        </div>
                    <?php else: ?>
                        <a href="<?= base_url('uploads/' . $file) ?>" class="btn btn-sm btn-outline-secondary mt-1" download>
                            📄 Download Lampiran
                        </a>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <hr>
    </div>

    <h5>Balasan</h5>
    <?php foreach ($replies as $reply): ?>
        <div class="card mb-3">
            <div class="card-body">
                <!-- Menampilkan lampiran gambar di atas teks -->
                <?php if (!empty($reply['attachment'])): ?>
                    <?php
                        $attachments = json_decode($reply['attachment'], true);
                        foreach ($attachments as $file):
                            $ext = pathinfo($file, PATHINFO_EXTENSION);
                            $isImage = in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'gif', 'webp']);
                    ?>
                        <div class="mt-2">
                            <strong></strong><br>
                            <?php if ($isImage): ?>
                                <!-- Gambar di atas teks balasan -->
                                <div class="d-flex flex-wrap mb-2">
                                    <img src="<?= base_url('uploads/' . $file) ?>"
                                         class="img-thumbnail shadow-sm mt-2"
                                         style="max-width: 250px; max-height: 250px; object-fit: cover; margin-right: 10px;">
                                </div>
                            <?php else: ?>
                                <a href="<?= base_url('uploads/' . $file) ?>" class="btn btn-sm btn-outline-secondary mt-1" download>
                                    📄 Download Lampiran
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

                <!-- Teks balasan setelah gambar -->
                <p class="mb-2"><?= nl2br(esc($reply['content'])) ?></p>

                <small class="text-muted d-block mt-3">
                    Dibalas oleh <strong><?= esc($reply['name']) ?></strong> pada <?= $reply['created_at'] ?>
                </small>
            </div>
        </div>
    <?php endforeach; ?>

    <hr>
    <h5>Balas Diskusi</h5>
    <form action="/forum/reply/<?= $topic['id'] ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <textarea name="content" class="form-control" rows="4" placeholder="Tulis balasan kamu..." required></textarea>
        </div>
        <div class="mb-3">
            <label for="attachment" class="form-label">Upload File</label>
            <input type="file" name="attachments[]" class="form-control" multiple>
        </div>
        <button type="submit" class="btn btn-primary">Kirim Balasan</button>
    </form>
</div>

<?= $this->endSection() ?>
