<?php 

function conectarDB(): mysqli {
  $db = new mysqli('localhost:3307', 'root', 'sasa', 'bienes_raices');
  $db->set_charset("utf8");

  if (!$db) {
    echo 'Error no se pudo conectar';
    exit;
  }

  return $db;
}
