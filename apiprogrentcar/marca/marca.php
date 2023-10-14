<?php

class marca {

private $conn;

public $id_marca;
public $descripcion;
public $estado;

     // constructor
public function __construct($db){
        $this->conn = $db;
}

 // GET ALL
 function getAll(){
    $sqlQuery = "SELECT id_marca, descripcion, estado FROM marca";
    $stmt = $this->conn->prepare($sqlQuery);
    $stmt->execute();
    return $stmt;
}

// GET ONE
function getOne(){
   $sqlQuery = "SELECT id_marca, descripcion, estado 
   FROM marca
   WHERE id_marca = ". $this->id_marca;
   $stmt = $this->conn->prepare($sqlQuery);
   $stmt->execute();
   return $stmt;
}


  // create new  record
  function create(){
   try{
   // insert query
      $query = "INSERT INTO marca(
                           descripcion,
                           estado) 
                           VALUES (
                           :descripcion,
                           :estado)";
      
      
   // prepare the query
   $stmt = $this->conn->prepare($query);

   // sanitize
   
$this->descripcion=htmlspecialchars(strip_tags($this->descripcion));  
$this->estado=htmlspecialchars(strip_tags($this->estado));


$stmt->bindParam(':descripcion', $this->descripcion);
$stmt->bindParam(':estado', $this->estado);
   
   // execute the query, also check if query was successful
   if($stmt->execute()){
    
       return true;
   }
   
}catch(PDOException $exception){
   wh_log( date("y-m-d H:i:s"). " - ".   "Error al insertar datos marca 5 ". $table);
   wh_log( $exception   );
   
   
   return false;
}

   return false;
} 
   

  // create new  update
  function update(){
   try{
   // insert query
      $query = "UPDATE 
       marca
       SET 
      descripcion = :descripcion,
      estado = :estado WHERE id_marca = :id_marca" ;
      
      
   // prepare the query
   $stmt = $this->conn->prepare($query);

   // sanitize
   
$this->id_marca=htmlspecialchars(strip_tags($this->id_marca));
$this->descripcion=htmlspecialchars(strip_tags($this->descripcion));  
$this->estado=htmlspecialchars(strip_tags($this->estado));

$stmt->bindParam(':id_marca', $this->id_marca);
$stmt->bindParam(':descripcion', $this->descripcion);
$stmt->bindParam(':estado', $this->estado);
   
   // execute the query, also check if query was successful
   if($stmt->execute()){
    
       return true;
   }
   
}catch(PDOException $exception){
   wh_log( date("y-m-d H:i:s"). " - ".   "Error al insertar datos marca 5 ".  $table );
   wh_log( $exception   );
   
   
   return false;
}

   return false;
} 


  // create new  estado
  function estado(){
   try{
   // insert query
      $query = "UPDATE 
      marca
       SET 
      estado = :estado WHERE id_marca = :id_marca" ;
      
      
   // prepare the query
   $stmt = $this->conn->prepare($query);

   // sanitize
   
$this->id_marca=htmlspecialchars(strip_tags($this->id_marca));
$this->estado=htmlspecialchars(strip_tags($this->estado));

$stmt->bindParam(':id_marca', $this->id_marca);
$stmt->bindParam(':estado', $this->estado);
   
   // execute the query, also check if query was successful
   if($stmt->execute()){
    
       return true;
   }
   
}catch(PDOException $exception){
   wh_log( date("y-m-d H:i:s"). " - ".   "Error al insertar datos marca 5 ".  $table );
   wh_log( $exception   );
   
   
   return false;
}

   return false;
} 


}





?>
