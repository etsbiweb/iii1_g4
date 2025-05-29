<?php
session_start();
include '../includes/dbh.inc.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../includes/login.php");
    exit();
}

// Uzmemo podatke iz sesije
$full_name = $_SESSION['full_name'];
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sona | Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="icon" type="image/png" href="img/favicon.png">

    <style>
        body {
            background-color: #0a0a23;
            color: white;
            font-weight: 700;
        }
        .profile-container {
            max-width: 500px;
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
        .btn-custom:hover {
            background-color: #c58d5d;
        }
        a {
            color: #dfa974;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .info-box {
            background-color: #2a2a3e;
            padding: 15px;
            border-radius: 8px;
            border: 1px solid #444;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center">
    <div class="profile-container">
        <h2 class="text-center mb-4">Vaš Profil</h2>

        <div class="info-box mb-3">
            <p><strong>Ime i prezime:</strong> <?php echo htmlspecialchars($full_name); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
        </div>

        <div class="d-grid gap-2">
            <a href="./index1.php" class="btn btn-custom">Nazad na Početnu</a>
            <a href="../includes/logout.php" class="btn btn-danger">Odjava</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
