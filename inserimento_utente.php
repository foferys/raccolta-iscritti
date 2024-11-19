<?php
include("head.php");
include("header.php");




$email = "";
$password = "";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
    }

    // Crea una password crittografata utilizzando password_hash
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);



    // Controlla la connessione al database
    if ($db->connect_error) {
        die("Connessione al database fallita: " . $mysqli->connect_error);
    }

    // Esegui la query per inserire l'utente con la password crittografata
    $query = "INSERT INTO utenti (email, password) VALUES (?, ?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param("ss", $email, $hashedPassword);

    if ($stmt->execute()) {
        echo "Utente inserito con successo.";
    } else {
        echo "Errore durante l'inserimento dell'utente: " . $stmt->error;
    }

    // Chiudi la connessione al database
    $stmt->close();
    $mysqli->close();
}


?>



<div class="cont">
    <div class="containForm log_in">
        <div class="form login">
            <?php


            ?>
            <span class="title">Registrati</span>
            <form id="reg_form" action="inserimento_utente.php" method="POST">
                <div class="input-field">
                    <input name="email" type="text" placeholder="Inserisci la tua email" required>
                    <i class="uil uil-envelope"></i>
                </div>
                <div class="input-field">
                    <input name="password" class="password" type="password" placeholder="Inserisci la tua password" required>
                    <i class="uil uil-lock icon"></i>
                    <i class="uil uil-eye-slash showHidePw"></i>
                </div>

                <div class="input-field button">
                    <input type="submit" value="Registrati">
                </div>
            </form>

           
           


        </div>
    </div>
</div>