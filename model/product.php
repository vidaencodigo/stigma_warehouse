<?php
require_once 'core/crud.php';

class Product extends Crud
{
  public $id;
  public $sku;
  public $name;
  public $description;
  public $category;
  public $marca;
  public $supplier_price;
  public $percent_gain;
  public $taxes;
  public $min;
  public $max;
  public $product_image;
  public $estatus;

  const TABLE = "product_table";
  private $pdo;

  public function __construct()
  {
    parent::__construct(self::TABLE);
    $this->pdo = parent::connect();
  }

  public function create()
  {
    try {
      //code...
      $stm = $this->pdo->prepare("INSERT INTO " . self::TABLE .  "
              (sku, name, description, category, marca, supplier_price, percent_gain, taxes, min, max) 
              VALUES (?,?,?,?,?,?,?,?,?,?)");
      $stm->execute(array(
        $this->sku,
        $this->name,
        $this->description,
        $this->category,
        $this->marca,
        $this->supplier_price,
        $this->percent_gain,
        $this->taxes,
        $this->min,
        $this->max

      ));
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  public function update()
  {

    try {
      //code...
      $stm = $this->pdo->prepare("UPDATE " . self::TABLE . " SET name=?, description=?, marca=?, supplier_price=?, percent_gain=?, product_image=? WHERE id=?");
      $stm->execute(array(
        $this->name,
        $this->description,
        $this->marca,
        $this->supplier_price,
        $this->percent_gain,
        $this->product_image,
        $this->id
      ));
    } catch (PDOException $e) {
      //throw $e;
      echo $e->getMessage();
    }

  }
  public function get_all()
  {

    try {
      //code...

      $stm = $this->pdo->prepare("SELECT * FROM " .  self::TABLE . " WHERE estatus='active'");
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_OBJ);
    } catch (\PDOException $e) {
      echo $e->getMessage();
    }
  }
  public function get_by_sku($sku)
  {

    try {
      //code...

      $stm = $this->pdo->prepare("SELECT * FROM " .  self::TABLE . " WHERE sku=? AND estatus='active'");
      $stm->execute(array($sku));
      return $stm->fetch(PDO::FETCH_OBJ);
    } catch (\PDOException $e) {
      echo $e->getMessage();
    }
  }

  public function get_by_id($id)
  {

    try {
      //code...

      $stm = $this->pdo->prepare("SELECT * FROM " .  self::TABLE . " WHERE id=? AND estatus='active'");
      $stm->execute(array($id));
      return $stm->fetch(PDO::FETCH_OBJ);
    } catch (\PDOException $e) {
      echo $e->getMessage();
    }
  }
}
