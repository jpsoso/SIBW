<?php

    require_once "/usr/local/lib/php/vendor/autoload.php";
    include("db_connection.php");


    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    if (isset($_GET['id'])) 
    {
        echo $twig->render('404.html');
    }
    else
    {
        $connection = new databaseConnection();
        $actividades = $connection->getActividadesIndex();

        echo $twig->render('index.html', ['actividades' => $actividades]);
    }
?>