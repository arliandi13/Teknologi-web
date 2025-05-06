<?= $this->extend('template/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Diskusi Terbaru</h3>
        <a href="/forum/create" class="btn btn-primary">+ Buat Topik</a>
    </div>

    <?php foreach ($topics as $topic): ?>
        <div class="card mb-3">
            <div class="card-body">
                <!-- Kategori -->
                <?php if (!empty($topic['category'])): ?>
                    <span class="badge bg-secondary mb-2">Kategori: <?= esc($topic['category']) ?></span>
                <?php endif; ?>

                <h5 class="card-title"><?= esc($topic['title']) ?></h5>
                <p class="card-text"><?= my_character_limiter($topic['content'], 100) ?></p>

                <!-- Lampiran jika ada -->
                <?php if (!empty($topic['attachment'])): ?>
                    <?php
                        $attachments = json_decode($topic['attachment'], true);
                        if (!is_array($attachments)) {
                            $attachments = []; // fallback supaya aman di-foreach
                        }
                        $imageCount = 0;
                    ?>
                    <div class="mt-2">
                        <?php foreach ($attachments as $file): ?>
                            <?php
                                $ext = pathinfo($file, PATHINFO_EXTENSION);
                                $isImage = in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'gif', 'webp']);
                            ?>
                            <?php if ($isImage): ?>
                                <!-- Menampilkan gambar -->
                                <img src="<?= base_url('uploads/' . $file) ?>" 
                                    alt="Lampiran Gambar" 
                                    class="img-fluid rounded shadow-sm mt-2"
                                    style="max-width: 48%; margin-right: 2%;">
                            <?php else: ?>
                                <!-- Menampilkan file selain gambar -->
                                <a href="<?= base_url('uploads/' . $file) ?>" 
                                class="btn btn-sm btn-outline-secondary mt-2" download>
                                    📄 Download Lampiran
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <a href="/forum/detail/<?= $topic['id'] ?>" class="btn btn-sm btn-outline-primary mt-3">
                    Lihat Diskusi
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?= $this->endSection() ?>
