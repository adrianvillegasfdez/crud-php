<?php
//Incluye fichero con parámetros de conexión a la base de datos
include_once("config.php");

/*Comprueba si hemos llegado a esta página PHP a través del formulario de modificaciones. 
En este caso comprueba la información "modifica" procedente del botón Guardae del formulario de Modificaciones
Transacción de datos utilizando el método: POST
*/
if(isset($_POST['modifica'])) {
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$nombre = mysqli_real_escape_string($mysqli, $_POST['nombre']);
	$edad = mysqli_real_escape_string($mysqli, $_POST['edad']);
	$nacionalidad = mysqli_real_escape_string($mysqli, $_POST['nacionalidad']);
	$escuderia = mysqli_real_escape_string($mysqli, $_POST['escuderia']);
	$numero = mysqli_real_escape_string($mysqli, $_POST['numero']);
	$victorias = mysqli_real_escape_string($mysqli, $_POST['victorias']);
	$campeonatos = mysqli_real_escape_string($mysqli, $_POST['campeonatos']);
	$estado = mysqli_real_escape_string($mysqli, $_POST['estado']);

	if(empty($nombre) || empty($edad) || empty($nacionalidad) || empty($escuderia) || empty($numero) || empty($victorias) || empty($campeonatos) || empty($estado))	{
		if(empty($nombre)) {
			echo "<font color='red'>Campo nombre vacío.</font><br/>";
		}

		if(empty($edad)) {
			echo "<font color='red'>Campo edad vacío.</font><br/>";
		}

		if(empty($nacionalidad)) {
			echo "<font color='red'>Campo nacionalidad vacío</font><br/>";
		}

		if(empty($escuderia)) {
			echo "<font color='red'>Campo escudería vacío</font><br/>";
		}

		if(empty($numero)) {
			echo "<font color='red'>Campo número vacío</font><br/>";
		}

		if(empty($victorias)) {
			echo "<font color='red'>Campo victorias vacío</font><br/>";
		}

		if(empty($campeonatos)) {
			echo "<font color='red'>Campo campeonatos vacío</font><br/>";
		}

		if(empty($estado)) {
			echo "<font color='red'>Campo estado vacío</font><br/>";
		}

		
	} //fin si
	else 
	{
//Prepara una sentencia SQL para su ejecución. En este caso una modificación de un registro de la BD.				
		$stmt = mysqli_prepare($mysqli, "UPDATE pilotos SET nombre=?,edad=?,nacionalidad=?,escuderia=?,numero=?,victorias=?,campeonatos=?,estado=? WHERE id=?");
/*Enlaza variables como parámetros a una setencia preparada. 
i: La variable correspondiente tiene tipo entero
d: La variable correspondiente tiene tipo doble
s:	La variable correspondiente tiene tipo cadena
*/				
		mysqli_stmt_bind_param($stmt, "sissiiisi", $nombre, $edad, $nacionalidad, $escuderia, $numero, $victorias, $campeonatos, $estado, $id);
//Ejecuta una consulta preparada			
		mysqli_stmt_execute($stmt);
//Libera la memoria donde se almacenó el resultado
		mysqli_stmt_free_result($stmt);
//Cierra la sentencia preparada		
		mysqli_stmt_close($stmt);

		header("Location: index.php");
	}// fin sino
}//fin si
?>


<?php
/*Obtiene el id del dato a modificar a partir de la URL. Transacción de datos utilizando el método: GET*/
$id = $_GET['id'];

$id = mysqli_real_escape_string($mysqli, $id);


//Prepara una sentencia SQL para su ejecución. En este caso selecciona el registro a modificar y lo muestra en el formulario.				
$stmt = mysqli_prepare($mysqli, "SELECT nombre, edad, nacionalidad, escuderia, numero, victorias, campeonatos, estado FROM pilotos WHERE id=?");
//Enlaza variables como parámetros a una setencia preparada. 
mysqli_stmt_bind_param($stmt, "i", $id);
//Ejecuta una consulta preparada
mysqli_stmt_execute($stmt);
//Enlaza variables a una setencia preparada para el almacenamiento del resultado
mysqli_stmt_bind_result($stmt, $nombre, $edad, $nacionalidad, $escuderia, $numero, $victorias, $campeonatos, $estado);
//Obtiene el resultado de una sentencia SQL preparada en las variables enlazadas
mysqli_stmt_fetch($stmt);
//Libera la memoria donde se almacenó el resultado		
mysqli_stmt_free_result($stmt);
//Cierra la sentencia preparada
mysqli_stmt_close($stmt);
//Cierra la conexión de base de datos previamente abierta
mysqli_close($mysqli);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>Modificación piloto</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
<!--	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
-->
</head>

<body>
<!--	
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
-->
<div>
	<header>
		<h1>Listado de pilotos</h1>
	</header>
	
	<main>				
	<ul>
		<li><a href="index.php" >Inicio</a></li>
		<li><a href="add.html" >Alta</a></li>
	</ul>
	<h2>Modificación piloto</h2>
<!--Formulario de edición. 
Al hacer click en el botón Guardar, llama a esta misma página: edit.php-->
	<form action="edit.php" method="post">
		<div>
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" id="nombre" value="<?php echo $nombre;?>" required>
		</div>

		<div>
			<label for="edad">Edad</label>
			<input type="number" name="edad" id="edad" value="<?php echo $edad;?>" required>
		</div>

		<div>
			<label for="nacionalidad">Nacionalidad</label>
			<input type="text" name="nacionalidad" id="nacionalidad" value="<?php echo $nacionalidad;?>" required>
		</div>

		<div>
			<label for="escuderia">Escuderia</label>
			<input type="text" name="escuderia" id="escuderia" value="<?php echo $escuderia;?>" required>
		</div>

		<div>
			<label for="numero">Número</label>
			<input type="number" name="numero" id="numero" value="<?php echo $numero;?>" required>
		</div>

		<div>
			<label for="victorias">Victorias</label>
			<input type="number" name="victorias" id="victorias" value="<?php echo $victorias;?>" required>
		</div>

		<div>
			<label for="campeonatos">Campeonatos</label>
			<input type="number" name="campeonatos" id="campeonatos" value="<?php echo $campeonatos;?>" required>
		</div>

		<div>
			<label for="estado">Estado</label>
			<input type="text" name="estado" id="estado" value="<?php echo $estado;?>" required>
		</div>

		<div >
			<input type="hidden" name="id" value=<?php echo $id;?>>
			<input type="submit" name="modifica" value="Guardar">
			<!--<input type="button" value="Cancelar" onclick="location.href='index.php'">-->
		</div>
	</form>

	</main>	
	<footer>
	<!--Created by the IES Miguel Herrero team &copy; 2024-->
  	</footer>
</div>
</body>
</html>
