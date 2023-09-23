<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../jquery-3.7.0.min.js"></script>
    <script>
        $(document).ready(()=>{
            $("#login").submit(()=>{
                // Escribir un literal, es decir, el paquete que lleva la información del formulario al servidor
                var datosFormulario = {
                    usuario: $("#usuario").val(),
                    contraseña: $("#contraseña").val()
                }

                // Cuando el formulario tiene muchos datos a enviar se puede usar la funcion serialize()
                // var datosFormulario = $(this).serialize();

                // Enviar el paquete al servidor
                $.get("login.php", datosFormulario, procesarDatos);

                // Anular el comportamiento del botón submit ya que nos llevaría a otra página al enviar la información.
                return false;

            });
        });
        // En el parámetro se almacenan los datos devueltos por el servidor
        function procesarDatos (datos_devueltos){
            if(datos_devueltos=="autorizado"){
                $("#contenidos_externos").html("<p>Usuario correcto. Bienvenido.</p>");
            }else{
                $("#contenidos_externos").html("<p>Usuario incorrecto. No estás autorizado</p>");
            }
        }

    </script>
</head>
<body>
    <form action="login.php" method="get" id="login">
        <table>
            <tr>
                <td><label for="usuario">Usuario:</label></td>
                <td><input type="text" name="usuario" id="usuario"></td>
            </tr>
            <tr>
                <td><label for="contraseña">Contraseña:</label></td>
                <td><input type="password" name="contraseña" id="contraseña"></td>
            </tr>
            <tr>
                <td><input type="submit" name="enviar" id="enviar"></td>
            </tr>
        </table>        
    </form>
    <!-- En este div se mostrará la respuesta del servidor sin tener que recargar toda la página-->
    <div id="contenidos_externos"></div>
</body>
</html>