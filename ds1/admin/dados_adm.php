<?php

    $email = $_POST['txEmail'];
    $pass = $_POST['txSenha'];

    //echo $nome . " " . $email . " " . $assunto .  " " . $mensagem;

    include("conexao.php");

    $stmt = $pdo->prepare("insert into tbadm values(null, '$email','$pass')");	
    $stmt ->execute();

    header('location:../admin/consulta_adm.php');

?>