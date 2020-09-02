<?php

$aleatorio = rand(1,30);

$nombre = $_POST['nombre'];

echo "Texto: ", $nombre, "<br>";
echo "Aleatorio: ", $aleatorio, "<br><br>";

for($var=1; $var<=$aleatorio; $var++){
    echo "Texto: ", $nombre, "<br>";
}

echo "<br>";

for($var=1; $var<=$aleatorio; $var++){
    echo strrev($nombre), "<br>";
}

?>