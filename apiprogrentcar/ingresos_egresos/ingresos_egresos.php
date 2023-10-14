<?php

class ingresos_egresos{

private $conn;

public $id_reposicion;
public $monto;
public $descripcion;
public $entrega;
public $tipo;
public $estado;

     // constructor
public function __construct($db){
        $this->conn = $db;
}

 // GET ALL
 function getAll(){
    $sqlQuery = "SELECT id_reposicion, monto, descripcion, entrega, 
    tipo, estado FROM  ingresos_egresos";
    $stmt = $this->conn->prepare($sqlQuery);
    $stmt->execute();
    return $stmt;
}

// GET ONE
function getOne(){
    $sqlQuery = "SELECT id_reposicion, monto, descripcion, entrega, 
    tipo, estado FROM  ingresos_egresos
    WHERE id_reposicion = ". $this->id_reposiscion;
   $stmt = $this->conn->prepare($sqlQuery);
   $stmt->execute();
   return $stmt;
}


  // create new  record
  function create(){
   try{
   // insert query
      $query = "INSERT INTO ingresos_egresos(
                           monto, 
                           descripcion,
                           entrega,
                           tipo,
                           estado)
                           VALUES (
                           :monto, 
                           :descripcion,
                           :entrega,
                           :tipo,
                           :estado)";
      
      
   // prepare the query
   $stmt = $this->conn->prepare($query);

   // sanitize
   
$this->monto=htmlspecialchars(strip_tags($this->monto));  
$this->descripcion=htmlspecialchars(strip_tags($this->descripcion));  
$this->entrega=htmlspecialchars(strip_tags($this->entrega));  
$this->tipo=htmlspecialchars(strip_tags($this->tipo));  
$this->estado=htmlspecialchars(strip_tags($this->estado));  

$stmt->bindParam(':monto', $this->monto);
$stmt->bindParam(':descripcion', $this->descripcion);
$stmt->bindParam(':entrega', $this->entrega);
$stmt->bindParam(':tipo', $this->tipo);
$stmt->bindParam(':estado', $this->estado);
   
   // execute the query, also check if query was successful
   if($stmt->execute()){
    
       return true;
   }
   
}catch(PDOException $exception){
   wh_log( date("y-m-d H:i:s"). " - ".   "Error al insertar datos ingresos_egresos 5 ". $table);
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
       ingresos_egresos
       SET 
      monto = :monto,
      descripcion = :descripcion,
      entrega = :entrega,
      tipo = :tipo,
      estado = :estado WHERE id_reposicion = :id_reposicion" ;
      
      
   // prepare the query
   $stmt = $this->conn->prepare($query);

   // sanitize
   
$this->id_reposicion=htmlspecialchars(strip_tags($this->id_reposicion));
$this->monto=htmlspecialchars(strip_tags($this->monto));  
$this->descripcion=htmlspecialchars(strip_tags($this->descripcion));  
$this->entrega=htmlspecialchars(strip_tags($this->entrega));  
$this->tipo=htmlspecialchars(strip_tags($this->tipo));  
$this->estado=htmlspecialchars(strip_tags($this->estado));  

$stmt->bindParam(':id_reposicion', $this->id_reposicion);
$stmt->bindParam(':monto', $this->monto);
$stmt->bindParam(':descripcion', $this->descripcion);
$stmt->bindParam(':entrega', $this->entrega);
$stmt->bindParam(':tipo', $this->tipo);
$stmt->bindParam(':estado', $this->estado);
   
   // execute the query, also check if query was successful
   if($stmt->execute()){
    
       return true;
   }
   
}catch(PDOException $exception){
   wh_log( date("y-m-d H:i:s"). " - ".   "Error al insertar datos reposicion 5 ".  $table );
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
      ingresos_egresos
       SET 
      estado = :estado WHERE id_reposicion = :id_reposicion" ;
      
      
   // prepare the query
   $stmt = $this->conn->prepare($query);

   // sanitize
   
$this->id_reposicion=htmlspecialchars(strip_tags($this->id_reposicion));
$this->estado=htmlspecialchars(strip_tags($this->estado));

$stmt->bindParam(':id_reposicion', $this->id_reposicion);
$stmt->bindParam(':estado', $this->estado);
   
   // execute the query, also check if query was successful
   if($stmt->execute()){
    
       return true;
   }
   
}catch(PDOException $exception){
   wh_log( date("y-m-d H:i:s"). " - ".   "Error al insertar datos reposicion 5 ".  $table );
   wh_log( $exception   );
   
   
   return false;
}

   return false;
} 


}





?>
