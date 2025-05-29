<?php include './db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>SB Admin - Tabele</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
    <!-- Navbar -->
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="index.html">Admin Panel</a>
    </nav>

    <div id="layoutSidenav">
        <!-- Sidebar -->
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="index.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="tables.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tabele (Baza)
                        </a>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Sadržaj -->
        <div id="layoutSidenav_content">
            <main class="container-fluid px-4">
                <h1 class="mt-4">Pregled Podataka</h1>

                <!-- Korisnici -->
                <div class="card mb-4 mt-4">
                    <div class="card-header">
                        <i class="fas fa-users me-1"></i>
                        Lista korisnika
                    </div>
                    <div class="card-body">
                        <?php
                        $users = $pdo->query("SELECT * FROM users");
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
                                <?php while ($row = $users->fetch()): ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['full_name'] ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td><?= $row['created_at'] ?></td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Rezervacije -->
                <div class="card mb-4 mt-4">
                    <div class="card-header">
                        <i class="fas fa-calendar-alt me-1"></i>
                        Lista rezervacija
                    </div>
                    <div class="card-body">
                        <?php
                        $rez = $pdo->query("SELECT r.*, u.full_name FROM rezervacije r JOIN users u ON r.id_usera = u.id");
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
                                <?php while ($r = $rez->fetch()): ?>
                                <tr>
                                    <td><?= $r['id'] ?></td>
                                    <td><?= $r['apartman'] ?></td>
                                    <td><?= $r['full_name'] ?></td>
                                    <td><?= $r['broj_gostiju'] ?></td>
                                    <td><?= $r['checkin'] ?></td>
                                    <td><?= $r['checkout'] ?></td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </main>

            <!-- Footer -->
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4 text-center">
                    <div class="small">© <?= date('Y') ?> Tvoj Admin Panel</div>
                </div>
            </footer>
        </div>
    </div>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>
