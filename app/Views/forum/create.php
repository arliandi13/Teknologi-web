<?= $this->extend('template/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h3>Buat Topik Baru</h3>
    <form action="/forum/store" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="category" class="form-label">Kategori</label>
            <select name="category" class="form-select" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="Mesin">Mesin</option>
                <option value="Modifikasi">Modifikasi</option>
                <option value="Kelistrikan">Kelistrikan</option>
                <option value="Body & Cat">Body & Cat</option>
                <option value="Servis Umum">Servis Umum</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Judul Topik</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Isi Diskusi</label>
            <textarea name="content" class="form-control" rows="6" required></textarea>
            <div class="mb-3">
                <label for="attachment" class="form-label">Lampiran (opsional)</label>
                <input type="file" name="attachments[]" class="form-control" multiple>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Posting</button>
        <a href="/forum" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?= $this->endSection() ?>
