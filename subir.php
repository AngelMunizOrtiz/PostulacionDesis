<?php

include 'conex/conexion.php';

if ( isset( $_POST[ 'fname' ] ) && isset( $_POST[ 'fAlias' ] )  && isset( $_POST[ 'fRut' ] )  && isset( $_POST[ 'fEmail' ] )
&& isset( $_POST[ 'lista1' ] )  && isset( $_POST[ 'lista2' ] ) && isset( $_POST[ 'fCandidato' ] ) ) {

    $nombre = $_POST[ 'fname' ];
    $alias = $_POST[ 'fAlias' ];
    $rut = $_POST[ 'fRut' ];
    $correo = $_POST[ 'fEmail' ];

    $a = implode( ',', $_POST[ 'id' ] );
    echo $a;

    $region = $_POST[ 'lista1' ];
    $comuna = $_POST[ 'lista2' ];

    if ( $region == 1 ) {
        $regElegida = 'Arica';

        if ( $comuna == 1 ) {
            $comunEleg = 'General Lagos';

        } elseif ( $comuna == 2 ) {
            $comunEleg = 'Putre';

        } elseif ( $comuna == 3 ) {
            $comunEleg = 'Camarones';

        } elseif ( $comuna == 4 ) {
            $comunEleg = 'Arica';

        }

    } else {
        $regElegida = 'Tarapaca';
        if ( $comuna == 21 ) {
            $comunEleg = 'Cauquenes';

        } elseif ( $comuna == 22 ) {
            $comunEleg = 'Pelluhue';

        } elseif ( $comuna == 23 ) {
            $comunEleg = 'Lagos';

        }

    }

    $candidato = $_POST[ 'fCandidato' ];

    $datosduplicados = mysqli_query( $mysqli, "SELECT * FROM infoVotos WHERE rut='$rut'" );

    if ( mysqli_num_rows( $datosduplicados ) > 0 ) {

        /* Si el Rut se repite mostraremos una alerta de que no se puede votar mas de 2 veces con el mismo rut*/

        echo'<script type="text/javascript">
    alert("No puedes votar mas de 2 veces");
    window.location.href="index.php";
    </script>';

    } else {

        // Si el Rut  no se repite pues se registrara sin problema a la BD
        $sql = "INSERT INTO infoVotos(rut,nombreApellido,alias,email,region,comuna,candidato,comentarios) VALUES ('$rut', '$nombre', '$alias','$correo', '$regElegida', '$comunEleg','$candidato','$a')";
        $ejecutar = mysqli_query( $mysqli, $sql );

        echo'<script type="text/javascript">
    alert("Voto Guardado");
    window.location.href="index.php";
    </script>';
    }

} else {

    echo'<script type="text/javascript">
alert("Debes seguir el procedimiento adecuado");
window.location.href="index.php";
</script>';

}