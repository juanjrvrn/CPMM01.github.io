<!-- <div id="grabar"  -->
<?php

$server = "localhost";
$user = "root";
$pass = "";
$db = "cpmm";

$conexion = new mysqli($server,$user,$pass,$db);
if  (!empty($mysqli->connect_errno)) {
    die('Connect Error: ' . $mysqli->connect_errno);
} else {
 // echo "Conectado";
    if(isset($_POST['nombre'])|| isset($_POST['nombre']) || isset($_POST['telefono']) || isset($_POST['asunto']) || isset($_POST['mensaje']) || isset($_POST['correo']) )
        @$nombre = $_POST['nombre'];
        @$telefono = $_POST['telefono'];
        @$asunto = $_POST['asunto'];
        @$mensaje = $_POST['mensaje'];
        @$correo  = $_POST['correo'];

        $nombre1 = 'nombre';
        $telefono1 = 'telefono';
        $asunto1 = 'asunto';
        $mensaje1 = 'mensaje';
        $correo1  = 'correo';
    
       // echo "isset";

        $sql = "INSERT INTO contactos($nombre1, $correo1, $asunto1, $mensaje1, $telefono1)
        VALUES('$nombre', '$correo', '$asunto', '$mensaje', '$telefono')";
        if (mysqli_query($conexion, $sql)) {

            echo "<script> alert('Mensaje enviado exitosamente');
            location.href = '../contactos.html';   
           </script>";
        } else {
          echo "<script> alert('Error');
            location.href = '../contactos.html';   
           </script>";
          //  echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
        }
        //PREPARA CORREO
        $email_from = 'juanriveron1206@gmail.com';
        $email_subject = "Nuevo mensaje de formulario";
        $email_body = "Ha recibido un nuevo mensaje de $nombre \n"."Correo: $correo \n"."Teléfono: $telefono \n"."Asunto: $asunto \n"."Mensaje: $mensaje \n";
        $to = 'juanriveron1206@gmail.com';
        $headers = "From: $email_from \r\n";

        //ENVIA CORREO
        mail($to,$email_subject,$email_body,$headers);

        mysqli_close($conexion);

    }                          

?> 