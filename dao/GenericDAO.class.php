<?php
  
  class GenericDAO {

    public function __construct() {
      $this->conexao = ConnectionFactory::getConexao();
    }

    public function __destruct() {
      $this->conexao = NULL;
    }

  }
  