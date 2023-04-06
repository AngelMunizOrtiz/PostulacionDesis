<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>


    <div style="padding:20px; border-radius: 1px;">
        <H1>FORMULARIO DE VOTACIÓN: </H1>
        <br>

        <form action="subir.php" method="post" id="primeraSeccion">

            <div style="border-top: 1px solid rgb(193, 193, 193); border-left: 1px solid rgb(193, 193, 193);">

                <label style="width: 20%;" for="fname"> Nombre y Apellido </label>
                <input style="width: 30%;" type="text" id="fname" name="fname" required><br><br>

                <label style="width: 20%;" for="fAlias">Alias </label>
                <input style="width: 30%;" minlength="5" type="text" id="fAlias" name="fAlias"
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}"
                    title="El Alias debe contener 5 caracteres, entre ellos al menos una mayuscula, numero y minusculas"required ><br><br>

                <label style="width: 20%;" for="fRut">RUT </label>
                <input style="width: 30%;" type="text" id="fRut" name="fRut" required><br><br>

                <label style="width: 20%;" for="fEmail">Email </label>
                <input style="width: 30%;" type="email" id="fEmail" name="fEmail"
                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required><br><br>

                <label style="width: 20%;" for="fRegion">Región </label>
                <select id="lista1" name="lista1"> <br> <br>
                <option value="0">Selecciona una opcion</option>

                    <?php
                    include "conex/conexion.php"; 
                    $sql = "SELECT * FROM nombrecandidatos order by IdCandidato";
                    $result = mysqli_query($mysqli, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        $region= $row['Region'];
                        $idCandi= $row['IdCandidato']
         
         ?>

                <?php 
                if ($region != ""){
                ?>
                    <option value="<?php echo $idCandi ?>"> <?php echo  $region ?> </option>
                    
                <?php
                }
            } 
            
            ?>

                </select>
                <br><br>

                <div id="select2lista"></div><br>

                <label style="width: 20%;" for="fCandidato">Candidato </label>
                <select id="fCandidato" name="fCandidato"> <br> <br>
                
                <option value="0">Selecciona un Candidato</option>
                <?php
                include "conex/conexion.php"; 
                $sql3 = "SELECT * FROM nombrecandidatos order by IdCandidato";
                $resultao = mysqli_query($mysqli, $sql3);
                
                while ($row = mysqli_fetch_array($resultao)) {
                    $candidato= $row['nomCandidato'];
                ?>


                    <option value="<?php echo $candidato ?>"> <?php echo  $candidato ?> </option>
                    <?php
                    }
                    ?>
                    
                </select> <br> <br>
                
                <p>Como se enteró de Nosotros

                    <input style="margin-left: 9%;" class="form-check-input" type="checkbox" name="id[]" value="Web"
                        id="checkDatos">
                    <label class="form-check-label" for="checkDatos">
                        Web
                    </label>
                    <input class="form-check-input" type="checkbox" name="id[]" value="TV" id="checkTv">
                    <label class="form-check-label" for="checkTv">
                        TV
                    </label>
                    <input class="form-check-input" type="checkbox" name="id[]" value="Redes Sociales" id="checkRedes">
                    <label class="form-check-label" for="checkRedes">
                        Redes Sociales
                    </label>
                    <input class="form-check-input" type="checkbox" name="id[]" value="Amig@" id="checkAmig">
                    <label class="form-check-label" for="checkAmig">
                        Amigo
                    </label>
                </p>

                <input type="submit" id="btnvalida" disabled value="Votar">

                <p class="text-info" id="msgerror"></p>

            </div>

    </div>

    </form>

</body>




<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/ValidarDato.js"></script>


</html>


<script>
const changeStatusButton = e => {
    document.getElementById("btnvalida").disabled = document.querySelectorAll(".form-check-input:checked").length >=
        2 ? false : true;
}
document.querySelectorAll(".form-check-input").forEach(check => check.addEventListener("change", changeStatusButton));
</script>



<script type="text/javascript">
$(document).ready(function() {
    $('#lista1').val(1);
    recargarLista();

    $('#lista1').change(function() {
        recargarLista();
    });
})
</script>



<script type="text/javascript">
function recargarLista() {
    $.ajax({
        type: "POST",
        url: "datos.php",
        data: "Comuna=" + $('#lista1').val(),
        success: function(r) {
            $('#select2lista').html(r);
        }
    });
}
</script>