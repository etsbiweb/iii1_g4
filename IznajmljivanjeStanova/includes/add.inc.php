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