<?= $this->extend('template/mainedit') ?>
<?= $this->section('content') ?>

<style>
    .profile-card {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
    .profile-photo {
        object-fit: cover;
        height: 100%;
        width: 100%;
        max-height: 400px;
    }
    .info-icon {
        width: 20px;
        margin-right: 8px;
        color: #6c757d;
    }
</style>

<div class="container my-5">
    <div class="row g-4 profile-card bg-white">
        <div class="col-md-5 p-0">
            <img id="profilePreview" src="<?= !empty($user['photo']) ? base_url('uploads/users/' . $user['photo']) : 'https://via.placeholder.com/400x400' ?>" class="profile-photo" alt="Foto Profil">
        </div>

        <div class="col-md-7 p-4">
            <p class="text-uppercase text-muted small">Hello everybody, I am</p>
            <h2 class="fw-bold"><?= esc($user['name']) ?></h2>
            <h5 class="text-primary mb-3"><?= esc($user['specialty'] ?: 'Belum diisi') ?></h5>
            <p class="mb-4 text-muted" style="max-width: 500px;"><?= esc($user['bio'] ?: 'Tidak ada bio yang ditulis.') ?></p>

            <ul class="list-unstyled text-muted">
                <li><i class="bi bi-envelope info-icon"></i> <?= esc($user['email']) ?></li>
                <li><i class="bi bi-briefcase info-icon"></i> <?= esc($user['experience'] ?: 'Belum diisi') ?></li>
            </ul>

            <!-- Tombol dashboard kembali -->
            <a href="<?= base_url(session()->get('user_role') === 'admin' ? '/dbadmin' : '/dbuser') ?>" class="btn btn-outline-secondary mt-3">
                <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
            </a>
        </div>
    </div>

    <!-- FORM UPDATE -->
    <div class="card mt-5 border-0 shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="bi bi-pencil-square"></i> Edit Profil</h5>
        </div>
        <div class="card-body">

            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php endif; ?>

            <form action="<?= base_url('/update') ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" value="<?= esc($user['name']) ?>" required>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?= esc($user['email']) ?>" required>
                </div>
                <div class="mb-3">
                    <label>Bio</label>
                    <textarea name="bio" class="form-control"><?= esc($user['bio']) ?></textarea>
                </div>
                <div class="mb-3">
                    <label>Bidang Keahlian</label>
                    <input type="text" name="specialty" class="form-control" value="<?= esc($user['specialty']) ?>">
                </div>
                <div class="mb-3">
                    <label>Pengalaman</label>
                    <input type="text" name="experience" class="form-control" value="<?= esc($user['experience']) ?>">
                </div>
                <div class="mb-3">
                    <label>Foto Profil (opsional)</label>
                    <input type="file" name="photo" id="photoInput" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
            </form>
        </div>
    </div>
</div>

<!-- Preview JS -->
<script>
    const photoInput = document.getElementById('photoInput');
    const profilePreview = document.getElementById('profilePreview');

    photoInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            profilePreview.src = URL.createObjectURL(file);
        }
    });
</script>

<?= $this->endSection() ?>
