<?php

    // Obtiene las malas palabras con llamada a la bd
    include("db_connection.php");

    $connection = new databaseConnection();

    $malasPalabras = $connection->getMalasPalabras();

    // Las formatea en json y hace echo
    echo json_encode($malasPalabras);

?>