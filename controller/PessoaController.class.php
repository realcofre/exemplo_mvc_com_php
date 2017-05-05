<?php
  
  require_once './dao/PessoaDAO.class.php';
  //Controle Pessoa
  
  switch ($acao) {

    case 'salvar':

      if (isset($_POST['nome'])) {
              
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];

        $oPessoa = new Pessoa();
        $oPessoa->setNome($nome);
        $oPessoa->setTelefone($telefone);
        $oPessoa->setEmail($email);    
        
        if (DAOFactory::getPessoaDAO()->salvar($oPessoa)) {
          $cod = 100;
        } else {
          $cod = 102;
        }
        header('Location: index.php?area=pessoa&acao=cad&cod='.$cod);
      }


      break;

    case 'excluir':

      if ($_GET['id']) {                
        
        $idExcluir = $_GET['id'];
        $resultado = DAOFactory::getPessoaDAO()->excluir($idExcluir);
        if ($resultado) {
          echo "excluído com sucesso";
        } else {
          echo "não foi possível excluir";
        }
      }

      break;

    case 'listar':
            
      $lista = DAOFactory::getPessoaDAO()->listar();
      
      include './view/lista_pessoa.php';
      break;

    case 'cad':

      include './view/cad_pessoa.php';

      break;
  }