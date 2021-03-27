<?php
class InputText {
  private $nombre;
  private $texto;
  private $etiqueta;
  
  public function __construct($name, $text, $label) {
    $this->nombre = $name;
    $this->texto = $text;
    $this->etiqueta = $label;
  }
  
  public function __toString() {
    return "<label>$this->texto<br><input type='text' name='$this->nombre' placeholder='$this->etiqueta' required></label><br><br>";
  }

}

class InputSelect {
  private $nombre;
  private $texto;
  private $lista;
  private $respuesta;
  
  public function __construct($name, $text, $list, $res) {
    $this->nombre = $name;
    $this->texto = $text;
    $this->lista = $list;
    $this->respuesta = $res;
  }
  
  public function __toString() {
    $select = "<label>$this->texto<select name='$this->nombre'>";
    foreach($this->lista as $a => $b) {
      $b=htmlentities($b);
      $select.="<option value='$b'>$b</option>";
    }
    $select.="</select></label><br><br>";
    return $select;
  }

}

class InputRadio {
  private $nombre;
  private $texto;
  private $lista;
  private $respuesta;
  
  public function __construct($name, $text, $list, $res) {
    $this->nombre = $name;
    $this->texto = $text;
    $this->lista = $list;
    $this->respuesta = $res;
  }
  
  public function __toString() {
    $select = "<fieldset>
    <legend>$this->texto</legend>";
    foreach($this->lista as $a => $b) {
      $b=htmlentities($b);
      $select.="<label><input type='radio' name='$this->nombre' value='$b' />$b</label><br>";
    }
    $select.="</fieldset><br>";
    return $select;
  }

}

// correctores:

class Verificar {
  private $nombre;
  private $respuesta;
  private $error;
  
  public function __construct($nombre, $respuesta, $mensajeError) {
    $this->nombre = $nombre;
    $this->respuesta = $respuesta;
    $this->error = $mensajeError;
  }
  
  public function __invoke($quest) {
    if($_POST[$this->nombre] == $this->respuesta) {
      $quest->sumarRespuestaCorrecta();
    } else {
      $quest->agregarError($this->error);
    }
  }
}

?>