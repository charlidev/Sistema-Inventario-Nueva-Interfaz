<?php
$serverName = "DESKTOP-RFI1D63";
$connectionInfo = array("Database"=>"Sistema_Inventario", "UID"=>"sa", "PWD"=>"12345");

$conn = sqlsrv_connect($serverName, $connectionInfo);

if ($conn) {
  echo "Conexión establecida.";
} else {
  echo "Conexión no se pudo establecer.";
  die(print_r(sqlsrv_errors(), true));
}
?>