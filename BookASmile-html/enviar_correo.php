<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $data = json_decode(file_get_contents("php://input"), true);

  $nombre = $data['nombre'];
  $email = $data['email'];
  $mensaje = $data['mensaje'];

  // Dirección de correo a la que se enviará el mensaje
  $destinatario = 'ac2583414@gmail.com';

  // Asunto del correo
  $asunto = 'Nuevo mensaje de ' . $nombre;

  // Cuerpo del mensaje
  $cuerpoMensaje = "Nombre: $nombre\n";
  $cuerpoMensaje .= "Correo electrónico: $email\n";
  $cuerpoMensaje .= "Mensaje:\n$mensaje";

  // Cabeceras del correo
  $cabeceras = 'From: ' . $email . "\r\n" .
       'Reply-To: ' . $email . "\r\n" .
       'X-Mailer: PHP/' . phpversion();

  // Enviar el correo
  if (mail($destinatario, $asunto, $cuerpoMensaje, $cabeceras)) {
    http_response_code(200);
  } else {
    http_response_code(500);
  }
}
?>
