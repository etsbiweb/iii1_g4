<?php
include 'db.php';
$stmt = $pdo->query("SELECT * FROM users");
?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Ime i Prezime</th>
            <th>Email</th>
            <th>Kreirano</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $stmt->fetch()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['full_name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['created_at'] ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
