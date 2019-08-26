<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Image System - Banco de dados de imagens</title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        
        <script src="js/script.js"></script>
        
        <link rel="stylesheet" href="css/style.css">
        
    </head>
    <body>
        <div class="container">
            <h1>Banco de dados de Imagens</h1>
            <?php
            include "connectDB.php";
            
            ?>
            
            <form enctype="multipart/form-data" name="formCreateImages" method="POST" action="registrarImg.php">
                <table class="table">
                    <tbody> 
                        <tr>
                            <td>Temática: <input name="tema" type="text" class="form-control"></td>
                            <td>Imagem: <input name="imagem" type="file" class="form-control-file"></td>
                            <td><br/><button name="btnSubmit" value="register" type="submit" class="btn btn-primary">Registrar</button></td>
                        </tr>
                    </tbody>     
                </table>
            </form> 
            
            <hr>
            
            <form enctype="multipart/form-data" name="formListImages" id="formListImages" method="POST" action="registrarImg.php">
                <table class="table table-striped">
                    <thead>
                        <th>ID</th>
                        <th>TEMÁTICA</th>
                        <th>IMAGEM</th>
                        <th>GERENCIAR</th>
                    </thead>
                    <tbody>
                        <?php
                        //LISTAGEM DOS DADOS
                        $sql_select = "SELECT * FROM image ORDER BY id_img;";
                        $exec_query = mysqli_query($conn, $sql_select) or die(mysqli_error($exec_query));

                        while($reg = mysqli_fetch_array($exec_query)){
                            $id = $reg['id_img'];
                            $tematica = $reg['tematica'];
                            $imagem = $reg['imagem'];

                            echo "<tr>";
                            echo "<td><input type='text' class='form-control' name='id".$id."' value='".$id."' readonly></td>";
                            echo "<td><input type='text' class='form-control reg".$id."' name='tema' id='tema".$id."' value='".$tematica."' readonly></td>";
                            echo "<td><img height='100' width='100' src='data:image/jpeg;base64,".base64_encode($imagem)."'/></td>";
                            echo "<td>";
                            echo " <button name='btnEnviar' id='enviar".$id."' class='btn btn-info enviar' type='submit' value='".$id."' disabled>Enviar</button>";
                            echo " <button name='btnEditar' id='editar".$id."' type='button' class='btn btn-warning editar' value='".$id."'>Editar</button>";
                            echo " <button name='btnExcluir' id='excluir".$id."' class='btn btn-danger excluir' type='submit' value='".$id."'>Excluir</button>";
                            echo "</td>";
                            echo "</tr>";



                        }



                        ?>
                    </tbody>

                </table>
                
            </form>
            <script>
                
$(document).ready(function(){
    //TESTE - BUTTON
    $(".linkteste").click(function(){
        alert("Teste com script interno funciona");
    }); 

    //=============================================
    //CONTÚEDO DO SCRIPT DE FATO
    
    //BUTTON EDITAR
    $(".editar").click(function(){
        var id = $(this).attr('value');
        
        $("#enviar"+id).prop('disabled',false);
        $(".reg"+id).prop('readonly',false);
        $("#editar"+id).prop('disabled',true);
        
    });
    
    //BUTTON EXCLUIR
    //Botão Excluir
    $('.excluir').click(function(){
        var id = $(this).attr('value');
        var decide_excluir = confirm("Tem certeza que deseja excluir este registro? ");
        
        if(decide_excluir){
            //Enviar dados para serem excluídos
            $('#formListImages').submit();
   
        }else{
            $('#formListImages').submit(function(){
                return false;
            });
            window.location.reload();
        }     
        
    });
    

});
                
     
            </script>
              
        </div>
        
        <div style="margin: 5%">
            <a href="teste.php">Teste de XSS - Cross Site Scripting</a><br/>
            <a href="teste_1.php">Teste com manipulação de arquivos</a><br/>
            <a href="teste_2.php">Teste com Expressões regulares</a><br/>
            <button type="button" class="linkteste">Teste JQUERY</button> 
            
        </div>
        
    </body>
</html>
