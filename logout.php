<?php 
    session_start();
    session_destroy();
    header("location: index.php");       
?>

<button class="dropbtn" onclick="window.location.href = 'login.php'">Fazer login</button>