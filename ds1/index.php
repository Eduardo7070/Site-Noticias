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
    :root{
    --red:#d63a25;
    --white:#fff;
    --dark:#1e1c2a;
}
body{
    color: var(--dark);
    background: var(--white);
}

.home{
    width: 100%;
    height: 30vh;
    padding: 0px 10%;
    margin-top: 20%;
   
}
.home-text{
    max-width: 30rem;
    margin-bottom: 100%;
}
.home-text .text-h4{
    font-size: 1.5rem;
    color: var(--red);
   
    
}
.home-text .text-h1{
    font-size: 4rem;
    line-height: 4rem;
}
.home-btn{
    padding: 15px 45px;
    background: var(--red);
    color: var(--white);
    border-radius: 10px;
    font-weight: 700;
    transition: all 0.5s;
}
.home-btn:hover{
    background: #fc4c35;
}
.home-img img{
    width: 100%;
}
@media (max-width:785px) {
    .navigation{
        padding: 18px 20px;
    }
    .menu{
        display: block;
    }
    .menu.ativo .bar:nth-child(1){
        transform:  translateY(8px) rotate(45deg);
    }
    .menu.ativo .bar:nth-child(2) {
        opacity: 0;
    }
    .menu.ativo .bar:nth-child(3){
        transform: translateY(-8px) rotate(-45deg);
    }
    .nav-menu{
        position: fixed;
        right: -100%;
        top: 70px;
        width: 100%;
        height: 100%;
        flex-direction: column;
        background: var(--white);
        gap: -10px;
        transition: 0.3s;
    }
    .nav-menu.ativo{
        right: 0;
    }
    .nav-item{
        margin: 16px 0;
    }
    /*main*/
    .home{
        padding: 100px 2%;
        flex-direction: column;
        text-align: center;
        overflow: hidden;
        gap: 5rem;
    }
    .home .text-h4{
        font-size: 15px;
    }
    .home .text-h1{
        font-size: 2.5rem;
        line-height: 3rem;
    }
    .home p{
        font-size: 15px;
    }
    .home-img{
        width: 125%;
        
    }
           .carousel-container{
        margin-top: 11%;
        width: 280%;
        /* 1880px */
        height: 500;
       }
       .container{
        margin-right: 50%;
       }

       p{
        font-size:10pt;
       }

       .card-dam{
        width: 150%;
        height:40%;
       }
 
}

</style>

</head>
<body>
<div class="container">   
<main>
<section class="home" style="display: flex; align-items: center;">
    <div class="home-text">
        <h4 class="text-h4">Bem vindo a Pigeons</h4>
        <h1 class="text-h1">O Melhor site de notícias de Ds</h1>
        <p>Site feito com intuito educativo para a aula de PW-2</p>
        <br>
        <a href="home.php" class="home-btn">Comece a Acessar</a>
    </div>
    <div class="home-img">
        <img src="img/conteudo_home.png" alt="ds">
    </div>
</section>
    </main>
<br><br><br>
<br><br><br>
     
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
        $news2 = $pdo->prepare("SELECT * FROM tbnoticias WHERE  idNoticias = 1");
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
    </div>
</div>
    <script src="js/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>