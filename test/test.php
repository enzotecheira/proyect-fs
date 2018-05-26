<?php
require_once '../classes/Usuario.php';
require_once '../classes/MySQLDB.php';
require_once '../classes/JsonDB.php';
require_once '../classes/DBFactory.php';
//require_once '../classes/JsonDB.php'; para cambiar segun lo que carguemos en $db_type
// $usuario=new Usuario(['userName'=>'carloo', 'email'=>'a@a.com', 'password'=>'123', 'name'=>'pepe', 'image'=>'dede']);
// $usuario->save();
//DBFactory::$db_type = 'MySQLDB';
DBFactory::$db_type = 'JsonDB';

$usuario=new Usuario(['id'=>'1','userName'=>'carloo', 'email'=>'a@a.com', 'password'=>'123', 'name'=>'pepe', 'image'=>'dede']);
$usuario->save();
var_dump($usuario);exit;

$usuario = Usuario::find('id',1);

$usuario->name= 'kk';

$usuario->save();
var_dump($usuario);exit;

 ?>
