<?php

class usuario {

private $conn;

public $id_usuario;
public $nombre;
public $usuario;
public $clave;
public $estado;

     // constructor
public function __construct($db){
        $this->conn = $db;
}

 // GET ALL
 function getAll(){
    $sqlQuery = "SELECT id_usuario, nombre, usuario, clave, estado FROM usuario";
    $stmt = $this->conn->prepare($sqlQuery);
    $stmt->execute();
    return $stmt;
}

// GET ONE
function getOne(){
   $sqlQuery = "SELECT id_usuario, nombre, usuario, clave, estado 
   FROM usuario
   WHERE id_usuario = ". $this->id_usuario ;
   $stmt = $this->conn->prepare($sqlQuery);
   $stmt->execute();
   return $stmt;
}


  // create new  record
  function create(){
   try{
   // insert query
      $query = "INSERT INTO usuario( 
                           nombre,
                           usuario,
                           clave, 
                           estado) 
                           VALUES (
                           :nombre,
                           :usuario, 
                           :clave,
                           :estado)";
      
      
   // prepare the query
   $stmt = $this->conn->prepare($query);

   // sanitize
   
$this->nombre=htmlspecialchars(strip_tags($this->nombre));
$this->usuario=htmlspecialchars(strip_tags($this->usuario));  
$this->clave=htmlspecialchars(strip_tags($this->clave));
$this->estado=htmlspecialchars(strip_tags($this->estado));


$stmt->bindParam(':nombre', $this->nombre);
$stmt->bindParam(':usuario', $this->usuario);
$stmt->bindParam(':clave', $this->clave);
$stmt->bindParam(':estado', $this->estado);
   
   // execute the query, also check if query was successful
   if($stmt->execute()){
    
       return true;
   }
   
}catch(PDOException $exception){
   wh_log( date("y-m-d H:i:s"). " - ".   "Error al insertar datos usuario 5 ".  $table );
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
      usuario
       SET 
      nombre  = :nombre,
      usuario = :usuario,
      clave = :clave ,
      estado = :estado WHERE id_usuario = :id_usuario" ;
      
      
   // prepare the query
   $stmt = $this->conn->prepare($query);

   // sanitize
   
$this->id_usuario=htmlspecialchars(strip_tags($this->id_usuario));
$this->nombre=htmlspecialchars(strip_tags($this->nombre));
$this->usuario=htmlspecialchars(strip_tags($this->usuario));  
$this->clave=htmlspecialchars(strip_tags($this->clave));
$this->estado=htmlspecialchars(strip_tags($this->estado));

$stmt->bindParam(':id_usuario', $this->id_usuario);
$stmt->bindParam(':nombre', $this->nombre);
$stmt->bindParam(':usuario', $this->usuario);
$stmt->bindParam(':clave', $this->clave);
$stmt->bindParam(':estado', $this->estado);
   
   // execute the query, also check if query was successful
   if($stmt->execute()){
    
       return true;
   }
   
}catch(PDOException $exception){
   wh_log( date("y-m-d H:i:s"). " - ".   "Error al insertar datos usuario 5 ".  $table );
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
      usuario
       SET 
      estado = :estado WHERE id_usuario = :id_usuario" ;
      
      
   // prepare the query
   $stmt = $this->conn->prepare($query);

   // sanitize
   
$this->id_usuario=htmlspecialchars(strip_tags($this->id_usuario));
$this->estado=htmlspecialchars(strip_tags($this->estado));

$stmt->bindParam(':id_usuario', $this->id_usuario);
$stmt->bindParam(':estado', $this->estado);
   
   // execute the query, also check if query was successful
   if($stmt->execute()){
    
       return true;
   }
   
}catch(PDOException $exception){
   wh_log( date("y-m-d H:i:s"). " - ".   "Error al insertar datos usuario 5 ".  $table );
   wh_log( $exception   );
   
   
   return false;
}

   return false;
} 


}





?>
