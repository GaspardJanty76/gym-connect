<?php
session_start();
if (isset($_SESSION['username'])) {
    include_once 'templates/header.php';
    echo '<link rel="stylesheet" href="css/message.css">';
    include_once 'templates/navbar.php';
    echo '<div class="title">Profil,</div>';
    echo '<a href="methodes/userUnAuth.php" class = "submit">Déconnexion</a>';
    include_once 'templates/footer.php';
}
else{
    header("Location: choixconnexion.php");
    exit();
}?>