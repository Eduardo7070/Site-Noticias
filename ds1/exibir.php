<?php
include("nav.php");
echo "<br/><br/><br/><br/><br/><br/><br/>";
?>
 
 <?php include("adm.php"); ?>
     
<style>

.consulta{
    width: 100%;
    height: 100vh;
    display: flex;
    align-items:flex-start;  
    padding: 0px 0%;
    margin-top: 7%;
}

body {
            font-family: Arial, sans-serif;
         
        }
        
        section {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        
        input[type="text"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 3px;
            border: 1px solid #ccc;
        }
        input[type="email"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 3px;
            border: 1px solid #ccc;
        }
        
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
        
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        #consulta{
            font-size: 5vh;
           
            text-align: center;
        }
        .section{
            margin-top: 5%;
        }
        #insert{
            font-size: 5vh;
           margin-top: 5%;
           text-align: center;
        }
</style>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<p id="insert">INSERT</p>
<section class="section">
    <form action="admin/dados.php" method="post">
        <div>
            <input type="text" name="txNome" placeholder="Nome" />
        </div>

        <div>
            <input type="email" name="txEmail" placeholder="E-mail" />
        </div>

        <div>
            <input type="text" name="txAssunto" placeholder="Assunto" />
        </div>

        <div>
            <input type="text" name="txMensagem" placeholder="Mensagem" />
        </div>

        <div>
            <input type="submit" value="Enviar" />
        </div>
    </form>
</section>
<br>
<hr style="margin-top: 5%;">

<p id="consulta">CONSULTA</p>
<div class="consulta">  
            <?php
                include("admin/contato-admin.php")
            ?>
    </div>      
</body>
</html>




