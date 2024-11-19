<!-- Navigation-->

<?php

$cookieAmm = "";
$dbUsers = $db->query("SELECT * FROM utenti");
$dbUser = [];

if(isset($_COOKIE["amministratore"])) {

  $cookieAmm = $_COOKIE["amministratore"];
  //prendo il contenuto della tabella utenti
  $dbUser = $dbUsers->fetch_assoc(); 
}

?>


<nav class="navbar">
  <div class="container-fluid mx-4">
    <a class="navbar-brand d-flex gap-3 align-item-center text-white" href="./">
      <img src="./assets/img/calbria-straordinaria.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
      <img src="./assets/img/piano-azione-coesione.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">

    </a>
    <div id="logout">
      <?php
      if (isset($_COOKIE["amministratore"])) {
      ?>
          <a href="./?logout=true"><button class="rounded text-danger border-0">Log out</button></a>
          <a href="./listasellers.php"><button class="rounded text-success border-0">Lista iscritti</button></a>
      <?php
      }else {     
      ?>
        <a stile="width: fit-content;" href="./login.php"><button class="rounded text-success border-0">Amministrazione</button></a>
      <?php
      }
      ?>
    </div>
  </div>
</nav>

