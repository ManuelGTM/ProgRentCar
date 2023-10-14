<?php

class saldo {

private $conn;

public $id_saldo;
public $fecha;
public $monto;
public $id_usuario;
public $estado;

     // constructor
public function __construct($db){
        $this->conn = $db;
}

 // GET ALL
 function getAll(){
    $sqlQuery = "SELECT id_saldo, fecha, monto, id_usuario FROM saldo_inicial";
    $stmt = $this->conn->prepare($sqlQuery);
    $stmt->execute();
    return $stmt;
}

// GET ONE
function getOne(){
    $sqlQuery = "SELECT id_saldo, fecha, monto, id_usuario 
    FROM saldo_inicial
    WHERE id_saldo = ". $this->id_saldo;
   $stmt = $this->conn->prepare($sqlQuery);
   $stmt->execute();
   return $stmt;
}


  // create new  record
  function create(){
   try{
   // insert query
      $query = "INSERT INTO saldo_inicial(
                           fecha, 
                           monto, 
                           id_usuario) 
                           VALUES (
                           :fecha, 
                           :monto, 
                           :id_usuario)"; 
      
      
   // prepare the query
   $stmt = $this->conn->prepare($query);

   // sanitize
   
$this->fecha=htmlspecialchars(strip_tags($this->fecha));  
$this->monto=htmlspecialchars(strip_tags($this->monto));  
$this->id_usuario=htmlspecialchars(strip_tags($this->id_usuario));


$stmt->bindParam(':fecha', $this->fecha);
$stmt->bindParam(':monto', $this->monto);
$stmt->bindParam(':id_usuario', $this->id_usuario);
   
   // execute the query, also check if query was successful
   if($stmt->execute()){
    
       return true;
   }
   
}catch(PDOException $exception){
   wh_log( date("y-m-d H:i:s"). " - ".   "Error al insertar datos saldo 5 ". $table);
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
       saldo_inicial
       SET 
      fecha = :fecha,
      monto = :monto,
      id_usuario = :id_usuario WHERE id_saldo = :id_saldo" ;
      
      
   // prepare the query
   $stmt = $this->conn->prepare($query);

   // sanitize
   
$this->id_saldo=htmlspecialchars(strip_tags($this->id_saldo));
$this->fecha=htmlspecialchars(strip_tags($this->fecha));  
$this->monto=htmlspecialchars(strip_tags($this->monto));  
$this->id_usuario=htmlspecialchars(strip_tags($this->id_usuario));

$stmt->bindParam(':id_saldo', $this->id_saldo);
$stmt->bindParam(':fecha', $this->fecha);
$stmt->bindParam(':monto', $this->monto);
$stmt->bindParam(':id_usuario', $this->id_usuario);
   
   // execute the query, also check if query was successful
   if($stmt->execute()){
    
       return true;
   }
   
}catch(PDOException $exception){
   wh_log( date("y-m-d H:i:s"). " - ".   "Error al insertar datos saldo 5 ".  $table );
   wh_log( $exception   );
   
   
   return false;
}

   return false;
} 


//   // create new  estado
//   function estado(){
//    try{
//    // insert query
//       $query = "UPDATE 
//       saldo_inicial
//        SET 
//       estado = :estado WHERE id_saldo = :id_saldo" ;
      
      
//    // prepare the query
//    $stmt = $this->conn->prepare($query);

//    // sanitize
   
// $this->id_saldo=htmlspecialchars(strip_tags($this->id_saldo));
// $this->estado=htmlspecialchars(strip_tags($this->estado));

// $stmt->bindParam(':id_saldo', $this->id_saldo);
// $stmt->bindParam(':estado', $this->estado);
   
//    // execute the query, also check if query was successful
//    if($stmt->execute()){
    
//        return true;
//    }
   
// }catch(PDOException $exception){
//    wh_log( date("y-m-d H:i:s"). " - ".   "Error al insertar datos saldo 5 ".  $table );
//    wh_log( $exception   );
   
   
//    return false;
// }

//    return false;
// } 


}





?>
