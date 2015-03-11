<?php
    // leer datos de usuario y contraseña de la base de datos
    include("config.php");

    // Conexión con el servidor y selección de base de datos
    $db = new mysqli($server, $db_user, $db_pass, $database);
    if ($db->connect_errno)
        echo "Fall&oacute; la conexi&oacute;n con MySQL";

    $query = "INSERT INTO visitantes (id, email) VALUES (NULL, 'ebustos@deseis.cl');";
  
    $result = $db->query($query);
    if ($result)
        echo $db->affected_rows." fila(s) afectada(s). Informaci&oacute;n insertada correctamente";
    else
        echo "Ha ocurrido un problema insertando los datos";

    $db->close();
?>
