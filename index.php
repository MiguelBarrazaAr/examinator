<?php
header('Content-Type: text/html; charset=utf-8');      
include("webEvaluator.php");

$q = new Cuestionario();
// ponemos donde guardaremos las respuetas:
$q->configurarReporte("respuestas.txt");

$q->titulo = "ejercicio html";
$q->consigna("practiquemos", "responde las siguientes preguntas con el codigo aprendido en clase.");

$q->campo("nombre", "nombre", "escriba su nombre");
$q->campo("email", "e-mail", "escriba su correo electrónico");

$q->seleccionar("link", "seleccione cual es la etiqueta para crear un enlace",
	  ["link", "p", "a", "b", "no existe"],
  "a", "Los enlaces se realizan con la etiqueta &lt;a&gt;.");

$lista=["<idioma español>",
  '<lang value="es">',
  '<html languaje="es">',
  '<html lang="es">',
  'con escribir en español ya se da cuenta.'];

$q->seleccionar("lang", "Seleccione el codigo correcto para prefijar el idioma al español del del documento html",
	  $lista,
  $lista[3], 'Se define el idioma en la etiqueta html, poniendo como valor "es" en el atributo lang.');

$q->escribir("enlace", "escriba el código para realizar un enlace que vaya al archivo contacto.html y que muestre como texto: contactame",
  '<a href="contacto.html">contactame</a>', "Se esperaba que el código del enlace sea este");

$q->seleccionar("encoding", "seleccione cual es la codificación recomendada para usar en tus documentos html",
  ["ANSI", "UNICODE", "UTF-8", "Eso no importa, cualquiera sirve para el español"],
  "UTF-8", "Para páginas en español, la codificación recomendada es UTF-8");

$q->escribir("meta", "escriba el codigo para definir la codificación del documento para que funcione bien con acentos y caracteres del idioma español",
	'<meta charset="UTF-8">', "para codificar el documento en UTF-8 se pone así");

$q->show();
?>