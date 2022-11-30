<?php
require_once 'core/crud.php';

class User extends Crud
{
  public $id;
  public $user;
  public $name;
  public $last_name;
  public $password;
  public $user_type; //enum('administrador','usuario')
  public $profile_image;
  public $created_at;
  public $updated_at;
  public $estatus;
  const TABLE = 'user_table';
  private $pdo;
  public function __construct()
  {
    parent::__construct(self::TABLE);
    $this->pdo = parent::connect();
  }
  public function create()
  {
    /** save new user in DB */
    try {
      //code...
      $stm = $this->pdo->prepare("INSERT INTO " . self::TABLE .  "
        (user,	name, last_name, password, user_type) 
        VALUES (?,?,?,?,?)");
      $stm->execute(array(
        $this->user,
        $this->name,
        $this->last_name,
        $this->password,
        $this->user_type,
      ));
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  public function update()
  {
    return;
  }
  public function editPassword()
  {
    try {
      //code...
      $stm = $this->pdo->prepare("UPDATE " . self::TABLE . " SET password=? WHERE users=?");
      $stm->execute(array(
        $this->password,
        $this->user
      ));
    } catch (PDOException $e) {
      //throw $e;
      echo $e->getMessage();
    }
  }
  public function get_by_username($user)
  {
    /** RETORNA EL ELEMENTO QUE HAGA MATCH CON @user */
    try {
      //code...

      $stm = $this->pdo->prepare("SELECT * FROM " .  self::TABLE . " WHERE user=?");
      $stm->execute(array($user));
      return $stm->fetch(PDO::FETCH_OBJ);
    } catch (\PDOException $e) {
      echo $e->getMessage();
    }
  }

  public function get_all_active($estatus)
  {
    /** RETORNA TODOS LOS ELEMENTOS DE LA TABLAS */
    try {
      //code...

      $stm = $this->pdo->prepare("SELECT * FROM " .  self::TABLE . " WHERE estatus=?" );
      $stm->execute(array($estatus));
      return $stm->fetchAll(PDO::FETCH_OBJ);
    } catch (\PDOException $e) {
      echo $e->getMessage();
    }
  }
}
