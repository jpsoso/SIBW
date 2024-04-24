CREATE TABLE actividades(
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipoActividad VARCHAR(20),
    nombreActividad VARCHAR(60),
    fecha DATE,
    precio REAL,
    duracion TIME,
    longitud REAL,
    material VARCHAR(250),
    descripcion VARCHAR(1000),
    miniatura VARCHAR(50)
)

CREATE TABLE comentarios(
    id INT AUTO_INCREMENT PRIMARY KEY,
    idActividad INT,
    nombreUsuario VARCHAR(60),
    comentario VARCHAR(500),
    fecha DATE 
)

CREATE TABLE palabrasProhibidas(
    palabraProhibida VARCHAR(50) PRIMARY KEY
)

CREATE TABLE fotosActividad(
    id INT AUTO_INCREMENT PRIMARY KEY,
    idActividad INT,
    fotoURL VARCHAR(50),
    fotoFOOT VARCHAR(50)
)


<a class="activity" href="actividad.php?ev=1">
        <img src='img/senderismo.png' class="activity_icon">
        <div class="activity_name"> Senderismo </div>
    </a>
    <a class="activity" >
        <img src='img/barranquismo.png' class="activity_icon">
        <div class="activity_name"> Barranquismo </div>
    </a>
    <a class="activity" >
        <img src='img/ciclismo.jpg' class="activity_icon">
        <div class="activity_name"> Ciclismo de montaña</div>
    </a>
    <a class="activity">
        <img src='img/escalada.jpg' class="activity_icon">
        <div class="activity_name"> Escalada </div>
    </a>
    <a class="activity">
        <img src='img/montañismo.jpg' class="activity_icon">
        <div class="activity_name"> Montañismo </div>
    </a>
    <a class="activity">
        <img src='img/via-ferrata.jpg' class="activity_icon">
        <div class="activity_name"> Vía Ferrata </div>
    </a>
    <a class="activity">
        <img src='img/ascenso-veleta.jpg' class="activity_icon">
        <div class="activity_name"> Ascenso al Veleta </div>
    </a>
    <a class="activity">
        <img src='img/ascenso-mulhacen.jpg' class="activity_icon">
        <div class="activity_name"> Ascenso al Mulhacén </div>
    </a>
    <a class="activity">
        <img src='img/descenso-rappel.jpeg' class="activity_icon">
        <div class="activity_name"> Descenso en Rappel </div>
    </a>