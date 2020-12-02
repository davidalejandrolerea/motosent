<?php
$conn = new mysqli("localhost","root","","moto_sent_fsa");

$sql = "UPDATE oferta_pedido SET estado_not = 1 WHERE estado = 0";	
$result = mysqli_query($conn, $sql);


if(!empty($response)) {
	print $response;
}


?>