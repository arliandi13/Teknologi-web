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

        <!-- Form laporan untuk topik -->
        <div class="mt-4">
            <form action="<?= base_url('/report/submit') ?>" method="post">
                <input type="hidden" name="type" value="topic">
                <input type="hidden" name="id" value="<?= $topic['id'] ?>">
                <div class="mb-2">
                    <textarea name="reason" class="form-control" rows="2" placeholder="Laporkan topik ini..." required></textarea>
                </div>
                <button type="submit" class="btn btn-danger btn-sm">Laporkan Topik</button>
            </form>
        </div>

        <hr>
    </div>

    <h5>Balasan</h5>
    <?php foreach ($replies as $reply): ?>
        <div class="card mb-3">
            <div class="card-body">

                <?php if (!empty($reply['attachment'])): ?>
                    <?php
                        $attachments = json_decode($reply['attachment'], true);
                        foreach ($attachments as $file):
                            $ext = pathinfo($file, PATHINFO_EXTENSION);
                            $isImage = in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'gif', 'webp']);
                    ?>
                        <div class="mt-2">
                            <?php if ($isImage): ?>
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

                <p class="mb-2"><?= nl2br(esc($reply['content'])) ?></p>
                <small class="text-muted d-block mt-3">
                    Dibalas oleh <strong><?= esc($reply['name']) ?></strong> pada <?= $reply['created_at'] ?>
                </small>

                <!-- Form laporan untuk balasan -->
                <div class="mt-2">
                    <form action="<?= base_url('/report/submit') ?>" method="post">
                        <input type="hidden" name="type" value="reply">
                        <input type="hidden" name="id" value="<?= $reply['id'] ?>">
                        <div class="mb-2">
                            <textarea name="reason" class="form-control" rows="2" placeholder="Laporkan balasan ini..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-danger btn-sm">Laporkan Balasan</button>
                    </form>
                </div>

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
