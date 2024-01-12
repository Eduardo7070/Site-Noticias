<?php
include("nav.php");
echo "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pigeons</title>
    <!-- Adicione Bootstrap CSS -->
    
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
       .carousel-container{
        margin-top: 11%;
        width: 140%;
        /* 1880px */
        height: 500;
       }
       .container{
        margin-right: 100%;
       }

       p{
        font-size:10pt;
       }

       .card-dam{
        width: 150%;
        height:40%;
       }
    </style>
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
</head>
<body>
<?php include("nav.php"); ?>
    <div class="container">    
        <div class="carousel-container">
        <div class="mt-4">
            <div id="carouselExample" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/imagem1.png" class="w-100" alt="Image 1">
                    </div>
                    <div class="carousel-item">
                        <img src="img/imagem2.png" class="w-100" alt="Image 2">
                    </div>
                    <div class="carousel-item">
                        <img src="img/imagem3.png" class="w-100" alt="Image 3">
                    </div>
                    <!-- Adicione mais slides conforme necessário -->
                </div>
                <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <br><br><br>
    <div class="row">
        <?php
        include('admin/conexao.php');
        $news = $pdo->prepare("SELECT * FROM tbnoticias");
        $news->execute();
        echo '<div class="col"';
        echo '<div class="col-md-6">';
        while ($row = $news->fetch(PDO::FETCH_BOTH)) {
            echo '<br>';
            echo '<div class="card">';
            echo '<div class="row no-gutters">';
            echo '<div class="col-md-4">';
            echo '<img src="img/' . $row[3] . '" class="card-img" alt="Image 1">';
            echo '</div>';
            echo '<div class="col-md-8">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $row[1] . '</h5>';
            echo '<p class="card-text">' . $row[2] . '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            
        }
        echo '</div>';
        echo '<div class="col-6"';
        echo '<div class="col-md-8">';
        $news2 = $pdo->prepare("SELECT * FROM tbnoticias WHERE  idNoticias = 23");
        $news2 ->execute();
        while ($row = $news2->fetch(PDO::FETCH_BOTH)) {
            
                echo '<div class="card-dam">';
                    echo '<img style="border-radius:5%" src="img/' . $row[3] . '" class="card-img-top" alt="Image 1">';
                    echo '<div class="card-body">';
                        echo '<h4 class="card-title">' . $row[1] . '</h4>';
                        echo '<p class="card-text">' . $row[2] . '</p>';
                    echo '</div>';
                echo '</div>';
            
        }
        echo '</div>';
        echo '</div>';
        ?>
        <div class="col-6">
            <div>
                
            </div>
        </div>

<div class="card text-bg-dark">
  <img src="..." class="card-img" alt="...">
  <div class="card-img-overlay">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    <p class="card-text"><small>Last updated 3 mins ago</small></p>
  </div>
</div>
    </div>
</div>
<br><br>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
