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
    return "
	<div class='row mt-3'>
	<div class='col-12'>
	<div class='form-group'>
<label>$this->texto
<input type='text' name='$this->nombre' placeholder='$this->etiqueta' class='form-control' required>
</label>
</div>
</div>
</div>
";
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
    $select = "
	<div class='row mt-3'>
	<div class='col-12'>
	<div class='form-group'>
	<label>$this->texto
	<select name='$this->nombre' class='form-control'>";
    foreach($this->lista as $a => $b) {
      $b=htmlentities($b);
      $select.="<option value='$b'>$b</option>";
    }
    $select.="</select></label>
	</div>
	</div>
	</div>
";
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
    $select = "
	<div class='row mt-3'>
	<div class='col-12'>
	<div class='form-group'>
<fieldset>
    <legend class='text-center'>$this->texto</legend>";
    foreach($this->lista as $a => $b) {
      $b=htmlentities($b);
      $select.="<label><input type='radio' name='$this->nombre' value='$b' class='form-control' />$b</label><br>";
    }
    $select.="</fieldset>
	</div>
	</div>
	</div>
";
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