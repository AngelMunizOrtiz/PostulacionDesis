var Fn = {
    // Valida el rut con su cadena completa "XXXXXXXX-X"
    validaRut: function (rutCompleto) {
        rutCompleto = rutCompleto.replace("‐", "-");
        if (!/^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test(rutCompleto))
            return false;
        var tmp = rutCompleto.split('-');
        var digv = tmp[1];
        var rut = tmp[0];
        if (digv == 'K') digv = 'k';

        return (Fn.dv(rut) == digv);
    },
    dv: function (T) {
        var M = 0, S = 1;
        for (; T; T = Math.floor(T / 10))
            S = (S + T % 10 * (9 - M++ % 6)) % 11;
        return S ? S - 1 : 'k';
    }
}

$("#btnvalida").click(function () {

    if (Fn.validaRut($("#fRut").val())) {
        
        $("#msgerror").html("El rut ingresado es válido :D");
        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById("primeraSeccion").addEventListener('submit', validarFormulario);
        });
        function validarFormulario(evento) {
            evento.preventDefault();
            var fname = document.getElementById('fname').value;
            var fAlias = document.getElementById('fAlias').value;
            var fRut = document.getElementById('fRut').value;
            var fEmail = document.getElementById('fEmail').value;
            var lista1 = document.getElementById('lista1').value;
            var lista2 = document.getElementById('lista2').value;
            var fCandidato = document.getElementById('fCandidato').value;

            function a(){
                var ids = document.querySelectorAll("input[name='id[]']:checked");
                var a=[];
                for (var i=0; i<ids.length; i++) {
                    a[i] = ids[i].value;
                }
                $.ajax({
                    method: "POST",
                    url: "subir.php",
                    data: {  ids: a }
                })
                .done(function( msg ) {
                    alert( "Data: " + msg );
                });
            }
            this.submit();
        //Si rut es correcto enviara los datos
        };

    } else {
        //Si Rut es incorrecto  mostrara el mensaje de error
        $("#msgerror").html("El Rut no es válido :'( ");
        return false;
    }
});