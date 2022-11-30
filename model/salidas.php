<?php
require_once 'core/crud.php';

class Salidas extends Crud
{
    public $id;
    public $ticket;
    public $product_id;
    public $quantity;
    const TABLE = "material_removal_table";
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
                    (ticket,product_id,quantity) 
                    VALUES (?,?,?)");
            $stm->execute(array(
              $this->ticket,
              $this->product_id,
              $this->quantity
      
            ));
          } catch (PDOException $e) {
            echo $e->getMessage();
          }
    }

    public function update()
    {
    }
}
