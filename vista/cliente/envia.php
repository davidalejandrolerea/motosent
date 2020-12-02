<?php

$remitente = $_POST['email'];
$destinatario = "motosentfsa@gmail.com";
$asunto = "Te contactaron en el formulario de tu sitio web";
$mensaje = "Tienes un mensaje desde el formulario de tu sitio web";
$headers = "From: $remitente\r\nReply-to: $remitente";

mail($destinatario, $asunto, $mensaje, $headers);
    
    include 'confirma.php'; //se debe crear un html que confirma el envío

?>