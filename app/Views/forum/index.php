<?= $this->extend('template/main') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold">🗨️ Diskusi Terbaru</h2>
            <p class="text-muted mb-0">Temukan atau mulai diskusi baru bersama komunitas.</p>
        </div>
        <div>
            <a href="/forum/create" class="btn btn-success me-2">
                <i class="bi bi-plus-circle me-1"></i> Buat Topik
            </a>
            <a href="/dbuser" class="btn btn-outline-dark">
                ← Halaman User
            </a>
        </div>
    </div>

    <?php if (empty($topics)): ?>
        <div class="alert alert-info">Belum ada topik diskusi.</div>
    <?php endif; ?>

    <?php foreach ($topics as $topic): ?>
        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-body">
                <?php if (!empty($topic['category'])): ?>
                    <span class="badge rounded-pill bg-primary mb-2 px-3 py-1">
                        <?= esc($topic['category']) ?>
                    </span>
                <?php endif; ?>

                <h5 class="card-title fw-semibold mb-2">
                    <?= esc($topic['title']) ?>
                </h5>
                <p class="card-text text-muted mb-3">
                    <?= my_character_limiter($topic['content'], 100) ?>
                </p>

                <?php if (!empty($topic['attachment'])): ?>
                    <?php
                    $attachments = json_decode($topic['attachment'], true);
                    if (!is_array($attachments))
                        $attachments = [];
                    ?>
                    <div class="d-flex flex-wrap gap-2">
                        <?php foreach ($attachments as $file): ?>
                            <?php
                            $ext = pathinfo($file, PATHINFO_EXTENSION);
                            $isImage = in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'gif', 'webp']);
                            ?>
                            <?php if ($isImage): ?>
                                <img src="<?= base_url('uploads/' . $file) ?>" alt="Lampiran" class="img-fluid rounded shadow-sm border"
                                    style="max-width: 150px;">
                            <?php else: ?>
                                <a href="<?= base_url('uploads/' . $file) ?>" class="btn btn-sm btn-outline-secondary d-inline-block"
                                    download>📄 <?= basename($file) ?></a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <div class="mt-3">
                    <a href="/forum/detail/<?= $topic['id'] ?>" class="btn btn-outline-primary btn-sm">
                        🔍 Lihat Diskusi
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- Tombol kembali di bagian bawah -->
    <div class="text-center mt-5">
        <a href="/dbuser" class="btn btn-outline-dark">
            ← Kembali ke Halaman User
        </a>
    </div>
</div>

<?= $this->endSection() ?>
