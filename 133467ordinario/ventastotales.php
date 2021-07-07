<?php
session_start();// variable de sesion
if (!isset($_SESSION['nombre'])) {
	header('location: login.php');// tambien hace un direccionamiento hacia una pagina.
}else{
	$usuacrioactivo=$_SESSION['nombre'];
	$idusuario=$_SESSION['id'];
}

?>
<html>

<head>
<title> Ventas totales</title>
<link rel="stylesheet" type "text/css" href="estilos.css">
</head>

<body >
<div class = "banner">
    
        <img src="banner.png">
    </div>

<div class="barranavegacionventas">
            <div>
            <a href="index.php">Home</a></br>
        </div>
        <div>
            <a href="ventasdia.php">Ventas por día </a></br>
        </div>

        <div>
            <a href="ventastotales.php">Ventas totales </a></br>
        </div>
        
        <div><a href="cerrar.php"> Cerrar Sesion </a> </div>
       
 </div>
<?php   


$servername= "localhost";
$database= "133467ordinario";
$username= "root";
$password= "";

echo "<div class=\"consulta\">";

$conn = mysqli_connect($servername,$username,$password,$database);
if (!$conn){
 die ("Conexion fallida....".mysqli_connect_error());

 } echo "<div>Conexion Exitosa.........";



 echo 'Conectado a la base de datos.<br>';

 //me devuelve un array 
  $result = $conn->query("SELECT *  FROM ventas");

  echo "Numero de resultados: $result->num_rows <br></div>";


 echo "<div class=\"consulta\"> <table>
  <tr>
    <td><strong>Id</strong></td>
    <td><strong>Fecha</strong></td>
    <td><strong>Tipo</strong></td>
    <td><strong>Precio</strong></td>
    <td><strong>Cantidad</strong></td>
    <td><strong>Descuento</strong></td>
    <td><strong>Total</strong></td>
  </tr>";

$total=0.0;

  foreach ($result as $row) {
    $total= $total + $row['total'];

echo "
    <tr>
    <td>".$row['id']."</td>
    <td>".$row['fecha']."</td>
    <td>".$row['tipo']."</td>
    <td>$".$row['precio']."</td>
    <td>".$row['cantidad']." litros</td>
    <td>".$row['descuento']." %</td>
    <td>$".$row['total']."</td>
    </tr>";
   
   
        
}

echo "<tr><td></td><td></td><td></td><td></td><td></td><td></td>
<td>
total = $".$total."
</td></tr></table></div>";


             $result->close();

             $conn->close();
             echo "</div >";
?>
<div class="consulta">
     <form action="borrar.php"  method="POST">
         <center>
         
     <label for "idregistro"> Introduzca un id para borrar registro </label>
                <input type="text" name="idregistro" required>
                <button type="submit"> Enviar id</button>
             
</center>
     </form>
    
     </div>


<div class= "detallesventa"><strong>Alumno:</strong> Benjamín Joaquín Martinez
           <strong> Matricula:</strong> 133467</Strong>
        </div>



</body>