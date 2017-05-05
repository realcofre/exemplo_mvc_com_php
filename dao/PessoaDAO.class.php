<?php

  require './dao/DAOFactory.class.php';
  require './dao/GenericDAO.class.php';

  class PessoaDAO extends GenericDAO {

    public function salvar(Pessoa $oPessoa) {

      $this->conexao->beginTransaction();
      try {

        if (!$oPessoa->getId()) { //Inserir um novo registro
          
          $query = $this->conexao->prepare("INSERT INTO pessoa (nome, telefone, email) "
            . " values (:nome, :telefone, :email)");
          
        } else {//Alterar um registro existente

          $query = $this->conexao->prepare("UPDATE pessoa SET nome = :nome, "
            . "telefone = :telefone, email = :email WHERE id = :id");
          
          $query->bindParam(':id', $oPessoa->getId());
          
        }
        
        $query->bindParam(':nome', $oPessoa->getNome());
        $query->bindParam(':telefone', $oPessoa->getTelefone());
        $query->bindParam(':email', $oPessoa->getEmail());
        $query->execute();        
        $this->conexao->commit();
        
        return TRUE;
        
      } catch (PDOException $ex) {

        $this->conexao->rollback();
        return FALSE;
        
      }
    }

    public function excluir($id) {

      $this->conexao->beginTransaction();
      try {

        if ($id > 0) { //Excluir pessoa
          $query = $this->conexao->prepare("DELETE FROM pessoa WHERE id = :id");
          $query->bindParam(':id', $id);
          $query->execute();
        }

        $this->conexao->commit();
        return TRUE;
      } catch (PDOException $ex) {

        $this->conexao->rollback();
        return FALSE;
      }
    }

    public function listar() {

      $this->conexao->beginTransaction();
      try {

        $query = $this->conexao->prepare("SELECT id, nome,"
          . " email, telefone FROM pessoa");
        $query->execute();
        
        return $query->fetchALL(PDO::FETCH_CLASS, 'Pessoa');
        
        
      } catch (PDOException $ex) {

        $this->conexao->rollback();
        return NULL;
      }
    }

  }
  