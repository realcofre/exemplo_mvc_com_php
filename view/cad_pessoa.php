<div>
    <?php 
        if (isset($_GET['cod'])){
          if ($_GET['cod'] != null && $_GET['cod'] > 0){
            $cod_mensagem = $_GET['cod'];
          }else{
            $cod_mensagem = 0;
          }
          
          if ($cod_mensagem > 0){
            echo Mensagem::$cod_mensagem[$cod_mensagem]. "<br>";
          }
        }
    ?>
    <form id="cadPessoa" 
          name="cadPessoa" 
          method="post" 
          action="?area=pessoa&acao=salvar"
          >
        <label for="nome">Nome: </label>
        <input type="text" name="nome"><br>
        <label for="email">Email: </label>
        <input type="text" name="email"><br>
        <label for="telefone">Telefone: </label>
        <input type="text" name="telefone"><br>
        <input type="submit" value="Cadastrar">
    </form>
</div>
