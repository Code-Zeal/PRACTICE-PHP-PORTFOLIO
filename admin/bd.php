<?php
$servidor="localhost";
$baseDeDatos="website";
$usuario="root";
$contrasenia="";

try {
  $conexion=new PDO("mysql:host=$servidor;dbname=$baseDeDatos",$usuario,$contrasenia);
} catch (Exeption $error) {
  echo $error->getMessage();
  
}
?>