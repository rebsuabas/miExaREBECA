<?php
$db_host="localhost";
$db_user="root";
$db_password="2asir";
$db_name="examen";
$db_table_name="usuarios";
//HE tenido que poner mysqli_connect porque mysql_connect está obsoleto
   $db_connection = mysqli_connect($db_host, $db_user, $db_password,$db_name);

if (!$db_connection) 
   die('No se ha podido conectar a la base de datos');

$subs_name = utf8_decode($_POST['nombre']);
$subs_last = utf8_decode($_POST['apellido']);
$subs_email = utf8_decode($_POST['email']);

$resultado=mysqli_query($db_connection,"SELECT * FROM ".$db_table_name." WHERE Email = '".$subs_email."'");

if (mysqli_num_rows($resultado)>0)
{

header('Location: error.html');

} else {
	
	$insert_value = 'INSERT INTO `' . $db_name . '`.`'.$db_table_name.'` (`Nombre` , `Apellido` , `Email`) VALUES ("' . $subs_name . '", "' . $subs_last . '", "' . $subs_email . '")';

mysqli_select_db($db_connection,$db_name);
$retry_value = mysqli_query($db_connection,$insert_value);

if (!$retry_value) {
   die('Error: ' . mysqli_error($db_connection));
}
	
header('Location: bienvenida.html');

}

mysqli_close($db_connection);

		
?>