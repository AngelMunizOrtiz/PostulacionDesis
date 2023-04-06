<?php 


include "conex/conexion.php";

$Comuna=$_POST['Comuna'];

	$sql="SELECT id,
			 IdCandidato,
			 Comuna 
		from nombrecandidatos 
		where IdCandidato='$Comuna'";

	$result=mysqli_query($mysqli,$sql);

	$cadena="<label style='width: 20%;'>Comunas</label> 
			<select style='width: 30%;' id='lista2' name='lista2'>";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[2]).'</option>';
	}

	echo  $cadena."</select>";
	

?>