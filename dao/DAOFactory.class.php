<?php

  
  class DAOFactory {
    
    public static function getPessoaDAO(){
      return new PessoaDAO();
    }
    
  }
  