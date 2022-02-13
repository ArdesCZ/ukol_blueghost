<?php
include "pripojeniDB.php";

// Smazání kontaktu z databáze podle vybraného idčka
if(isset($_GET['id'])) {
    // Získání idčka kontaktu z URL, funkce addslashes je zde kvůli bezpečnosti proti SQL injection
    $id = addslashes($_GET['id']);

    // Vytvoření dotazu na smazání kontaktu z databáze
    $smazaniKontaktu = "DELETE FROM kontakty WHERE id = $id";

    // Provedení dotazu
    if (mysqli_query($spojeni, $smazaniKontaktu)) {
        echo "<div style='color: green'>Smazání proběhlo úspěšně</div>";
        header("Refresh:2; url=../index.php");
    } else {
        echo mysqli_error($spojeni);
    }
}
?>