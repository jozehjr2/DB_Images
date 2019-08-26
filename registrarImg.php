<?php
include "connectDB.php";

//AÇÃO DO BOTÃO DE REGISTRAR IMAGEM
if(isset($_POST['btnSubmit'])){
    $tema = $_POST['tema'];
    $imagem = $_FILES['imagem']['tmp_name'];
    $tamanho = $_FILES['imagem']['size'];
    $tipo = $_FILES['imagem']['type'];
    $nome = $_FILES['imagem']['name'];
    
    
    if ( $imagem != "none" ){
        $fp = fopen($imagem, "rb");
        $conteudo = fread($fp, $tamanho);
        $conteudo = addslashes($conteudo);
        fclose($fp);
    
        $queryInsercao = "INSERT INTO image (tematica, imagem) VALUES ('$tema', '$conteudo')";
    
        mysqli_query($conn, $queryInsercao) or die(mysqli_error($conn));
        echo 'Registro inserido com sucesso!'; 
        header('Location: index.php');
        
        if(mysql_affected_rows($conn) > 0){
            print "A imagem foi salva na base de dados.";
        }else{
            print "Não foi possível salvar a imagem na base de dados.";
        }
    }
    else{
        print "Não foi possível carregar a imagem.";
    }
}

//AÇÃO DO BOTÃO ENVIAR (ATUALIZAR DADOS)
if(isset($_POST['btnEnviar'])){
    $id = $_POST['btnEnviar'];
    $newTema = $_POST['tema'];
    
    $queryUpdate = "UPDATE image SET tematica='".$newTema."' WHERE id_img=".$id;
    mysqli_query($conn, $queryUpdate) or die(mysqli_error($conn));
    
    header('Location: index.php');
    
    
}

//AÇÃO DO BOTÃO EXLCUIR
if(isset($_POST['btnExcluir'])){
    $id = $_POST['btnExcluir'];
    
    
    $queryDelete = "DELETE FROM image WHERE id_img=".$id;
    mysqli_query($conn, $queryDelete) or die(mysqli_error($conn));
    
    header('Location: index.php');
    
    
}



?>