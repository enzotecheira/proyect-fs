<?php

require_once './classes/DBFactory.php';
require_once './classes/MySQLDB.php';
require_once './classes/JsonDB.php';

	DBFactory::$db_type = 'MySQLDB'; //ELEGIR DB MySQLDB JsonDB
/**
 *
 */
class Model{

  public function __construct($data)
  {
    $this->toModel($data);
  }
  public static function find($row, $value){
    return DBFactory::getDB()->find($row, $value, static::$table, get_called_class());
  }

  public function toModel($data)
  {
    if (isset($data['id'])) {
      $this->id = $data['id'];
    }
      foreach ($data as $key => $value) {
      if (in_array($key, $this->fillable)) {
        $this->$key = $value;
      }
    }
  }
  public function save()
  {
    return DBFactory::getDB()->save(static::$table, $this);//$this refiere al objeto que est'a llamando a este metodo
  }
	public function esMailUnico($email,$id)
  {
    return DBFactory::getDB()->esMailUnico($email, $id);
  }


}

 ?>
