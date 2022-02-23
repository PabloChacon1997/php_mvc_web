<?php

namespace Model;

use Model\ActiveRecord;

class Entrada extends ActiveRecord {
  protected static $tabla = 'entradas';
  protected static $columnasDB = ['id', 'titulo', 'usuario', 'fecha', 'descripcion', 'imagen', 'usuarioId'];


  public $id;
  public $titulo;
  public $usuario;
  public $fecha;
  public $descripcion;
  public $imagen;
  public $usuarioId;

  public function __construct($args = [])
  {
    $this->id = $args['id'] ?? null;
    $this->titulo = $args['titulo'] ?? '';
    $this->usuario = $args['usuario'] ?? '';
    $this->fecha = date('Y/m/d');
    $this->descripcion = $args['descripcion'] ?? '';
    $this->imagen = $args['imagen'] ?? '';
    $this->usuarioId = $args['usuarioId'] ?? '';
  }

  public function vaidar() {
    
    if (!$this->titulo) {
      self::$errores[] = 'El titulo es obligatorio';
    }

    if (!$this->usuario) {
      self::$errores[] = 'El nombre usuario es obligatorio';
    }

    if (!$this->descripcion) {
      self::$errores[] = 'La descripcion es obligatorio';
    }

    if (!$this->imagen) {
      self::$errores[] = 'La imagen es obligatorio';
    }

    return self::$errores;

  }
}