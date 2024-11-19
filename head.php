<?php
// Attiva la visualizzazione degli errori (opzionale per debugging)
// error_reporting(E_ALL);
// ini_set('display_errors', 1); 

// Includi il file per la connessione al database
include("database.php");

// Disattiva la cache della pagina
header("Cache-Control: no-cache, no-store, must-revalidate"); // Per HTTP 1.1
header("Pragma: no-cache"); // Per HTTP 1.0
header("Expires: 0"); // Per browser che non supportano Cache-Control

// Gestione del logout
if (isset($_GET['logout'])) {
    // Elimina il cookie impostandolo con una scadenza retroattiva
    setcookie("amministratore", "", time() - 3600, "/");
    
    // Rimuove il parametro "logout" dall'URL e ricarica la pagina
    header("Location: " . strtok($_SERVER["REQUEST_URI"], '?') . '?nocache=' . time());
    exit();
}

 
?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="Gianpiero Ferraro" content="sito web LA PORTA DEL MEDITERRANEO" />
        <meta name="description" content='“LA PORTA DEL MEDITERRANEO
        PROGETTO LA PORTA DEL MEDITERRANEO Reggio Calabria, un’esperienza straordinaria tra mito e meraviglia PROMOZIONE TURISTICA DI REGGIO CALABRIA
        Incontri B2B rivolti agli operatori del settore Matching tra la filiera turistica locale e tour operator internazionali'>
        <meta name="keywords" content="LA PORTA DEL MEDITERRANEO,
            PROGETTO LA PORTA DEL MEDITERRANEO Reggio Calabria, tra mito e meraviglia, PROMOZIONE TURISTICA DI REGGIO CALABRIA,
            Incontri B2B rivolti agli operatori del settore Matching, filiera turistica locale e tour operator internazionali">
        <meta name="robots" content="index, recepies"> 
        <link rel="canonical" href="URL della tua pagina">

        <!-- Open Graph (per Facebook, LinkedIn e altre piattaforme social) -->
        <meta property="og:title" content="LA PORTA DEL MEDITERRANEO">
        <meta property="og:description" content="PROGETTO LA PORTA DEL MEDITERRANEO Reggio Calabria">
        <!-- <meta property="og:image" content="URL dell'immagine di anteprima"> -->
        <!-- <meta property="og:url" content="https://www.highwellness-southitaly.it/"> -->
        <meta property="og:type" content="website"> <!-- Può essere "article", "video", ecc. -->

   

        <title>LA PORTA DEL MEDITERRANEO</title>
        <link rel="icon" type="image/png" href="./assets/primacom.png?v=1" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->

        <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/stile.css" rel="stylesheet" />
    </head>
    <body id="page-top" >

     