<?php require './autoloader.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Exemplo MVC + PDO + Autoloader</title>
    </head>
    <body>
        <div name="menu-principal">
            <nav>
                <a href="?area=pessoa&acao=cad">Cadastrar pessoa</a>
                <a href="?area=pessoa&acao=listar">Listar pessoas</a>
            </nav>
        </div>
        <?php
          
          if (isset($_GET['area'])){
            $area = $_GET['area'];
          }else{
            $area = 'index';
          }
          
          if (isset($_GET['acao'])){
            $acao = $_GET['acao'];
          }else{
            $acao = 'index';
          }
          
          if ($area = 'pessoa'){
            include './controller/PessoaController.class.php';
          }
            
        ?>
    </body>
</html>
