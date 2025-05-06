<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - ForumKu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card {
            border-radius: 1rem;
            box-shadow: 0 8px 16px rgba(0,0,0,0.3);
        }
        .form-control:focus {
            border-color: #00c9a7;
            box-shadow: 0 0 0 0.2rem rgba(0, 201, 167, 0.25);
        }
        .btn-primary {
            background-color: #00c9a7;
            border-color: #00c9a7;
        }
        .btn-primary:hover {
            background-color: #00b49f;
            border-color: #00b49f;
        }
        select.form-select {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card p-4">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">REGISTER</h3>

                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger">
                                <?= session()->getFlashdata('error') ?>
                            </div>
                        <?php endif; ?>

                        <form action="/register" method="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="mb-3 position-relative">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password" id="password" required>
                                    <span class="input-group-text" onclick="togglePassword()" style="cursor: pointer;">
                                        <i class="bi bi-eye-slash" id="toggleIcon"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label">Daftar sebagai</label>
                                <select name="role" class="form-select" required>
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Daftar</button>
                        </form>

                        <p class="mt-3 text-center text-muted">
                            Sudah punya akun? <a href="/login" class="text-decoration-none">Login sekarang</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById("password");
            const toggleIcon = document.getElementById("toggleIcon");
            const isPassword = passwordInput.type === "password";
            passwordInput.type = isPassword ? "text" : "password";
            toggleIcon.classList.toggle("bi-eye");
            toggleIcon.classList.toggle("bi-eye-slash");
        }
    </script>
</body>
</html>
