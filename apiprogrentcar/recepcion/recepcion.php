<?php

class recepcion {

private $conn;

public $id_recepcion;
public $nombre;
public $recepcion;
public $clave;
public $estado;

     // constructor
public function __construct($db){
        $this->conn = $db;
}

 // GET ALL
 function getAll(){
    $sqlQuery = "SELECT id_recepcion, id_renta, id_cliente, monto_recepcion, 
    nivel_tanque, kilometro_llegada, fecha_entrada, hora_entrada, minuto_entrada, horario_entrada
    FROM recepcion";
    $stmt = $this->conn->prepare($sqlQuery);
    $stmt->execute();
    return $stmt;
}

// GET ONE
function getOne(){
    $sqlQuery = "SELECT id_recepcion, id_renta, id_cliente, monto_recepcion, 
    nivel_tanque, kilometro_llegada, fecha_entrada, hora_entrada, minuto_entrada, horario_entrada
    FROM recepcion
   WHERE id_recepcion = ". $this->id_recepcion ;
   $stmt = $this->conn->prepare($sqlQuery);
   $stmt->execute();
   return $stmt;
}


  // create new  record
  function create(){
   try{
   // insert query
      $query = "INSERT INTO recepcion( 
                           id_renta,
                           id_cliente,
                           monto_recepcion,
                           nivel_tanque,
                           kilometro_llegada,
                           fecha_entrada, 
                           hora_entrada,
                           minuto_entrada,
                           horario_entrada) 
                           VALUES (
                           :id_renta,
                           :id_cliente,
                           :monto_recepcion,
                           :nivel_tanque,
                           :kilometro_llegada,
                           :fecha_entrada, 
                           :hora_entrada,
                           :minuto_entrada,
                           :horario_entrada)"; 
      
   // prepare the query
   $stmt = $this->conn->prepare($query);

   // sanitize
   
$this->id_renta=htmlspecialchars(strip_tags($this->id_renta));  
$this->id_cliente=htmlspecialchars(strip_tags($this->id_cliente));
$this->monto_recepcion=htmlspecialchars(strip_tags($this->monto_recepcion));
$this->nivel_tanque=htmlspecialchars(strip_tags($this->nivel_tanque));
$this->kilometro_llegada=htmlspecialchars(strip_tags($this->kilometro_llegada));
$this->fecha_entrada=htmlspecialchars(strip_tags($this->fecha_entrada));
$this->hora_entrada=htmlspecialchars(strip_tags($this->hora_entrada));
$this->minuto_entrada=htmlspecialchars(strip_tags($this->minuto_entrada));
$this->horario_entrada=htmlspecialchars(strip_tags($this->horario_entrada));

$stmt->bindParam(':id_renta', $this->id_renta);
$stmt->bindParam(':id_cliente', $this->id_cliente);
$stmt->bindParam(':monto_recepcion', $this->monto_recepcion);
$stmt->bindParam(':kilomentro_llegada', $this->kilometro_llegada);
$stmt->bindParam(':nivel_tanque', $this->nivel_tanque);
$stmt->bindParam(':fecha_entrada', $this->fecha_entrada);
$stmt->bindParam(':hora_entrada', $this->hora_entrada);
$stmt->bindParam(':minuto_entrada', $this->minuto_entrada);
$stmt->bindParam(':horario_entrada', $this->horario_entrada);
   
   // execute the query, also check if query was successful
   if($stmt->execute()){
    
       return true;
   }
   
}catch(PDOException $exception){
   wh_log( date("y-m-d H:i:s"). " - ".   "Error al insertar datos recepcion 5 ".  $table );
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
      recepcion
       SET 
         id_renta          = :id_renta,
         id_cliente        = :idcliente,
         monto_recepcion   = :monto_recepcion,
         nivel_tanque      = :nivel_tanque,
         kilometro_llegada = :kilometro_llegada,
         fecha_entrada     = :fecha_entrada,
         hora_entrada      = :hora_entrada,
         minuto_entrada    = :minuto_entrada,
         horario_entrada   = :horario_entrada
       WHERE id_recepcion  = :id_recepcion" ;
      
      
   // prepare the query
   $stmt = $this->conn->prepare($query);

   // sanitize
   
$this->id_recepcion=htmlspecialchars(strip_tags($this->id_recepcion));  
$this->id_renta=htmlspecialchars(strip_tags($this->id_renta));  
$this->id_cliente=htmlspecialchars(strip_tags($this->id_cliente));
$this->monto_recepcion=htmlspecialchars(strip_tags($this->monto_recepcion));
$this->nivel_tanque=htmlspecialchars(strip_tags($this->nivel_tanque));
$this->kilometro_llegada=htmlspecialchars(strip_tags($this->kilometro_llegada));
$this->fecha_entrada=htmlspecialchars(strip_tags($this->fecha_entrada));
$this->hora_entrada=htmlspecialchars(strip_tags($this->hora_entrada));
$this->minuto_entrada=htmlspecialchars(strip_tags($this->minuto_entrada));
$this->horario_entrada=htmlspecialchars(strip_tags($this->horario_entrada));

$stmt->bindParam(':id_renta', $this->id_renta);
$stmt->bindParam(':id_cliente', $this->id_cliente);
$stmt->bindParam(':monto_recepcion', $this->monto_recepcion);
$stmt->bindParam(':kilomentro_llegada', $this->kilometro_llegada);
$stmt->bindParam(':nivel_tanque', $this->nivel_tanque);
$stmt->bindParam(':fecha_entrada', $this->fecha_entrada);
$stmt->bindParam(':hora_entrada', $this->hora_entrada);
$stmt->bindParam(':minuto_entrada', $this->minuto_entrada);
$stmt->bindParam(':horario_entrada', $this->horario_entrada);
   
   // execute the query, also check if query was successful
   if($stmt->execute()){
    
       return true;
   }
   
}catch(PDOException $exception){
   wh_log( date("y-m-d H:i:s"). " - ".   "Error al insertar datos recepcion 5 ".  $table );
   wh_log( $exception   );
   
   
   return false;
}

   return false;
} 

}





?>
