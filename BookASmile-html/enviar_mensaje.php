<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre = $_POST['nombre'];
  $mensaje = $_POST['mensaje'];

  // Dirección de correo a la que se enviará el mensaje
  $destinatario = 'ac2583141@gmail.com';

  // Asunto del correo
  $asunto = 'Nuevo mensaje de ' . $nombre;

  // Cuerpo del mensaje
  $cuerpoMensaje = "Nombre: $nombre\n";
  $cuerpoMensaje .= "Mensaje:\n$mensaje";

  // Cabeceras del correo
  $cabeceras = 'From: ' . $nombre . ' <' . $destinatario . '>' . "\r\n";

  // Enviar el correo
  if (mail($destinatario, $asunto, $cuerpoMensaje, $cabeceras)) {
    echo 'El mensaje se ha enviado correctamente.';
  } else {
    echo 'Hubo un problema al enviar el mensaje. Por favor, inténtalo de nuevo más tarde.';
  }
}
?>
