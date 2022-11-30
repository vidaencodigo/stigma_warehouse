<?php
require_once 'core/crud.php';

class Entradas extends Crud
{
    public $id;
    public $ticket;
    public $product_id;
    public $quantity;
    const TABLE = "entries_table";
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

    public function get_total(){
      /** RETORNA TODOS LOS ELEMENTOS DE LA TABLAS */
      try {
        //code...
        $stm = $this->pdo->prepare("SELECT sum(quantity) as suma FROM ". self::TABLE);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_OBJ);
      } catch (\PDOException $e) {
        echo $e->getMessage();
      }
    }
}
