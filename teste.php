<html>
    <head>
        <title>Exemplos de funcionalidades</title>
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <link rel="stylesheet" href="css/style.css"/>
        <script src="js/script.js"></script>
    </head>
    <body>
        <div class="conteudo">
            <a href="#" onclick="emitirAlerta();">Mensagem</a><br/>
            
            <form action="" method="POST">
                <label>Nome:</label>
                <input type="text" id="nome" name="nome"/>
                <br/>
                <label>Idade:</label>
                <input type="number" id="idade" name="idade"/>
                
                <br/><br/>
                <input type="submit" name="envio"/>
            </form>
            <?php
            
                function tratar_dados_recebidos($n, $i){
                    $nome = htmlspecialchars($n);
                    $idade = htmlspecialchars($i);
                    
                    $mensagem = "<br/>Olá, ".$nome." <br/>Você tem ".$idade." anos de idade.";
                    
                    return $mensagem;
                }
                
                if(isset($_POST['envio'])){
                    echo tratar_dados_recebidos($_POST['nome'], $_POST['idade']);
                    
                }
                
            
            
            ?>
            
            
            
        </div>
    </body>
    
</html>
