<?php
include("head.php");
include("header.php");

?>

<!-- Mashead header-->

<header class="masthead">
   
    <div id="carouselExampleAutoplaying" class="carousel slide alignfull" data-bs-ride="carousel">
        <div class="blkOverlay" style="z-index: 3; background-color: #423727b5; height: 100%;"></div>
        <div id="carouselTitlebox">
            <h1>LA PORTA DEL MEDITERRANEO</h1>
            <h5>PROGETTO
                LA PORTA DEL MEDITERRANEO Reggio Calabria, un’esperienza straordinaria tra mito e meraviglia PROMOZIONE TURISTICA DI REGGIO CALABRIA</h5>
            <p>
                Incontri B2B rivolti agli operatori del settore Matching tra la filiera turistica locale e tour operator internazionali
            </p>
        </div>
        

        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="4000">
                <img class="d-block w-100" src="assets/img/REGGIOCALABRIA3.jpg" alt="vittorioEmanuele iii reggio calabrias">
            </div>
        </div>
    </div>

</header>

<main id="sellerContainer" class="container">

    
    <button id="iscrivitibut" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Iscriviti come Seller
    </button>
    <br>
    <div class="infoBox d-flex flex-column justify-content-start align-items-center">
        <h5>Vuoi maggiori informazioni?</h5>
        <a class="text-success" href="mailto:info@primacom.cloud">Scrivici un'e-mail</a>
    </div> 


    <?php 
        /* per inserimento nel db */
        $nomeOrg = "";
        $partecipante = "";
        $ruolo = "";
        $secondoPartecipante = "";
        $indirizzo = "";
        $telefono = "";
        $sito = "";
        $tipoOrg = "";
        $struttRicett = "";
        $tipOfferta = "";
        $tipClientela = "";
        
        if(isset($_POST['nomeOrg'])) {$nomeOrg = $_POST['nomeOrg'];}
        if(isset($_POST['partecipante'])) {$partecipante = $_POST['partecipante'];}
        if(isset($_POST['ruolo'])) {$ruolo = $_POST['ruolo'];}
        
        if(isset($_POST['secondoPartecipante'])) {$secondoPartecipante = $_POST['secondoPartecipante'];}
        if(isset($_POST['indirizzo'])) {$indirizzo = $_POST['indirizzo'];}
        if(isset($_POST['telefono'])) {$telefono = $_POST['telefono'];}
        if(isset($_POST['sito'])) {$sito = $_POST['sito'];}
        if(isset($_POST['tipoOrg'])) {$tipoOrg = $_POST['tipoOrg'];}
        if(isset($_POST['struttRicett'])) {$struttRicett = $_POST['struttRicett'];}
        if(isset($_POST['tipOfferta'])) {$tipOfferta = $_POST['tipOfferta'];}
        if(isset($_POST['tipClientela'])) {$tipClientela = $_POST['tipClientela'];}

        //nel db la  tabella per il link si chiamav videoLink _> per ora non la modifico
        $sql = "INSERT INTO sellers (nomeOrg, partecipante, ruolo, secondoPartecipante, indirizzo, telefono, sito, tipoOrg, struttRicett, tipOfferta,tipClientela) 
        VALUE ('$nomeOrg', '$partecipante', '$ruolo', '$secondoPartecipante ','$indirizzo ','$telefono','$sito','$tipoOrg','$struttRicett','$tipOfferta','$tipClientela');"; 
        
    ?>



    <!-- Modal -->
    <div class="modal fade modal-lg" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Iscrizione Seller</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            <form action="index.php" method="post">
                <div id="sellersInput" class="modal-body">
                        
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nomeOrg" name="nomeOrg" placeholder="Primacom srl" required>
                        <label for="nomeOrg">Nome Organizzazione</label>
                    </div>

                    <div class="form-floating">
                        <input type="text" class="form-control" id="partecipante" name="partecipante" placeholder="" required>
                        <label for="partecipante">Partecipante (Nome e Cognome)</label>
                    </div>

                    <div class="form-floating">
                        <input type="text" class="form-control" id="ruolo" name="ruolo" placeholder="" required>
                        <label for="ruolo">Ruolo nell'organizzazione</label>
                    </div>
                    <!--  -->
                    <div class="form-floating">
                        <input type="text" class="form-control" id="secondoPartecipante" name="secondoPartecipante" placeholder="">
                        <label for="secondoPartecipante">Eventuale Secondo Partecipante</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="indirizzo" name="indirizzo" placeholder="" required>
                        <label for="indirizzo">Indirizzo (Via, numero civico, CAP, Località, Provincia)</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="" required>
                        <label for="telefono">Telefono</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="sito" name="sito" placeholder="">
                        <label for="sito">Sito Internet</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="tipoOrg" name="tipoOrg" placeholder="" required>
                        <label for="tipoOrg">Tipologia Organizzazione (es.Tour operator; Albergo ecc.)</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="struttRicett" name="struttRicett" placeholder="" required>
                        <label for="struttRicett">Strutture ricettive proposte (es.Hotel 4*; Residence; B&B ...)</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="tipOfferta" name="tipOfferta" placeholder="">
                        <label for="tipOfferta">Tipologia di offerta (es. Settimane Bianche; Eventi sportivi ecc ...)</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="tipClientela" name="tipClientela" placeholder="" required>
                        <label for="tipClientela">Tipologia di clientela prevalente (es. Famiglie; Individuali; Gruppi ecc ...)</label>
                    </div>
                    <br>
                    
                    <div class="form-floating">
                        <h6>GDPR Agreement</h6>
                        <label for="tipClientela"> </label>
                        <input type="checkbox"  id="GDPR" required>  Dichiaro di aver preso visione alla informativa sulla Privacy e acconsento al Trattamento dei Dati - <a href="">Leggi INFORMATIVA PRIVACY</a></input>
                    </div>
                    
                </div>
                
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annulla</button>
                    <button type="submit" class="btn btn-success">Iscriviti</button>
                </div>

            </form>
        </div>
    </div>
    </div>



    <div class="divInserMex"><?php
        /* PARTE RELATIVA AL BACKEND PER L'INSERIMENTO DEL partecipante NEL DATABASE (vedi su) */
        if($_SERVER['REQUEST_METHOD'] === "POST") {
            if($db->query($sql) === true) {
                echo "Registrazione effettuata correttamente";
                ?>
                    <script>
                        let tID = setTimeout(function() {
                            window.location.href = "index.php"
                            window.clearTimeout(tID)
                        },3000)
                    </script>
                    <?php
            }else {
                echo "Errore di connessione" . $db->error;
            }
        }
    ?></div>
    
</main>



<?php
include("footer.php");
?>