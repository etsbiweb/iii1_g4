<?php
session_start();

$host = 'localhost:3306';
$user = 'root';
$pass = '';
$db = 'sona';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Greška u konekciji: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['lozinka'];

    // Provjera da li postoji korisnik s tim emailom
    $stmt = $conn->prepare("SELECT id, full_name, lozinka FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id, $full_name, $hashed_password);
        $stmt->fetch();

        // Provjera lozinke
        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['full_name'] = $full_name;
            header("Location: welcome.php");
            exit();
        } else {
            echo "Podaci nisu tačni.";
        }
    } else {
        echo "Podaci nisu tačni.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Forma nije poslana.";
}
?>
