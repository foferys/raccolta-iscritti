<?php 
    include("head.php");
    include("header.php");

    $query = $db->query("SELECT * FROM sellers");
    // Verifica se l'utente è autenticato
    if (isset($dbUser) && !empty($dbUser) && isset($_COOKIE["amministratore"])) {
?>

        <div class="container" style="margin-top: 130px; min-height: 100lvh;">
            <h1>ELENCO SELLERS REGISTRATI</h1>
            <table class="table table-striped-columns">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome Organizzazione</th>
                        <th scope="col">Partecipante</th>
                        <th scope="col">Ruolo nell'organizzazione</th>
                        <th scope="col">Secondo partecipante</th>
                        <th scope="col">Indirizzo</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Sito Internet</th>
                        <th scope="col">Tipologia Organizzazione</th>
                        <th scope="col">Strutture Ricettive</th>
                        <th scope="col">Tipologia di offerta</th>
                        <th scope="col">Tipologia di clientela</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if ($query->num_rows > 0) {
                        while($row = mysqli_fetch_assoc($query)) {?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['nomeOrg']; ?></td>
                                <td><?php echo $row['partecipante']; ?></td>
                                <td><?php echo $row['ruolo']; ?></td>
                                <td><?php echo $row['secondoPartecipante']; ?></td>
                                <td><?php echo $row['indirizzo']; ?></td>
                                <td><a href="tel:<?php echo $row['telefono']; ?>"><?php echo $row['telefono']; ?></a> </td>
                                <td><a href="http://<?php echo $row['sito']; ?>" target="_blank"><?php echo $row['sito']; ?></a> </td>
                                <td><?php echo $row['tipoOrg']; ?></td>
                                <td><?php echo $row['struttRicett']; ?></td>
                                <td><?php echo $row['tipOfferta']; ?></td>
                                <td><?php echo $row['tipClientela']; ?></td>
                            </tr>
                        <?php
                        }
                    } else {
                        echo "Non ci sono righe da mostrare.";
                    }
                    ?>
                </tbody>
            </table>
        </div>      

<?php
    } else {
        echo "<div class='container' style='margin-top: 130px;'><h2>Accesso Negato. Effettua il <a href='./login.php'>login</a> per visualizzare la tabella.</h2></div>";
    }
?>

<?php 
    include("footer.php");
?>