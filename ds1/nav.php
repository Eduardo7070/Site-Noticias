<!DOCTYPE html>


<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="css/style.css" rel="stylesheet">
  <title>Pigeons</title>
    <link rel="shortcut icon" href="img/pingeons.PNG" type="image/x-icon">

    <style>
        .navigation {
            height: 12%;
    position: absolute; /* Add this line to make it fixed */
    top: 0;
    left: 0;
    right: 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 18px 40px;
    box-shadow: 0 0.1rem 0.5rem #ccc;
    width: 100%;
    background: var(--white);
    transition: all 0.5s;
    z-index: 999; /* Add this line to control the stacking order */
}
.navigation .logo{
    color: var(--red);
    font-size: 1.7rem;
    font-weight: 600;
}
.logo span{
    color: var(--dark);
}
.navigation ul{
    display: flex;
    align-items: center;
    gap: 5rem;
}
.navigation ul li a{
    color: var(--dark);
    font-size: 17px;
    font-weight: 500;
    transition: all 0.5s;
}
.navigation ul li a:hover{
    color: var(--red);
    border-radius: 15%;
    font-size: 18pt;
    text-decoration: none;
    text-transform: none;
    transition: 0.3s;
}
.navigation i{
    cursor: pointer;
    font-size: 1.5rem;
}
.menu{
    cursor: pointer;
    display: none;
}
.menu .bar{
    display: block;
    width: 28px;
    height: 3px;
    border-radius: 3px;
    background: var(--dark);
    transition: all 0.3s;
}
.menu .bar:nth-child(1),
.menu .bar:nth-child(3){
    background: var(--red);
}

    </style>
</head>
<body>
<header>
        <nav class="navigation">
            <a href="#" class="logo"><img src="img/logo_preta.png" height="100px"></a>
            <ul class="nav-menu">
                <li class="nav-item"><a href="index.php">Home</a></li>
                <li class="nav-item"><a href="contato.php">Contato</a></li>
                <li class="nav-item"><a href="login.php">Admin</a></li>
                <li class="nav-item"><a href="https://www.google.com/">Sair</a></li>
                <i class='bx bx-search'></i>
            </ul>
            <div class="menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header>
</body>
</html>

