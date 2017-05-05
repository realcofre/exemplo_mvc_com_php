<?php

  require_once './dao/DAOFactory.class.php';
  require_once './dao/GenericDAO.class.php';

  class ConnectionFactory {

    public function __construct() {
      
    }

    public static function getConexao() {
      try {

        $confConexao = ConfigConexao::$banco;
        $host = $confConexao["hostname"];
        $user = $confConexao["username"];
        $pass = $confConexao["pass"];
        $banco = $confConexao["banco"];

        $conexao = new PDO("mysql:host=$host;dbname=$banco", $user, $pass);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (Exception $ex) {
        print $ex->getMessage();
        exit();
      }
      return $conexao;
    }

    private function __clone() {
      ;
    }

    private function __destruct() {
      ;
    }

  }
  