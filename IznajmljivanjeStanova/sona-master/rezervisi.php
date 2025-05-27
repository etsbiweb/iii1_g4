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

// Da bi zadržali unesene podatke u formi nakon submit-a (ako treba)
$checkin = $checkout = $broj_gostiju = $apartman = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Uzmi i očisti unose
    $checkin = trim($_POST['checkin']);
    $checkout = trim($_POST['checkout']);
    $broj_gostiju = trim($_POST['broj_gostiju']);
    $apartman = trim($_POST['apartman']);

    // Validacija polja
    if (empty($checkin) || empty($checkout) || empty($broj_gostiju) || empty($apartman)) {
        $poruka = "Molimo popunite sva polja.";
    } elseif ($checkin > $checkout) {
        $poruka = "Datum ulaska ne može biti nakon datuma izlaska.";
    } else {
        // Ubaci u bazu
        $stmt = $conn->prepare("INSERT INTO rezervacije (checkin, checkout, broj_gostiju, apartman) VALUES (?, ?, ?, ?)");
        if (!$stmt) {
            die("Greška u pripremi upita: " . $conn->error);
        }
        $stmt->bind_param("ssis", $checkin, $checkout, $broj_gostiju, $apartman);

        if ($stmt->execute()) {
            $poruka = '<div class="alert alert-success" role="alert">Rezervacija uspješno dodana!</div>';
            // Očistimo polja nakon uspjeha
            $checkin = $checkout = $broj_gostiju = $apartman = "";
        } else {
            $poruka = '<div class="alert alert-danger" role="alert">Greška prilikom dodavanja rezervacije.</div>';
        }
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Sona | Rezervacija</title>
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
        <h2 class="text-center mb-4">Rezervacija || Sona Apartmani</h2>

        <?php if (!empty($poruka)) echo $poruka; ?>

        <form method="POST" action="">
            <div class="mb-3">
                <label for="checkin" class="form-label">Datum ulaska</label>
                <input type="date" name="checkin" class="form-control" id="checkin" value="<?= htmlspecialchars($checkin) ?>" required>
            </div>

            <div class="mb-3">
                <label for="checkout" class="form-label">Datum izlaska</label>
                <input type="date" name="checkout" class="form-control" id="checkout" value="<?= htmlspecialchars($checkout) ?>" required>
            </div>

            <div class="mb-3">
                <label for="broj_gostiju" class="form-label">Broj gostiju</label>
                <select name="broj_gostiju" class="form-control" id="broj_gostiju" required>
                    <option value="" disabled <?= $broj_gostiju == "" ? "selected" : "" ?>>Izaberite broj gostiju</option>
                    <option value="1" <?= $broj_gostiju == "1" ? "selected" : "" ?>>1 Osoba</option>
                    <option value="2" <?= $broj_gostiju == "2" ? "selected" : "" ?>>2 Osobe</option>
                    <option value="3" <?= $broj_gostiju == "3" ? "selected" : "" ?>>3 Osobe</option>
                    <option value="4" <?= $broj_gostiju == "4" ? "selected" : "" ?>>4 Osobe</option>
                    <option value="5" <?= $broj_gostiju == "5" ? "selected" : "" ?>>4+ Osoba</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="apartman" class="form-label">Apartman</label>
                <select name="apartman" class="form-control" id="apartman" required>
                    <option value="" disabled <?= $apartman == "" ? "selected" : "" ?>>Izaberite apartman</option>
                    <option value="Mali Apartman" <?= $apartman == "Mali Apartman" ? "selected" : "" ?>>Mali Apartman</option>
                    <option value="Veliki Apartman" <?= $apartman == "Veliki Apartman" ? "selected" : "" ?>>Veliki Apartman</option>
                    <option value="Deluxe Apartman" <?= $apartman == "Deluxe Apartman" ? "selected" : "" ?>>Deluxe Apartman</option>
                    <option value="Porodični Apartman" <?= $apartman == "Porodični Apartman" ? "selected" : "" ?>>Porodični Apartman</option>
                </select>
            </div>

            <div class="d-grid mb-2">
                <button type="submit" class="btn btn-custom">Rezerviraj</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
