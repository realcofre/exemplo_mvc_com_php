<?php
  
  foreach ($lista as $oPessoa) {
    echo $oPessoa->getId() . ' - ' . 
      $oPessoa->getNome() . ' - ' . 
      $oPessoa->getEmail() . ' - ' . 
      $oPessoa->getTelefone() . 
      " [<a href=?area=pessoa&acao=excluir&id=".
      $oPessoa->getId().">Excluir</a>] <br>";
  }
  
?>
