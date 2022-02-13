<?php
include "pripojeniDB.php";
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
    <br />
    <div class="container">
        <div class="row g-3">

        <!-- HTML formulář pro vyplnění údajů, které se později uloží do databáze -->
            <form action="" method="POST">
                <div class="mb-3 col-sm-4">
                    <label class="form-label">Jméno</label>
                    <input type="text" class="form-control" name="jmeno">
                </div>
                <div class="mb-3 col-sm-4">
                    <label class="form-label">Příjmení</label>
                    <input type="text" class="form-control" name="prijmeni">
                </div>
                <div class="mb-3 col-sm-4">
                    <label class="form-label">Telefonní číslo</label>
                    <input type="text" class="form-control" name="telefon">
                </div>
                <div class="mb-3 col-sm-4">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="mb-3 col-sm-4">
                    <label class="form-label">Dlouhá poznámka</label>
                    <textarea class="form-control" rows="4" name="poznamka"></textarea>
                </div>
                <button type="submit" class="btn btn-info" name="pridat">Přidat</button>
            </form>

        </div>
    </div>
</body>

</html>


<?php
// Načtení jednotlivých prvků z formuláře do proměnných
if (isset($_POST['pridat'])) {
    $jmeno = addslashes($_POST['jmeno']);
    $prijmeni = addslashes($_POST['prijmeni']);
    $telefon = addslashes($_POST['telefon']);
    $email = addslashes($_POST['email']);
    $poznamka = addslashes($_POST['poznamka']);

    // Vxtvoření SQL dotazu pro vložení dat do databázové tabulky
    $vlozeniKontaktu = "INSERT INTO kontakty(id,jmeno,prijmeni,telefonniCislo,email,poznamka)
         VALUES ('','$jmeno','$prijmeni','$telefon','$email','$poznamka')";

    // Spuštění SQL dotazu
    if (mysqli_query($spojeni, $vlozeniKontaktu)) {
        echo "<div class='text-success'>Vložení proběhlo úspěšně</div>";
        header("Refresh:2");
    } else {
        echo mysqli_error($spojeni);
    }
}
?>