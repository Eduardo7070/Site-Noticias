<?php
include("./conexao.php");
    $id = $_POST['txId'];
    $nome = $_POST['txNomeImg'];
    $desc = $_POST['txDescImg'];

    if(isset($_FILES["arqimage"])){
		$arqINome = $_FILES["arqimage"]["name"];
		$arqITipo = $_FILES["arqimage"]["type"];
		$arqITamanho = $_FILES["arqimage"]["size"];
		$arqINomeTemp = $_FILES["arqimage"]["tmp_name"];
		$erroImgMarc = $_FILES["arqimage"]["error"];
		
		if($erroImgMarc==0){			
			if(is_uploaded_file($arqINomeTemp)){
				if(move_uploaded_file($arqINomeTemp,"../img/". $arqINome)){																														
					$caminhoI = $arqINome;
					
				}
				else{
					$erro = "Falha ao mover imagem do marcador";
                    echo "$erro";
				}
			}
			else{
				$erro = "Erro no envio: A imagem do marcador não foi recebida com sucesso.";
                echo "$erro";
			}
		}
		else{
			$erro = "Erro no envio: " . $erro;			
            echo "$erro";
		}						
	}	
	else{
		$erro = "Imagem do Marcador enviado não encontrado";
        echo "$erro";
	}

    

    if ($id != null) {
		$alter = $pdo->prepare("
			UPDATE tbnoticias SET
			nomeNoticia='$nome',
			descNoticia='$desc',
			urlImagem='$caminhoI' 
			WHERE idNoticias='$id'
		"
		);
		$alter ->execute();
	}else{
		$insert = $pdo->prepare("insert into tbnoticias values(null,'$nome','$desc','$caminhoI')");	
		$insert ->execute();
	}

    

    header('location:../alterar.php');


?>