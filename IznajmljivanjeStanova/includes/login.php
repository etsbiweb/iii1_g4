<?php
session_start();
include '../includes/dbh.inc.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['lozinka'];

    if (empty($email) || empty($password)) {
        $greska = "Molimo unesite sve podatke.";
    } else {
        $stmt = $conn->prepare("SELECT id, full_name, lozinka FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 1) {
            $stmt->bind_result($id, $full_name, $hashed_password);
            $stmt->fetch();

            if (password_verify($password, $hashed_password)) {
                $_SESSION['user_id'] = $id;
                $_SESSION['full_name'] = $full_name;
                header("Location: ../sona-master/index.html");
                exit();
            } else {
                $greska = "Pogrešna lozinka.";
            }
        } else {
            $greska = "Korisnik ne postoji.";
        }

        $stmt->close();
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sona | Login</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="icon" type="image/png" href="img/favicon.png">

    <style>
        body {
            background-color: #0a0a23;
            color: white;
            font-weight: 700;
        }
        .login-container {
            max-width: 400px;
            margin-top: 100px;
            background-color: #1a1a2e;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(223, 169, 116, 0.3);
        }
        .btn-custom {
            background-color: #dfa974;
            color: white;
            border: none;
            font-weight: 700;
        }
        ::placeholder { color: #ccc; }
        .form-control::placeholder { color: #ccc; }
        .btn-custom:hover { background-color: #c58d5d; }
        .form-control {
            background-color: #2a2a3e;
            color: white;
            border: 1px solid #444;
        }
        .form-control:focus {
            border-color: #dfa974;
            box-shadow: 0 0 0 0.2rem rgba(223, 169, 116, 0.25);
            background-color: #323242;
            color: white;
        }
        .form-check-label { color: #ccc; }
        a {
            color: #dfa974;
            text-decoration: none;
        }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center">
    <div class="login-container">
        <h2 class="text-center mb-4">Prijava || Sona Apartmani</h2>

        <?php if (isset($greska)) echo "<div class='alert alert-danger'>$greska</div>"; ?>

        <form method="POST" action="">
            <div class="mb-3">
                <label for="email" class="form-label">Email adresa</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Unesite email" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Lozinka</label>
                <div class="position-relative">
                    <input type="password" name="lozinka" class="form-control" id="password" placeholder="Unesite lozinku" required>
                    <i class="bi bi-eye-slash-fill position-absolute top-50 end-0 translate-middle-y me-3" id="togglePassword" style="cursor: pointer;"></i>
                </div>
            </div>

            <script>
                const togglePassword = document.getElementById('togglePassword');
                const password = document.getElementById('password');
                togglePassword.addEventListener('click', function () {
                    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                    password.setAttribute('type', type);
                    this.classList.toggle('bi-eye-fill');
                    this.classList.toggle('bi-eye-slash-fill');
                });
            </script>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="rememberMe">
                <label class="form-check-label" for="rememberMe">Zapamti me</label>
            </div>

            <div class="d-grid mb-2">
                <button type="submit" class="btn btn-custom">Prijavi se</button>
            </div>

            <div class="text-center">
                <small>Nemate nalog? <a href="signup.html">Registrujte se</a></small>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
