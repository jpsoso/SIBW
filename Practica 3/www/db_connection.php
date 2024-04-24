<?php

// mysql -h 127.0.0.1 -P 3306 -u jesusadmin -p
// password jesusp

class databaseConnection
{
    private $mysqli;

    function __construct() 
    {
        $this->mysqli = new mysqli("database", "jesusadmin", "jesusp", "SIBW");
        if ($this->mysqli->connect_error)
        {
            die ("Fallo al conectar: " . $this->mysqli->connect_error);
        }
    }

    function __destruct() 
    {
        mysqli_close($this->mysqli);
    }

    function getActividadesIndex()
    {
        $res = $this->mysqli->query("SELECT tipoActividad, miniatura, id FROM actividades");
    
        $actividades = array();
        
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc())
            {
                $actividad = array('tipoActividad' => $row['tipoActividad'], 'miniatura' => $row['miniatura'], 'id' => $row['id']);
                array_push($actividades, $actividad);
            }
        }
        
        return $actividades;
    }

    function getNumeroActividades()
    {
        $res = $this->mysqli->query("SELECT * FROM actividades");
        return $res->num_rows;    
    }

    function getActividad($idActividad)
    {
        $res = $this->mysqli->query("SELECT *, DATE_FORMAT(fecha,'%d/%m/%Y') AS fecha  FROM actividades WHERE id=" . $idActividad);
    
        $actividad = array();
        
        if ($res->num_rows > 0) {
          $row = $res->fetch_assoc();
          $actividad = array('tipoActividad' => $row['tipoActividad'], 'nombreActividad' => $row['nombreActividad'], 'fecha' => $row['fecha'], 'precio' => $row['precio'], 'duracion' => $row['duracion'], 'longitud' => $row['longitud'], 'material' => $row['material'], 'descripcion' => $row['descripcion'], 'idActividad' => $row['id']);
        }
        
        return $actividad;
    }

    function getComentariosDeActividad($idActividad)
    {
        $res = $this->mysqli->query("SELECT * FROM comentarios WHERE idActividad=" . $idActividad);
    
        $comentarios = array();

        $malasPalabras = $this->getMalasPalabrasArray();

        if ($res->num_rows > 0) {
            
            while ($row = $res->fetch_assoc())
            {
                foreach($malasPalabras as $palabra)
                {
                    $censored = str_repeat("*", strlen($palabra));
                    $comentarioCensurado =  str_replace($palabra, $censored, $row['comentario']);
                }
                
                $comentario = array('nombreUsuario' => $row['nombreUsuario'], 'comentario' => $comentarioCensurado, 'fecha' => $row['fecha']);
                array_push($comentarios, $comentario);
            }
        }
        
        return $comentarios;
    }

    function getFotosDeActividad($idActividad)
    {
        $res = $this->mysqli->query("SELECT * FROM fotosActividad WHERE idActividad=" . $idActividad);
    
        $fotos = array();
        
        if ($res->num_rows > 0) {
            
            while ($row = $res->fetch_assoc())
            {
                $foto = array('fotoURL' => $row['fotoURL'], 'fotoFOOT' => $row['fotoFOOT']);
                array_push($fotos, $foto);
            }
        }
        
        return $fotos;
    }

    function getMalasPalabras()
    {
        $res = $this->mysqli->query("SELECT * FROM palabrasProhibidas");
    
        $malasPalabras = array();
        
        if ($res->num_rows > 0) {
            
            while ($row = $res->fetch_assoc())
            {
                $malaPalabra = array('palabraProhibida' => $row['palabraProhibida']);
                array_push($malasPalabras, $malaPalabra);
            }
        }
        
        return $malasPalabras;
    }

    function getMalasPalabrasArray()
    {
        $res = $this->mysqli->query("SELECT * FROM palabrasProhibidas");
    
        $malasPalabras = array();
        
        if ($res->num_rows > 0) {
            
            while ($row = $res->fetch_assoc())
            {
                $malaPalabra = $row['palabraProhibida'];
                array_push($malasPalabras, $malaPalabra);
            }
        }
        
        return $malasPalabras;
    }

}
?>