<?php
    // leer datos de usuario y contraseña de la base de datos
    include("config.php") ;

    // Conexión con el servidor y selección de base de datos
    $db = new mysqli($server, $db_user, $db_pass, $database);
    if ($db->connect_errno)
        echo "Fall&oacute; la conexi&oacute;n con MySQL";

    $query = "SELECT * FROM visitantes;";
  
    $result = $db->query($query);
    $numfilas = $result->num_rows;
    echo "El n&uacute;mero de elementos es ".$numfilas;

    $result->free();
    $db->close();
?>