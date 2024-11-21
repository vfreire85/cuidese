<?php
    $db_username = 'root';
    $db_password = '';
    $conn = new PDO( 'sqlite:host=localhost;dbname=cuideSe.db', $db_username, $db_password );
    if(!$conn){
        die("Erro fatal: conexão falhou!");
    }
?>
