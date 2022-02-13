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
    <div class="container">
        <div class="row">

            <!-- Bootstrap Modal obsahující formulář pro změnu údajů kontaktu -->
            <div class="modal fade" id="upravKontakt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><strong>Úprava kontaktu</strong></h5>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label>Jméno*</label>
                                    <input name="jmenoU" type="text" id="jmenoU" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Příjmení*</label>
                                    <input name="prijmeniU" type="text" id="prijmeniU" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Telefon*</label>
                                    <input name="telefonU" type="text" id="telefonU" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email*</label>
                                    <input name="emailU" type="text" id="emailU" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Dlouhá poznámka*</label>
                                    <textarea name="poznamkaU" class="form-control" rows="4"></textarea>
                                </div>

                                <div class="modal-footer">
                                    <button name="odeslatU" class="btn btn-primary">Upravit kontakt </button>
                                </div>
                            </form>
                            <br /> <b>*</b>Značí povinné pole!
                        </div>
                    </div>
                </div>
            </div>

            <!-- Obsah hodnot vybraného kontaktu se zobrazuje v HTML tabulce -->
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Jméno a příjmení</th>
                        <th scope="col">Telefon</th>
                        <th scope="col">Email</th>
                        <th scope="col">Dlouhá poznámka</th>
                        <th scope="col">Upravit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Výpis hodnot kontaktu podle idčka získaného z URL
                    if (isset($_GET['id'])) {
                        $id = addslashes($_GET['id']);
                        $vypisTabu = mysqli_query($spojeni, "select * from kontakty WHERE id = $id");
                        while ($row = mysqli_fetch_array($vypisTabu)) {
                    ?>
                            <tr id="<?php $row["id"] ?>">
                                <td><?php echo $row["id"] ?></td>
                                <td><?php echo $row["jmeno"] . " " . $row["prijmeni"] ?></td>
                                <td><?php echo $row["telefonniCislo"] ?></td>
                                <td><?php echo $row["email"] ?></td>
                                <td><?php echo $row["poznamka"] ?></td>
                                <td>
                                     <!-- Po stisknutí tlačítka dojde k zobrazení modalu s formulářem na úpravu kontaktu -->
                                    <button type="button" class="btn btn-info" data-bs-toggle="modal" 
                                        data-bs-target="#upravKontakt" data-id="<?php $id ?>" data-role="updateKontakt">Upravit</button>
                                <td>
                            </tr>
                    <?php
                        }
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
<?php
// Z modal formuláře ulož hodnoty do proměnných
if (isset($_POST['odeslatU'])) {
    $id = addslashes($_GET['id']);
    $jmeno = addslashes($_POST['jmenoU']);
    $prijmeni = addslashes($_POST['prijmeniU']);
    $telefon = addslashes($_POST['telefonU']);
    $email = addslashes($_POST['emailU']);
    $poznamka = addslashes($_POST['poznamkaU']);

    // Vytvoření dotazu pro úpravu údajů vybraného kontaktu, z dat modal formuláře
    $upravaKontaktu = "UPDATE kontakty SET jmeno = '$jmeno', prijmeni = '$prijmeni', telefonniCislo =  '$telefon', email =  '$email', poznamka = '$poznamka' WHERE id = '$id'";

    // Provedení dotazu
    if (mysqli_query($spojeni, $upravaKontaktu)) {
        echo "<div class='text-success'>Úprava proběhla úspěšně</div>";
    } else {
        echo mysqli_error($spojeni);
    }
}

?>