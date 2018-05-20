<?php

/**
 *
 */
class Model{

  protected $fillable;

  function __construct($data)
  {
    foreach ($data as $key => $value) {
      if (in_array($key, $fillable)) {
        $this->$key = $value;
      }
    }
  }
}

 ?>
