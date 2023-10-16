<?php

class vehiculo {

private $conn;

public $id_vehiculo;
public $numbero_ficha;
public $id_marca;
public $id_modelo;
public $minimo_deposito;
public $color;
public $chasis;
public $placa;
public $kms;
public $ano;
public $matricula;
public $cilindros;
public $estado;


// constructor
public function __construct($db){
        $this->conn = $db;
}

 // GET ALL
 function getAll(){          
    $sqlQuery = "SELECT id_vehiculo, numbero_ficha, id_marca, id_modelo  ,   minimo_deposito  ,   color  ,   chasis  ,   placa  ,   kms  ,   ano  ,   matricula  ,   cilindros  , estado 
    FROM vehiculos";
    $stmt = $this->conn->prepare($sqlQuery);
    $stmt->execute();
    return $stmt;
}

// GET ONE
function getOne(){
    $sqlQuery = "SELECT id_vehiculo, numbero_ficha, id_marca, id_modelo  ,   minimo_deposito  ,   color  ,   chasis  ,   placa  ,   kms  ,   ano  ,   matricula  ,   cilindros  , estado 
    FROM vehiculos
    WHERE id_vehiculo = ". $this->id_vehiculo;
   $stmt = $this->conn->prepare($sqlQuery);
   $stmt->execute();
   return $stmt;
}


  // create new  record
  function create(){
   try{
   // insert query
      $query = "INSERT INTO vehiculos(
                           numbero_ficha,
                           id_marca,
                           id_modelo,
                           minimo_deposito,
                           color,
                           chasis,
                           placa,
                           kms,
                           ano,
                           matricula,
                           cilindros,
                           estado) 
                           VALUES (
                           :numbero_ficha,
                           :id_marca,
                           :id_modelo,
                           :minimo_deposito,
                           :color,
                           :chasis,
                           :placa,
                           :kms,
                           :ano,
                           :matricula,
                           :cilindros,
                           :estado)"; 
      
      
   // prepare the query
   $stmt = $this->conn->prepare($query);

   // sanitize
   
$this->numbero_ficha=htmlspecialchars(strip_tags($this->numbero_ficha));  
$this->id_marca=htmlspecialchars(strip_tags($this->id_marca));  
$this->id_modelo=htmlspecialchars(strip_tags($this->id_modelo));
$this->minimo_deposito=htmlspecialchars(strip_tags($this->minimo_deposito));
$this->color=htmlspecialchars(strip_tags($this->color));
$this->chasis=htmlspecialchars(strip_tags($this->chasis));
$this->placa=htmlspecialchars(strip_tags($this->placa));
$this->kms=htmlspecialchars(strip_tags($this->kms));
$this->ano=htmlspecialchars(strip_tags($this->ano));
$this->matricula=htmlspecialchars(strip_tags($this->matricula));
$this->cilindros=htmlspecialchars(strip_tags($this->cilindros));
$this->estado=htmlspecialchars(strip_tags($this->estado));


$stmt->bindParam(':numbero_ficha', $this->fecha);
$stmt->bindParam(':numbero_ficha', $this->numbero_ficha);
$stmt->bindParam(':id_marca', $this->id_marca);
$stmt->bindParam(':minimo_deposito', $this->minimo_deposito);
$stmt->bindParam(':color', $this->color);
$stmt->bindParam(':chasis', $this->chasis);
$stmt->bindParam(':placa', $this->placa);
$stmt->bindParam(':kms', $this->kms);
$stmt->bindParam(':ano', $this->ano);
$stmt->bindParam(':matricula', $this->matricula);
$stmt->bindParam(':cilindros', $this->cilindros);
$stmt->bindParam(':estado', $this->estado);
   
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
       vehiculo
       SET 
      fecha = :fecha,
      monto = :monto,
      id_usuario = :id_usuario WHERE id_vehiculo = :id_vehiculo" ;
      
      
   // prepare the query
   $stmt = $this->conn->prepare($query);

$this->id_vehiculo=htmlspecialchars(strip_tags($this->id_vehiculo));
$this->numbero_ficha=htmlspecialchars(strip_tags($this->numbero_ficha));  
$this->id_marca=htmlspecialchars(strip_tags($this->id_marca));  
$this->id_modelo=htmlspecialchars(strip_tags($this->id_modelo));
$this->minimo_deposito=htmlspecialchars(strip_tags($this->minimo_deposito));
$this->color=htmlspecialchars(strip_tags($this->color));
$this->chasis=htmlspecialchars(strip_tags($this->chasis));
$this->placa=htmlspecialchars(strip_tags($this->placa));
$this->kms=htmlspecialchars(strip_tags($this->kms));
$this->ano=htmlspecialchars(strip_tags($this->ano));
$this->matricula=htmlspecialchars(strip_tags($this->matricula));
$this->cilindros=htmlspecialchars(strip_tags($this->cilindros));
$this->estado=htmlspecialchars(strip_tags($this->estado));


$stmt->bindParam(':id_vehiculo', $this->id_vehiculo);
$stmt->bindParam(':numbero_ficha', $this->numbero_ficha);
$stmt->bindParam(':id_marca', $this->id_marca);
$stmt->bindParam(':minimo_deposito', $this->minimo_deposito);
$stmt->bindParam(':color', $this->color);
$stmt->bindParam(':chasis', $this->chasis);
$stmt->bindParam(':placa', $this->placa);
$stmt->bindParam(':kms', $this->kms);
$stmt->bindParam(':ano', $this->ano);
$stmt->bindParam(':matricula', $this->matricula);
$stmt->bindParam(':cilindros', $this->cilindros);
$stmt->bindParam(':estado', $this->estado);
   
   // execute the query, also check if query was successful
   if($stmt->execute()){
    
      return true;
  }
  
}catch(PDOException $exception){
  wh_log( date("y-m-d H:i:s"). " - ".   "Error al insertar datos vehiculos 5 ".  $table );
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
      vehiculos
       SET     
       numbero_ficha  =  :numbero_ficha,
       id_marca = :id_marca,
       id_modelo = :id_modelo,
       minimo_deposito = :minimo_deposito,
       color = :color,
       chasis = :chasis,
       placa = :placa,
       kms = :kms,
       ano = :ano,
       matricula =  :matricula,
       cilindros = :cilindros,
      estado = :estado WHERE id_vehiculo = :id_vehiculo" ;
      
      
   // prepare the query
   $stmt = $this->conn->prepare($query);

   // sanitize
   
$this->id_vehiculo=htmlspecialchars(strip_tags($this->id_vehiculo));
$this->estado=htmlspecialchars(strip_tags($this->estado));

$stmt->bindParam(':id_vehiculo', $this->id_vehiculo);
$stmt->bindParam(':estado', $this->estado);
   
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


}





?>
