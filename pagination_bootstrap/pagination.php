<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Pagination</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" />
    </head>
    <body class="container">
        <h1>Registros</h1>
        <div>
            <?php
                // leer datos de usuario y contraseña de la base de datos
                include("../config.php") ;

                // Conexión con el servidor y selección de base de datos
                $db = new mysqli($server, $db_user, $db_pass, $database);
                if ($db->connect_errno){
                    printf("Conexión fallida: %s\n", $db->connect_error);
                    exit();
                }
  
                $per_page = 10;
                if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
                $start_from = ($page-1) * $per_page;
  
                $query = "SELECT * FROM visitantes ORDER BY id DESC LIMIT $start_from, $per_page";
                $result = $db->query($query);
            ?>
            <div class="row" style="margin: 40px 0px 0px;">
                <div class="col-md-8 col-md-offset-2">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                            </tr>
                            <?php
                                };
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="row">
                <div class="text-center">
                    <?php
                        $query = "SELECT COUNT(id) FROM visitantes";
                        $result = $db->query($query);
                        $row = $result->fetch_row();
                        $total_records = $row[0];
                        $total_pages = ceil($total_records / $per_page);
                        $pagLink = "<ul class='pagination'>";
                        for ($i=1; $i<=$total_pages; $i++) {
                            $pagLink .= "<li><a href='pagination.php?page=".$i."'>".$i."</a></li>";
                        };
                        echo $pagLink . "</ul>";
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>