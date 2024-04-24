<?php

    require_once "/usr/local/lib/php/vendor/autoload.php";
    include("db_connection.php");

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    if (isset($_GET['id'])) {
        $connection = new databaseConnection();
        $number = $_GET['id'];
        $numberActividades = $connection->getNumeroActividades();
        if ($number > 0 && $number <= $numberActividades)
        {
            for ($i = 1; $i <= $numberActividades; $i++)
            {
                if ($number == $i)
                {
                    $idActividad = $i;
                }
            } 
        }
      } else {
        $idActividad = -1;
      }

    if ($idActividad != -1)
    {
        $actividad = $connection->getActividad($idActividad);
        $comentarios = $connection->getComentariosDeActividad($idActividad);
        $fotos = $connection->getFotosDeActividad($idActividad);

        echo $twig->render('actividad_imprimir.html', ['actividad' => $actividad, 'comentarios' => $comentarios, 'fotos' => $fotos]);
    } 
    else 
    {
        echo $twig->render('404.html');
    }


?>