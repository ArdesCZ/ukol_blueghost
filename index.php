<?php
include "conf/pripojeniDB.php";
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Úkol pro modrého ducha</title>
    <link rel="icon" type="image/x-icon" href="conf/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <!-- Obsah z databáze se ukládá do HTML tabulky -->
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Jméno a příjmení</th>
                        <th scope="col">Telefon</th>
                        <th scope="col">Email</th>
                        <th scope="col">Dlouhá poznámka</th>
                        <th scope="col">Upravit</th>
                        <th scope="col">Smazat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Výpis všech údajů z databázové tabulky
                    $vypisTabu = mysqli_query($spojeni, "select * from kontakty");
                    while ($row = mysqli_fetch_array($vypisTabu)) {
                    ?>
                        <tr id="<?php $row["id"] ?>">
                            <td><?php echo $row["id"] ?></td>
                            <td><?php echo $row["jmeno"] . " " . $row["prijmeni"] ?></td>
                            <td><?php echo $row["telefonniCislo"] ?></td>
                            <td><?php echo $row["email"] ?></td>
                            <td><?php echo $row["poznamka"] ?></td>
                            <?php
                                // Po stisknutí tlačítka dojde k přesměrování na stránku, kde bude možné upravit kontakt, do URL se ukládá idčko coby jednoznačný identifikátor kontaktu
                                echo "<td><a class='btn btn-info'href='conf/upravaKontaktu.php?id=" . $row['id']. "'>Upravit</a></td>";
                                // Po stisknutí dojde k přesměrování na stránku, kde dojde ke smazání kontaktu, do URL se ukládá idčko coby jednoznačný identifikátor kontaktu
                                echo "<td><a class='btn btn-danger' href='conf/smazaniKontaktu.php?id=" . $row['id'] . "'>Smazat</a></td>";
                            ?>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>

        <!-- Tlačítko na přesměrování na stránky pro vytvoření nového kontaktu -->       
        <a class="btn btn-success" href="conf/vlozeniKontaktu.php">Přidat uživatele</a>
    </div>
</body>

</html>
