<html>
    <head>
        <title>Expressões regulares e Preg_Match</title>
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <link rel="stylesheet" href="css/style.css"/>
        <script src="js/script.js"></script>
    </head>
    <body>
        <div class="conteudo">
            
            <h2>Testando expressões regulares: </h2>
            
            <hr style="height: 3px; background-color: blueviolet">
            
            <form method="post" action="">
                <label>Palavra: </label><input type="text" name="word">
                <label>Número abaixo de 5: </label><input type="number" name="lessthan5">
                <label>Email: </label><input type="text" name="email">
                <br/>
                <input type="submit" name="envio">
            </form>
            
            
            <?php
            
            /*
            Expressões regulares: define um padrão a ser usado para procurar ou substituir palavras ou grupos de palavras.
            
            ^ Início da expressão, $ final da expressão /i case sensitive
            
            []conjunto de caracteres
            {} ocorrências - ?{0,1} *{0,n} +{1,n}
            /^[a-z0-9.\_]+@[a-z0-9-\_]+\.(com|br|com.br|net)$/
            /^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/
            
            */
            
            /*
            
            $string = "13/09/2010";
            //$padrao = "/^[a-z0-9]{1,4}$/i";
            //$padrao = "/^[a-z0-9.\-\_]+@[a-z0-9.\-\_]+\.(com|br|com.br)$/i";
            $padrao = "/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/";
            
            if(preg_match($padrao, $string)):
                echo "Válido";
                echo "<hr>";
                echo $string;
            else:
                echo "Inválido";
                echo "<hr>";
            endif;
             
             * 
             * 
             */
             
            
            if(isset($_POST['envio'])){
                $word = $_POST['word'];
                $padrao_w = "/^[a-z]*$/i";
                
                $number = $_POST['lessthan5'];
                $padrao_n = "/^[0-5]$/";
                
                $email = $_POST['email'];
                $padrao_e = "/^[a-z0-9.\-\_]+@[a-z0-9.\-\_]+\.(com|br|com.br)$/i";
                
                if(preg_match($padrao_w,$word)){
                    echo "<br/>Expressão validada: <br/>";
                    echo $word;
                }else{
                    echo "<br/>PALAVRA INVÁLIDA!";
                }
                
                if(preg_match($padrao_n,$number)){
                    echo "<br/>Expressão validada: <br/>";
                    echo $number;
                }else{
                    echo "<br/>NÚMERO INVÁLIDO! <span style='color: red'>[MAIOR QUE 5]</span>";
                }
                
                if(preg_match($padrao_e,$email)){
                    echo "<br/>Expressão validada: <br/>";
                    echo $email;
                }else{
                    echo "<br/>EMAIL INVÁLIDO!";
                } 
                
            }
            

            ?>
            
            
            
        </div>
    </body>
    
</html>
