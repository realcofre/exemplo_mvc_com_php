<?php

  spl_autoload_register(function($className) {
    $filename = str_replace(array('\\', '_'), DIRECTORY_SEPARATOR, $className) . '.class.php';
    
    $pastas = array(
      __DIR__ . "/model/" . $filename,
      __DIR__ . "/controler/" . $filename,
      __DIR__ . "/view/" . $filename,
      __DIR__ . "/libs/" . $filename,
      __DIR__ . "/utils/" . $filename,
    );
    
    
    foreach ($pastas as $path) {
      if (is_file($path)) {
        include $path;
        return true;
      }
    }
    return false;
  });
  