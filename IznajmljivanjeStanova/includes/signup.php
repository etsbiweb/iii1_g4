<?php
session_start();
include '../includes/dbh.inc.php';
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'sona';

// Konekcija
$conn = new mysqli($hostname, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Greška u konekciji: " . $conn->connect_error);
}

$poruka = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Uzmi i očisti unose
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $password = $_POST['lozinka'];
    $confirm = $_POST['confirm_lozinka'];

    // Validacija polja
    if (empty($full_name) || empty($email) || empty($password) || empty($confirm)) {
        $poruka = "Sva polja su obavezna.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $poruka = "Email adresa nije validna.";
    } elseif ($password !== $confirm) {
        $poruka = "Lozinke se ne poklapaju.";
    } else {
        // Provjera postoji li već email
        $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $check->bind_param("s", $email);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            $poruka = "Email je već registrovan.";
        } else {
            // Hash lozinke i insert
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO users (full_name, email, lozinka) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $full_name, $email, $hashed);
            if ($stmt->execute()) {
                $poruka = "Registracija uspješna! <a href='login.php'>Prijavite se</a>";
                // Nakon uspješne registracije, možemo očistiti varijable forme
                $full_name = $email = "";
            } else {
                $poruka = "Greška prilikom registracije.";
            }
            $stmt->close();
        }
        $check->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Sona | Registracija</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            margin-top: 80px;
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

        a {
            color: #dfa974;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center">
    <div class="login-container">
        <h2 class="text-center mb-4">Registracija || Sona Apartmani</h2>

        <?php if (!empty($poruka)) echo "<div class='alert alert-warning'>$poruka</div>"; ?>

        <form method="POST" action="">
            <div class="mb-3">
                <label for="full_name" class="form-label">Ime i prezime</label>
                <input type="text" name="full_name" class="form-control" id="full_name" placeholder="Unesite ime i prezime" value="<?= htmlspecialchars($full_name ?? '') ?>" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email adresa</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Unesite email" value="<?= htmlspecialchars($email ?? '') ?>" required>
            </div>

            <div class="mb-3">
                <label for="lozinka" class="form-label">Lozinka</label>
                <input type="password" name="lozinka" class="form-control" id="lozinka" placeholder="Unesite lozinku" required>
            </div>

            <div class="mb-3">
                <label for="confirm_lozinka" class="form-label">Potvrdite lozinku</label>
                <input type="password" name="confirm_lozinka" class="form-control" id="confirm_lozinka" placeholder="Ponovno unesite lozinku" required>
            </div>

            <div class="d-grid mb-2">
                <button type="submit" class="btn btn-custom">Registruj se</button>
            </div>

            <div class="text-center">
                <small>Već imate nalog? <a href="login.php">Prijavite se</a></small>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
