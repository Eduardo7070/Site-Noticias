<?php

    $id = $_POST['txId'];
    $nome = $_POST['txNome'];
    $email = $_POST['txEmail'];
    $assunto = $_POST['txAssunto'];
    $mensagem = $_POST['txMensagem'];

    include("./conexao.php");

    if ($id != null) {
        $alter = $pdo->prepare("
            UPDATE tbcontato SET
            nome='$nome',
            email='$email',
            assunto='$assunto',
            mensagem='$mensagem'
            WHERE idContato='$id'
        "
        );
        $alter ->execute();
    }else{
        $stmt = $pdo->prepare("insert into tbContato values(null,'$nome','$email','$assunto','$mensagem','2023-06-06')");	
        $stmt ->execute();
    }

    

    header('location:../consultas.php');


?>