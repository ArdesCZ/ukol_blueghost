<?php

// Připojení do databáze
$db_server = 'localhost'; // Databáze je uložena na localhostu
$db_login = 'duch'; // Jméno uživatele oprávněný pracovat s databází 
$db_password = '123'; // Heslo daného uživatele (ano jedná se jen o číslo 123, přišlo mi zbytečné heslo hashovat pro tento úkol)
$db_name = 'blueghost'; // Název databáze

// Dotaz pro připojení do DB
$spojeni = mysqli_connect($db_server, $db_login, $db_password);
mysqli_select_db($spojeni, $db_name)or die('<p style="color: red">Nastala chyba v pripojeni k databazi' . mysqli_connect_error());
mysqli_query($spojeni, "SET CHARACTER SET utf8");

?>