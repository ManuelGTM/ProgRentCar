<?php

class modelo {

private $conn;

public $id_modelo;
public $descripcion;
public $estado;

     // constructor
public function __construct($db){
        $this->conn = $db;
}

 // GET ALL
 function getAll(){
    $sqlQuery = "SELECT id_modelo, descripcion, estado FROM modelo";
    $stmt = $this->conn->prepare($sqlQuery);
    $stmt->execute();
    return $stmt;
}

// GET ONE
function getOne(){
   $sqlQuery = "SELECT id_modelo, descripcion, estado 
   FROM modelo
   WHERE id_modelo = ". $this->id_modelo;
   $stmt = $this->conn->prepare($sqlQuery);
   $stmt->execute();
   return $stmt;
}


  // create new  record
  function create(){
   try{
   // insert query
      $query = "INSERT INTO modelo(
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
   wh_log( date("y-m-d H:i:s"). " - ".   "Error al insertar datos modelo 5 ". $table);
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
       modelo
       SET 
      descripcion = :descripcion,
      estado = :estado WHERE id_modelo = :id_modelo" ;
      
      
   // prepare the query
   $stmt = $this->conn->prepare($query);

   // sanitize
   
$this->id_modelo=htmlspecialchars(strip_tags($this->id_modelo));
$this->descripcion=htmlspecialchars(strip_tags($this->descripcion));  
$this->estado=htmlspecialchars(strip_tags($this->estado));

$stmt->bindParam(':id_modelo', $this->id_modelo);
$stmt->bindParam(':descripcion', $this->descripcion);
$stmt->bindParam(':estado', $this->estado);
   
   // execute the query, also check if query was successful
   if($stmt->execute()){
    
       return true;
   }
   
}catch(PDOException $exception){
   wh_log( date("y-m-d H:i:s"). " - ".   "Error al insertar datos modelo 5 ".  $table );
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
      modelo
       SET 
      estado = :estado WHERE id_modelo = :id_modelo" ;
      
      
   // prepare the query
   $stmt = $this->conn->prepare($query);

   // sanitize
   
$this->id_modelo=htmlspecialchars(strip_tags($this->id_modelo));
$this->estado=htmlspecialchars(strip_tags($this->estado));

$stmt->bindParam(':id_modelo', $this->id_modelo);
$stmt->bindParam(':estado', $this->estado);
   
   // execute the query, also check if query was successful
   if($stmt->execute()){
    
       return true;
   }
   
}catch(PDOException $exception){
   wh_log( date("y-m-d H:i:s"). " - ".   "Error al insertar datos modelo 5 ".  $table );
   wh_log( $exception   );
   
   
   return false;
}

   return false;
} 


}





?>
