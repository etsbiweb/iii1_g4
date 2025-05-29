<?php
include 'db.php';
$stmt = $pdo->query("SELECT r.*, u.full_name FROM rezervacije r JOIN users u ON r.id_usera = u.id");
?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Apartman</th>
            <th>Gost</th>
            <th>Broj gostiju</th>
            <th>Check-in</th>
            <th>Check-out</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $stmt->fetch()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['apartman'] ?></td>
            <td><?= $row['full_name'] ?></td>
            <td><?= $row['broj_gostiju'] ?></td>
            <td><?= $row['checkin'] ?></td>
            <td><?= $row['checkout'] ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
