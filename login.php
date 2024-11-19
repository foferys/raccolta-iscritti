<?php
include("database.php");



$email = "";
$password = "";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
    }

    // Convalida l'indirizzo email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Utilizza password_verify per verificare la password
        $query = "SELECT id, password FROM utenti WHERE email=?";
        $stmt = mysqli_prepare($db, $query);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $userID, $hashedPassword);
        mysqli_stmt_fetch($stmt);

        if (password_verify($password, $hashedPassword)) {
            if ($stmt) {
                mysqli_stmt_close($stmt);
            }

            // Genera un token sicuro
            $token = bin2hex(random_bytes(32)); 

            // Memorizza il token nel database
            $updateQuery = "UPDATE utenti SET token=? WHERE id=?";
            $updateStmt = mysqli_prepare($db, $updateQuery);
            mysqli_stmt_bind_param($updateStmt, "si", $token, $userID);
            mysqli_stmt_execute($updateStmt);

            // Verifica se l'aggiornamento ha avuto successo
            if (mysqli_stmt_affected_rows($updateStmt) > 0) {
                // Imposta il cookie
                setcookie("amministratore", $token, time() + 60 * 60 * 24 * 30, "/");

                // Aggiungi intestazioni per evitare la cache
                header("Cache-Control: no-cache, no-store, must-revalidate"); // Per HTTP 1.1
                header("Pragma: no-cache"); // Per HTTP 1.0
                header("Expires: 0"); // Per i browser che non supportano Cache-Control

                // Reindirizza alla home con un parametro di cache-busting
                header("Location: ./?cb=" . time());
                exit();
            } else {
                echo "Errore nell'aggiornamento del token";
            }

            mysqli_stmt_close($updateStmt);
        } else {
            $userFail = "Utente non riconosciuto";
        }
    } else {
        $userFail = "Indirizzo email non valido";
    }
}

/* bisogna includere dopo questi per evitare di generare errori che non farebbero settare il cookie */
include("head.php");
include("header.php");
?>
<div class="cont">
    <div class="containForm log_in">
        <div class="form login">
            <?php


            ?>
            <span class="title">Login</span>
            <form id="reg_form" action="login.php" method="POST">
                <div class="input-field">
                    <input name="email" type="text" placeholder="Inserisci la tua email" required>
                    <i class="uil uil-envelope"></i>
                </div>
                <div class="input-field">
                    <input name="password" class="password" type="password" placeholder="Inserisci la tua password" required>
                    <i class="uil uil-lock icon"></i>
                    <i class="uil uil-eye-slash showHidePw"></i>
                </div>

                <div class="checkbox_text">
                    <div class="checkbox_content">
                        <input type="checkbox" id="log_check">
                        <label for="log_check" class="text">Ricorda</label>
                    </div>

                    <a href="#" class="text">Pasword dimenticata?</a>
                </div>


                <div class="input-field button">
                    <input type="submit" value="Accedi">
                </div>
            </form>

            <span class="form_succes">
                <?php
                if (!isset($loginConf)) {
                    echo "";
                } else {
                    echo $loginConf;
                }

                if (!isset($userFail)) {
                    echo "";
                } else {
                    ?><span style='color: red;'><?php echo $userFail; ?></span><?php
                }?>
            </span>

           


        </div>
    </div>
</div>