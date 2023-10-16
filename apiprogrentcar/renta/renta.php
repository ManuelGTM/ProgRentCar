<?php

class renta {

private $conn;

public $id_renta;
public $tipo_identificacion;
public $identificacion;
public $nombreCliente;
public $licencia_conducir;
public $direccion;
public $telefono1;
public $nacionalidad;
public $id_vehiculo;
public $fecha_salida;
public $fecha_entrada;
public $total_pagar;

     // constructor
public function __construct($db){
        $this->conn = $db;
}

 // GET ALL
 function getAll(){
    $sqlQuery = "SELECT id_renta, tipo_identificacion, identificacion, nombreCliente,
    licencia_conducir, direccion, telefono1, nacionalidad, id_vehiculo, fecha_salida,
    fecha_entrada, total_pagar FROM renta";
    $stmt = $this->conn->prepare($sqlQuery);
    $stmt->execute();
    return $stmt;
}

// GET ONE
function getOne(){
    $sqlQuery = "SELECT id_renta, tipo_identificacion, identificacion, nombreCliente,
    licencia_conducir, direccion, telefono1, nacionalidad, id_vehiculo, fecha_salida,
    fecha_entrada, total_pagar FROM renta
   WHERE id_renta = ". $this->id_renta ;
   $stmt = $this->conn->prepare($sqlQuery);
   $stmt->execute();
   return $stmt;
}


  // create new  record
  function create(){
   try{
   // insert query
      $query = "INSERT INTO renta( 
                           id_cliente,
                           tipo_identificacion,
                           nombreCliente,
                           licencia_conducir,
                           direccion,
                           telefono1,
                           nacionalidad,
                           id_vehiculo,
                           fecha_salida,
                           fecha_entrada,
                           total_pagar) 
                           VALUES (
                           :id_cliente,
                           :tipo_identificacion,
                           :nombreCliente,
                           :licencia_conducir,
                           :direccion,
                           :telefono1,
                           :nacionalidad,
                           :id_vehiculo,
                           :fecha_salida,
                           :fecha_entrada,
                           :total_pagar)"; 
      
      
   // prepare the query
   $stmt = $this->conn->prepare($query);

   // sanitize
   
$this->id_cliente=htmlspecialchars(strip_tags($this->id_cliente));  
$this->tipo_identificacion=htmlspecialchars(strip_tags($this->tipo_identificacion));  
$this->nombreCliente=htmlspecialchars(strip_tags($this->nombreCliente));
$this->licencia_conducir=htmlspecialchars(strip_tags($this->licencia_conducir));
$this->direccion=htmlspecialchars(strip_tags($this->direccion));
$this->telefono1=htmlspecialchars(strip_tags($this->telefono1));
$this->nacionalidad=htmlspecialchars(strip_tags($this->nacionalidad));
$this->id_vehiculo=htmlspecialchars(strip_tags($this->id_vehiculo));
$this->fecha_salida=htmlspecialchars(strip_tags($this->fecha_salida));
$this->fecha_entrada=htmlspecialchars(strip_tags($this->fecha_entrada));
$this->total_pagar=htmlspecialchars(strip_tags($this->total_pagar));


$stmt->bindParam(':id_cliente', $this->id_cliente);
$stmt->bindParam(':nombreCliente', $this->nombreCliente);
$stmt->bindParam(':tipo_identificacion', $this->tipo_identificacion);
$stmt->bindParam(':nombreCliente', $this->nombreCliente);
$stmt->bindParam(':licencia_conducir', $this->licencia_conducir);
$stmt->bindParam(':direccion', $this->direccion);
$stmt->bindParam(':telefono1', $this->telefono1);
$stmt->bindParam(':nacionalidad', $this->nacionalidad);
$stmt->bindParam(':id_vehiculo', $this->id_vehiculo);
$stmt->bindParam(':fecha_salida', $this->fecha_salida);
$stmt->bindParam(':fecha_entrada', $this->fecha_entrada);
$stmt->bindParam(':total_pagar', $this->total_pagar);
   
   // execute the query, also check if query was successful
   if($stmt->execute()){
    
       return true;
   }
   
}catch(PDOException $exception){
   wh_log( date("y-m-d H:i:s"). " - ".   "Error al insertar datos renta 5 ".  $table );
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
      renta
       SET 
      id_cliente   = :id_cliente,                       
      tipo_identificacion = :tipo_identificacion,
      nombreCliente = :nombreCliente,
      licencia_conducir = :licencia_conducir, 
      direccion = :direccion,
      telefono1 = :telefono1, 
      nacionalidad = :nacionalidad,
      id_vehiculo = :id_vehiculo, 
      fecha_salida = :fecha_salida,
      fecha_entrada = :fecha_entrada,
      total_pagar = :total_pagar
      WHERE id_renta = :id_renta" ;
      
      
   // prepare the query
   $stmt = $this->conn->prepare($query);

   // sanitize
   
$this->id_renta=htmlspecialchars(strip_tags($this->id_renta));  
$this->id_cliente=htmlspecialchars(strip_tags($this->id_cliente));  
$this->tipo_identificacion=htmlspecialchars(strip_tags($this->tipo_identificacion));  
$this->nombreCliente=htmlspecialchars(strip_tags($this->nombreCliente));
$this->licencia_conducir=htmlspecialchars(strip_tags($this->licencia_conducir));
$this->direccion=htmlspecialchars(strip_tags($this->direccion));
$this->telefono1=htmlspecialchars(strip_tags($this->telefono1));
$this->nacionalidad=htmlspecialchars(strip_tags($this->nacionalidad));
$this->id_vehiculo=htmlspecialchars(strip_tags($this->id_vehiculo));
$this->fecha_salida=htmlspecialchars(strip_tags($this->fecha_salida));
$this->fecha_entrada=htmlspecialchars(strip_tags($this->fecha_entrada));
$this->total_pagar=htmlspecialchars(strip_tags($this->total_pagar));


$stmt->bindParam(':id_renta', $this->id_renta);
$stmt->bindParam(':id_cliente', $this->id_cliente);
$stmt->bindParam(':nombreCliente', $this->nombreCliente);
$stmt->bindParam(':tipo_identificacion', $this->tipo_identificacion);
$stmt->bindParam(':nombreCliente', $this->nombreCliente);
$stmt->bindParam(':licencia_conducir', $this->licencia_conducir);
$stmt->bindParam(':direccion', $this->direccion);
$stmt->bindParam(':telefono1', $this->telefono1);
$stmt->bindParam(':nacionalidad', $this->nacionalidad);
$stmt->bindParam(':id_vehiculo', $this->id_vehiculo);
$stmt->bindParam(':fecha_salida', $this->fecha_salida);
$stmt->bindParam(':fecha_entrada', $this->fecha_entrad);
$stmt->bindParam(':total_pagar', $this->total_pagar);
   // execute the query, also check if query was successful
   if($stmt->execute()){
    
       return true;
   }
   
}catch(PDOException $exception){
   wh_log( date("y-m-d H:i:s"). " - ".   "Error al insertar datos renta 5 ".  $table );
   wh_log( $exception   );
   
   
   return false;
}

   return false;
} 

}





?>
