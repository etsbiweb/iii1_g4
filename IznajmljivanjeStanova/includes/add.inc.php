<?php
session_start();
include '../includes/dbh.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Dohvati podatke iz POST
    $checkin = $_POST['checkin'] ?? '';
    $checkout = $_POST['checkout'] ?? '';
    $broj_gostiju = $_POST['broj_gostiju'] ?? '';
    $apartman = $_POST['apartman'] ?? '';

    // Osnovna validacija (da polja nisu prazna)
    if (empty($checkin) || empty($checkout) || empty($broj_gostiju) || empty($apartman)) {
        echo "Molimo popunite sva polja.";
        exit;
    }

    // Validacija datuma (opcionalno, možeš dodatno proveriti ispravnost formata)
    if (!strtotime($checkin) || !strtotime($checkout)) {
        echo "Neispravan format datuma.";
        exit;
    }

    // Pripremi SQL za ubacivanje u tabelu 'rezervacije'
    $sql = "INSERT INTO rezervacije (checkin, checkout, broj_gostiju, apartman) VALUES (?, ?, ?, ?)";

    // Priprema statementa
    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Poveži parametre: 'ssii' - string, string, integer, integer
        mysqli_stmt_bind_param($stmt, "ssis", $checkin, $checkout, $broj_gostiju, $apartman);

        // Izvrši statement
        if (mysqli_stmt_execute($stmt)) {
        echo '
<style>
.popup-overlay {
    position: fixed;
    top: 0; left: 0; width: 100%; height: 100%;
    background: rgba(0,0,0,0.6);
    display: flex; justify-content: center; align-items: center;
    z-index: 9999;
}
.popup-content {
    background: white;
    padding: 30px 40px;
    border-radius: 10px;
    text-align: center;
    box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    max-width: 400px;
    font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    animation: popupShow 0.4s ease forwards;
}
@keyframes popupShow {
    from {opacity: 0; transform: scale(0.7);}
    to {opacity: 1; transform: scale(1);}
}
.popup-content h2 {
    color: #2e7d32;
    margin-bottom: 15px;
}
.popup-content button {
    background: #2e7d32;
    color: white;
    border: none;
    padding: 10px 25px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background 0.3s ease;
}
.popup-content button:hover {
    background: #27632a;
}
</style>

<div class="popup-overlay" id="popup">
    <div class="popup-content">
        <h2>Uspjeh!</h2>
        <p>Rezervacija je uspješno dodana!</p>
        <button onclick="closePopup()">OK</button>
    </div>
</div>

<script>
function closePopup() {
    const popup = document.getElementById("popup");
    popup.style.opacity = "0";
    popup.style.transform = "scale(0.7)";
    setTimeout(() => {
        popup.style.display = "none";
    }, 300);
}
</script>
';

               
      
      
        } else {
            echo "Greška prilikom unosa rezervacije: " . mysqli_error($conn);
        }

        // Zatvori statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Greška u pripremi upita: " . mysqli_error($conn);
    }

    // Zatvori konekciju (nije obavezno ako imaš dalju obradu)
    mysqli_close($conn);
} else {
    echo "Forma nije ispravno poslana.";
}
header("Location: ../sona-master/index1.php");
exit();
?>
