<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dobrodošli</title>
</head>
<body>
    <h2>Dobrodošao, <?php echo htmlspecialchars($_SESSION['full_name']); ?>!</h2>
    <p>Uspješno ste prijavljeni.</p>
    <a href="logout.php">Odjavi se</a>
</body>
</html>
