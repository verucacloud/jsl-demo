<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PT. Jalur Sutra Logistik</title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body class="bg-login">

<div class="container-fluid">
    <div class="row vh-100 align-items-center justify-content-center">
        <div class="col-11 col-sm-8 col-md-6 col-lg-4">
            
            <div class="card-login shadow-lg border-0">
                <div class="card-body p-4 p-md-5">
                    <div class="text-center mb-4">
                        <div class="logo-wrapper mb-3">
                            <img src="<?= BASEURL; ?>/img/logo.png" alt="Logo" class="img-fluid" style="max-height: 80px;">
                        </div>
                        <h6 class="text-uppercase tracking-wider text-muted small mb-1">Financial System</h6>
                        <h4 class="fw-bold text-dark">Jalur Sutra Logistik</h4>
                    </div>

                    <form action="<?= BASEURL; ?>/login/proses" method="POST">
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control custom-input" id="floatingInput" placeholder="name@example.com" required>
                            <label for="floatingInput">Email Address</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" name="password" class="form-control custom-input" id="floatingPassword" placeholder="Password" required>
                            <label for="floatingPassword">Password</label>
                        </div>
                        
                        <div class="form-check mb-4 ms-1">
                            <input class="form-check-input" type="checkbox" id="remember" name="remember">
                            <label class="form-check-label text-muted small" for="remember">
                                Simpan sesi login
                            </label>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary w-100 py-3 fw-bold btn-animate">
                            MASUK
                        </button>
                    </form>

                    <div class="text-center mt-5">
                        <p class="mb-0 text-muted" style="font-size: 0.75rem;">&copy; 2026 Akbar - Versi 1.0</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="<?= BASEURL; ?>/js/bootstrap.js"></script>
</body>
</html>