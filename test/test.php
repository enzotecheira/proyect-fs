<?php
require '../classes/Usuario.php';
/*
$usuario=new Usuario('pepe', 'a@a.com', '123', 'pepe', 'dede');
$usuario->save();
var_dump($usuario);
*/

$usuario = Usuario::find(2);
$usuario->setName('cambiado');
$usuario->save();
var_dump($usuario);

 ?>
