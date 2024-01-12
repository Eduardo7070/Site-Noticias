
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
            margin-top: -46%;
        }



    </style>
</head>
<body>
<div>



<div class="consulta">
    <div style="text-align: center; margin-top: -1%;">
        <form action="alterar.php" method="post">
            <input type="hidden" name="current_order" value="<?php echo isset($order) ? $order : 'asc'; ?>">
            <button  class="my-button2" type="submit" value="desc" name="order">Decrescente</button>
            <button class="my-button2" type="submit" value="asc" name="order">Crescenteㅤ</button>
            <br>
        </form>
        <form action="./consultas.php" method="post"> 
            <button class="my-button2" type="submit" value="asc" name="order"> ㅤClientesㅤ </button>
        </form>
    </div>


    
<br>
<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Url</th>      
            <th>Deletar</th>
             <th>Alterar</th>
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

        $stmt = $pdo->prepare("SELECT * FROM tbnoticias");
        $stmt->execute();
        
        $texto = 'ALTERAR';



        while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
            echo "<tr>";
            echo "<td>" . $row[1] . "</td>";
            echo "<td>" . $row[2] . "</td>";
            echo "<td>" . $row[3] . "</td>";
            echo "<td><form action='alterar.php' method='post'><button class='my-button' name='delete' value='" . $row[0] . "'>Deletar</button></form></td>";
            echo "<td><a class='my-button' href='alterar.php?id={$row['idNoticias']}&nome={$row[1]}&desc={$row[2]}&url={$row[3] }&idTx={$texto}'> Alterar </a></td>";
            echo "</tr>";
        } 
     
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['delete'])) {
                $idDelete = $_POST['delete'];
                $dele = $pdo->prepare("DELETE FROM tbnoticias WHERE idNoticias = :idDelete");
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
        <form action="admin/dados-noticias.php" enctype="multipart/form-data" method="post">
            <div>
                <input type="hidden" name="txId" placeholder="idNotica" value="<?php echo @$_GET['id']; ?>" />
            </div>

            <div>
                <input type="text" name="txNomeImg" placeholder="Nome" value="<?php echo @$_GET['nome']; ?>" />
            </div>

            <div>
                <input type="text" name="txDescImg" placeholder="Descrição" value="<?php echo @$_GET['desc']; ?>" />
            </div>

            <div >
                <input class="textFile" type="file" name="arqimage" placeholder="Url" <?php if (@$_GET['idTx'] == 'ALTERAR') { echo 'value="' . @$_GET['url'] . '"'; } ?> />
                
            </div>

            <br>

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