
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .my-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #808080;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
        }
        .my-button2 {
            display: inline-block;
            padding: 10px 20px;
            background-color: #808080;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            margin-top: 8%;
        }

        .my-button2:hover {
            background-color: #999;
        }

        

        .consulta{
            width: 100%;
            height: 100vh;
            display: flex;
            align-items:flex-start;  
            padding: 0px 0%;
            margin-top: 2%;
            margin-bottom:10%
        }

        .formularioAlter {
            margin-top: -36%;
        }

    </style>
</head>
<body>
<div>



<div class="consulta">
    <div style="text-align: center; margin-top: -1%;">
        <form action="consultas.php" method="post">
            <input type="hidden" name="current_order" value="<?php echo isset($order) ? $order : 'asc'; ?>">
            <button  class="my-button2" type="submit" value="desc" name="order">Decrescente</button>
            <button class="my-button2" type="submit" value="asc" name="order">Crescenteㅤ</button>
            <br>
        </form>
        <form action="./alterar.php" method="post"> 
            <button class="my-button2" type="submit" value="asc" name="order"> ㅤNoticiasㅤ </button>
        </form>
        
    </div>


    
<br>
<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Assunto</th>
            <th>Mensagem</th>          
            <th>Deletar Mensagens</th>
        </tr>
    </thead>
    <tbody>
    <?php
        // Default order

        include("conexao.php");
        $order = 'asc'; // Default order

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order'])) {
            $order = $_POST['order'];
        }

        $stmt = $pdo->prepare("SELECT * FROM tbcontato ORDER BY nome $order");
        $stmt->execute();
        
        $texto = 'ALTERAR';

        while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
            echo "<tr>";
            echo "<td>" . $row[1] . "</td>";
            echo "<td>" . $row[2] . "</td>";
            echo "<td>" . $row[3] . "</td>";
            echo "<td>" . $row[4] . "</td>";
            echo "<td><form action='consultas.php' method='post'><button class='my-button' name='delete' value='" . $row[0] . "'>Deletar</button></form></td>";
            echo "<td><a class='my-button' href='consultas.php?id={$row['idContato']}&nome={$row[1]}&email={$row[2]}&assunto={$row[3]}&mensagem={$row[4]}&idTx={$texto}'> Alterar </a></td>";
            echo "</tr>";
        } 
     
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['delete'])) {
                $idDelete = $_POST['delete'];
                $dele = $pdo->prepare("DELETE FROM tbcontato WHERE idContato = :idDelete");
                $dele->bindValue(':idDelete', $idDelete, PDO::PARAM_INT);
                $dele->execute();
            }
        }
        ?>

        </tbody>
    </table>
</div>
<div class="formularioAlter" >
    <section>
        <form action="admin/dados-contato.php" method="post">
            <div>
                <input type="hidden" name="txId" placeholder="idContato" value="<?php echo @$_GET['id']; ?>" />
            </div>

            <div>
                <input type="text" name="txNome" placeholder="Nome" value="<?php echo @$_GET['nome']; ?>" />
            </div>

            <div>
                <input type="text" name="txEmail" placeholder="E-Mail" value="<?php echo @$_GET['email']; ?>" />
            </div>

            <div>
                <input type="text" name="txAssunto" placeholder="Assunto" value="<?php echo @$_GET['assunto']; ?>" />
            </div>

            <div>
                <input type="text" name="txMensagem" placeholder="Mensagem" value="<?php echo @$_GET['mensagem']; ?>" />
            </div>

            <div>
                <input type="submit" value="<?php
                
                $id = @$_GET['idTx'];

                if ($id == 'ALTERAR') {
                    echo 'ALTERAR';
                }else{
                    echo 'CRIAR';
                }
                    ?>" />
            </div>
        </form>
    </section>
</div>
</div>


</body>
</html>