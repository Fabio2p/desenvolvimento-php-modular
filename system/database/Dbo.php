<?php 
require 'base.class.php';

abstract class Dbo extends Base{
  
  private $keys   = null;
  
  private $values = null; 
  
  protected $db;

  private $where  = null;

  protected $stm    = null;


  public function __construct(){

    $this->db = parent::getConn();
  }

  protected function insert($table, array $fields){

    $this->keys   = implode(',', array_keys($fields));

    $this->values   = implode(', :', array_keys($fields));

    $query = "INSERT INTO {$table}({$this->keys}) VALUES (:{$this->values})";

    $this->stm = $this->db->prepare($query);

    foreach($fields as $key=>$value):

      $this->stm->bindValue(":{$key}", $value, (is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR));

    endforeach;

    $this->stm->execute();
  }

  protected function update($table, array $fields, $id){

    foreach($fields as $vars=>$k):

        $field[] = $vars .'= :'. $vars;

        $places = implode(' ,', $field);

    endforeach;

    $query = "UPDATE {$table} SET {$places} WHERE id= :{$id}";

    $this->stm = $this->db->prepare($query);

    foreach($fields as $chaves=>$valores):

      $this->stm->bindValue(":{$chaves}", $valores, (is_int($valores) ? PDO::PARAM_INT : PDO::PARAM_STR));
          
    endforeach;

    $this->stm->bindParam(":{$id}", $id, PDO::PARAM_INT);

    $this->stm->execute();
  }

  

  protected function delete($table, $id){

    echo $query = "DELETE FROM {$table} WHERE id= :{$id}";

    $this->stm = $this->db->prepare($query);

    $this->stm->bindParam(":{$id}", $id, PDO::PARAM_INT);

    $this->stm->execute();
  }

  protected function select($fields, $table, $where = null){

    // CLAUSA WHERE -----------------------------------------------------
    if($where != null):

    array($where);
    
    foreach($where as $vars=>$k):

        $field[] = $vars .'= :'. $vars;

        $places = implode(' AND ', $field);

    endforeach;

    $Clause = "WHERE ".$places;

  endif;
   
   //Condição Ternária: se na chamada do metodo select, for passado os valores da CLAUSA WHERE; então esse será setado; se nao é vazio.

   $place = (empty($Clause) ? " " : $Clause);

   //Fim da condição Ternária. ----------------------------------------------------------

  // FIM DA CLAUSA WHERE ----------------------------------------------------
  
    $query = "SELECT {$fields} FROM {$table} {$place}";


    $this->stm = $this->db->prepare($query);

    $this->stm->setFetchMode(PDO::FETCH_OBJ);

  // BLINADA OS VALORES PASSADO VIA PARAMETROS -------------------------------

    if($where !== null):

    array($where);

    foreach($where as $chaves=>$valores):

      $this->stm->bindValue(":{$chaves}", $valores, (is_int($valores) ? PDO::PARAM_INT : PDO::PARAM_STR));
          
    endforeach;

    endif;

  // FIM DA BLINDAGEM DOS VALORES ---------------------------------------------
    
    $this->stm->execute();

    return $this->stm->fetchAll();

  }

  // Fecha a conexao com o banco
  protected function close(){

    $this->db = null;

  }

}
?>
