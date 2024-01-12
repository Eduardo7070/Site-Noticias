
<?php
include("nav.php");
echo "<br/><br/><br/><br/><br/><br/><br/>";
?>
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
       
        /* Style the file input to match other input elements */
        .textFile {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 3px;
            border: 1px solid #ccc;
            color: #000; /* Set the text color to match your design */
        }

        /* Style the file input container */
        .textFile label {
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: 350;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            cursor: pointer;
            background-color: #337ab7; /* Adjust the background color to match your design */
            border: 1px solid #2e6da4; /* Adjust the border color as needed */
            color: #fff; /* Text color */
            border-radius: 4px;
        }

        /* Style the label on hover */
        .textFile label:hover {
            background-color: #286090; /* Adjust the hover background color as needed */
            border-color: #204d74; /* Adjust the hover border color as needed */
        }

        /* Style the label when a file is chosen */
        .textFile input[type="file"]:not(:disabled):not([readonly]) ~ label {
            background-color: #337ab7; /* Adjust the background color for the selected state */
            border-color: #2e6da4; /* Adjust the border color for the selected state */
        }


</style>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pigeons</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<br><br><br>

<div class="container">
<p id="consulta">CONSULTA</p>

   
    <?php
        include("admin/noticias-admin.php");
    ?>
</div>     
</body>
</html>