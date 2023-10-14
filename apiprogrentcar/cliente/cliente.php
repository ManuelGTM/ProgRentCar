<?php

class cliente {

private $conn;

public $id_cliente;
public $nombre;
public $apellido;
public $tipo_identificacion;
public $numero_identificacion;
public $sexo;
public $whatsapp;
public $correo;
public $telefono1;
public $telefono2;
public $estado;

     // constructor
public function __construct($db){
        $this->conn = $db;
}

 // GET ALL
 function getAll(){
    $sqlQuery = "SELECT id_cliente, nombre, apellido, tipo_identificacion, 
    numero_identificacion, sexo, whatsapp, correo, telefono1, telefono2, estado 
    FROM cliente";
    $stmt = $this->conn->prepare($sqlQuery);
    $stmt->execute();
    return $stmt;
}

// GET ONE
function getOne(){
   $sqlQuery = "SELECT id_cliente, nombre, apellido, tipo_identificacion, 
   numero_identificacion, sexo, whatsapp, correo, telefono1, telefono2, estado 
   FROM cliente
   WHERE id_cliente = ". $this->id_cliente;
   $stmt = $this->conn->prepare($sqlQuery);
   $stmt->execute();
   return $stmt;
}


  // create new  record
  function create(){
   try{
   // insert query
      $query = "INSERT INTO(nombre, 
                           apellido, 
                           tipo_identificacion, 
                           numero_identificacion, 
                           sexo, 
                           whatsapp, 
                           correo, 
                           telefono1, 
                           telefono2, 
                           estado) 
                           VALUES(
                           :nombre, 
                           :apellido, 
                           :tipo_identificacion, 
                           :numero_identificacion, 
                           :sexo, 
                           :whatsapp, 
                           :correo, 
                           :telefono1, 
                           :telefono2, 
                           :estado)"; 
      
      
   // prepare the query
   $stmt = $this->conn->prepare($query);

   // sanitize
   
$this->nombre=htmlspecialchars(strip_tags($this->nombre));
$this->apellido=htmlspecialchars(strip_tags($this->apellido));  
$this->tipo_identificacion=htmlspecialchars(strip_tags($this->tipo_identificacion));
$this->numero_identificacion=htmlspecialchars(strip_tags($this->numero_identificacion));
$this->sexo=htmlspecialchars(strip_tags($this->sexo));
$this->whatsapp=htmlspecialchars(strip_tags($this->whatsapp));
$this->correo=htmlspecialchars(strip_tags($this->correo));
$this->telefono1=htmlspecialchars(strip_tags($this->telefono1));
$this->telefono2=htmlspecialchars(strip_tags($this->telefono2));
$this->estado=htmlspecialchars(strip_tags($this->estado));


$stmt->bindParam(':nombre', $this->nombre);
$stmt->bindParam(':apellido', $this->apellido);
$stmt->bindParam(':tipo_identificacion', $this->tipo_identificacion);
$stmt->bindParam(':numero_identificacion', $this->numero_identificacion);
$stmt->bindParam(':sexo', $this->sexo);
$stmt->bindParam(':whatsapp', $this->whatsapp);
$stmt->bindParam(':correo', $this->correo);
$stmt->bindParam(':telefono1', $this->telefono1);
$stmt->bindParam(':telefono2', $this->telefono2);
$stmt->bindParam(':estado', $this->estado);
   
   if($stmt->execute()){
    
       return true;
   }
   
}catch(PDOException $exception){
   wh_log( date("y-m-d H:i:s"). " - ".   "Error al insertar datos usuario 5 ");
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
      cliente
       SET 
      nombre  = :nombre,
      apellido = :apellido,
      tipo_identificacion = :tipo_identificacion ,
      numero_identificacion = :numero_identificacion,
      sexo = :sexo,
      whatsapp = :whatsapp,
      correo = :correo,
      telefono1 = :telefono1,
      telefono2 = :telefono2,
      estado = :estado WHERE id_cliente = :id_cliente" ;
      
      
   // prepare the query
   $stmt = $this->conn->prepare($query);

   // sanitize
   

$this->id_cliente=htmlspecialchars(strip_tags($this->id_cliente));
$this->nombre=htmlspecialchars(strip_tags($this->nombre));
$this->apellido=htmlspecialchars(strip_tags($this->apellido));  
$this->tipo_identificacion=htmlspecialchars(strip_tags($this->tipo_identificacion));
$this->numero_identificacion=htmlspecialchars(strip_tags($this->numero_identificacion));
$this->sexo=htmlspecialchars(strip_tags($this->sexo));
$this->whatsapp=htmlspecialchars(strip_tags($this->whatsapp));
$this->correo=htmlspecialchars(strip_tags($this->correo));
$this->telefono1=htmlspecialchars(strip_tags($this->telefono1));
$this->telefono2=htmlspecialchars(strip_tags($this->telefono2));
$this->estado=htmlspecialchars(strip_tags($this->estado));


$stmt->bindParam(':id_cliente', $this->id_cliente);
$stmt->bindParam(':nombre', $this->nombre);
$stmt->bindParam(':apellido', $this->apellido);
$stmt->bindParam(':tipo_identificacion', $this->tipo_identificacion);
$stmt->bindParam(':numero_identificacion', $this->numero_identificacion);
$stmt->bindParam(':sexo', $this->sexo);
$stmt->bindParam(':whatsapp', $this->whatsapp);
$stmt->bindParam(':correo', $this->correo);
$stmt->bindParam(':telefono1', $this->telefono1);
$stmt->bindParam(':telefono2', $this->telefono2);
$stmt->bindParam(':estado', $this->estado);

   
   // execute the query, also check if query was successful
   if($stmt->execute()){
    
       return true;
   }
   
}catch(PDOException $exception){
   wh_log( date("y-m-d H:i:s"). " - ".   "Error al insertar datos apellido 5 ");
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
      cliente
       SET 
      estado = :estado WHERE id_cliente = :id_cliente" ;
      
      
   // prepare the query
   $stmt = $this->conn->prepare($query);

   // sanitize
   
$this->id_cliente=htmlspecialchars(strip_tags($this->id_cliente));
$this->estado=htmlspecialchars(strip_tags($this->estado));

$stmt->bindParam(':id_cliente', $this->id_cliente);
$stmt->bindParam(':estado', $this->estado);
   
   // execute the query, also check if query was successful
   if($stmt->execute()){
    
       return true;
   }
   
}catch(PDOException $exception){
   wh_log( date("y-m-d H:i:s"). " - ".   "Error al insertar datos cliente 5 ");
   wh_log( $exception   );
   
   
   return false;
}

   return false;
} 


}





?>
