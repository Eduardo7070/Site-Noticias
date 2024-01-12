
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

        .my-button:hover {
            background-color: #999;
        }
    </style>
</head>
<body>

<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>        
            <th>Deletar </th>
        </tr>
    </thead>
    <tbody>
        <?php             
            include("conexao.php");
            $stmt = $pdo->prepare("SELECT * FROM tbadm");	
            $stmt->execute();
            
            while($row = $stmt->fetch(PDO::FETCH_BOTH)){       
                echo "<tr>";
                echo "<td>" . $row[1] . "</td>";
                echo "<td>" . $row[2] . "</td>";
                
                echo "<td><form action='consulta_adm.php' method='post' '><button class='my-button' name='delect' value='".$row[0]." '>Deletar</button></form></td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['delect'])) {
            $idDelete = $_POST['delect'];
            $dele = $pdo->prepare("DELETE FROM tbadm WHERE idAdm = :idDelete");
            $dele->bindValue(':idDelete', $idDelete, PDO::PARAM_INT);
            $dele->execute();       
        }	
    }
?>

<a href="../index.php">Voltar</a>
</body>
</html>