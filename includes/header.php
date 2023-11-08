<?php 
  include("conn.php");
  include("query/selectData.php");
  $id = $_GET['id'];
  $selExmne = $conn->query("SELECT * FROM examinee_tbl WHERE exmne_id='$id' ")->fetch(PDO::FETCH_ASSOC);
 ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Control escolar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
     
    <link href="./main.css" rel="stylesheet">
    <link href="css/sweetalert.css" rel="stylesheet">
</head>
<body id="body">
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow"> 
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>  
            <h2>Control escolar</h2>
              <div class="app-header__content">
                <div class="app-header-left"></div>
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
       
               <!-- Modal -->
                     <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Registro de Usuario</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <div class="modal-body">
                    <!-- Contenido del modal -->
                     <form>
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" id="nombre">
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo Electrónico:</label>
                            <input type="email" class="form-control" id="correo">
                        </div>
                        <div class="form-group">
                            <label for="contrasena">Contraseña:</label>
                            <input type="password" class="form-control" id="contrasena">
                        </div>
                    </form>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                     </div>
                    </div>
                    </div>
                    </div>
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <?php 
                                                echo strtoupper($selExmneeData['exmne_fullname']);
                                             ?>
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            <div tabindex="-1" class="dropdown-divider"></div>
                                            <a href="query/logoutExe.php" class="dropdown-item">Cerrar sesión</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>        
                </div>
            </div>
        </div>  
        <style>
        /* Cambiar el color del texto a azul */
        h2 {
            color: #ffa400;
            
        }

        /* Cambiar el tipo de fuente y el tamaño del texto */
        h2 {
            font-family: Arial, sans-serif;
            font-size: 24px;
        }
    </style>








