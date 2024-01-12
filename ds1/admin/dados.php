<?php

    $nome = $_POST['txNome'];
    $email = $_POST['txEmail'];
    $assunto = $_POST['txAssunto'];
    $mensagem = $_POST['txMensagem'];

    //echo $nome . " " . $email . " " . $assunto .  " " . $mensagem;

    include("conexao.php");

    $stmt = $pdo->prepare("insert into tbContato values(null,'$nome','$email','$assunto','$mensagem','2023-06-06')");	
    $stmt ->execute();

    header('location:../contato.php');

?>