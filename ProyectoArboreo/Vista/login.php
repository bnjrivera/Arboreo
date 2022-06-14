<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    $flagError=false;
    if(isset($_GET['error']) && $_GET['error'] == 1){
        $flagError = true;
        $msgError = "Usuario/Contraseña no coinciden";
    }
    if(isset($_GET['error']) && $_GET['error'] == 'NoHaySesion'){
        $flagError = true;
        $msgError = "Usuario no ha iniciado sesión";
    }

    include('header.inc');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="container" style="width: 350px">
            <div class="page-header">
                <h2><i>Inicie Sesión, Administrador</i></h2>
            </div>
            <?php
            if($flagError) { 
            ?>
            <div class="alert alert-danger alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>ERROR! </strong><?php echo $msgError; ?>
            </div>
            <?php    
            }
            ?>
            <form action="../Controlador/validar.php" method="POST">
                <div class="form-group">
                    <label for="username">Nombre de Usuario:</label>
                    <input type="text" class="form-control" id="username" name="username" required="">
                </div>
                <div class="form-group">
                    <label for="pwd">Contraseña:</label>
                    <input type="password" class="form-control" id="pwd" name="pwd" required="">
                </div>
                <button type="submit" class="btn btn-default">Iniciar Sesión</button>
            </form> 
        </div>
    </body>
</html>
