<?php
require_once 'DB.php';
class Usuario
{
  private $idusuarios;
  private $userName;
  private $email;
  private $password;
  private $name;
  private $image;

  public function setName($name)
  {
    $this->name=$name;
  }

  public function __construct($userName, $email, $password, $name, $image)
  {
    $this->userName = $userName;
    $this->email = $email;
    $this->setPassword($password);
    //$this->setPassword($password);
    $this->name = $name;
    $this->image = $image;
  }

  public function setPassword($value)
  {
    $this->password=password_hash($value,PASSWORD_DEFAULT);
  }

  public static function find($id)
  {
    $sql = 'SELECT * FROM usuarios WHERE idusuarios = :id';
    $stmt= DB::getConn()->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $usuario = new Usuario ('','','','','');
    $usuario->toUser($result);
    return $usuario;
  }

  private function toUser($data)
  {
    $this->idusuarios = $data['idusuarios'];
    $this->userName = $data['userName'];
    $this->email = $data['email'];
    $this->password = $data['password'];
    $this->name = $data['name'];
    $this->image = $data['image'];
  }

  public function checkPassword($password)
  {
    password_verify($password,$this->password);
  }

  public function save()
  {
    $sql = ($this->idusuarios)?$this->update():$this->insert();
    $stmt = DB::getConn()->prepare($sql);
    $stmt->bindValue(':userName',$this->userName, PDO::PARAM_STR);
    $stmt->bindValue(':email',$this->email, PDO::PARAM_STR);
    $stmt->bindValue(':password',$this->password, PDO::PARAM_STR);
    $stmt->bindValue(':name',$this->name, PDO::PARAM_STR);
    $stmt->bindValue(':image',$this->image, PDO::PARAM_STR);
    $stmt->execute();
  }
  private function insert()
  {
    return 'INSERT INTO usuarios (userName, email, password, name, image) VALUES (:userName, :email, :password, :name, :image)';
  }
  private function update()
  {
    return 'UPDATE usuarios SET userName=:userName, email=:email,password=:password,name=:name,image=:image
    WHERE idusuarios= '.$this->idusuarios;
  }
}

 ?>
