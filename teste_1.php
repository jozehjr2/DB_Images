<html>
    <head>
        <title>Manipulação de arquivos</title>
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <link rel="stylesheet" href="css/style.css"/>
        <script src="js/script.js"></script>
    </head>
    <body>
        <div class="conteudo">
            
            <?php
            
                $arquivo = "texto.txt";
                $conteudo = "Conteudo de teste\r\n";
            
                $tamanhoArquivo = filesize($arquivo);
            
                $arquivoAberto = fopen($arquivo,'r');
                //fwrite($arquivoAberto,$conteudo);
            
                while(!feof($arquivoAberto)):
                    $linha = fgets($arquivoAberto,$tamanhoArquivo);
                    echo $linha."<br/>";
                endwhile;
            
            
                fclose($arquivoAberto);
            
            ?>
            
            
            
        </div>
    </body>
    
</html>
