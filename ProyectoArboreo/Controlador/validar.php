<?php
require('../Modelo/conexion.class.php');
$db = new conexion();
$db -> conn();
require('../Modelo/usuario.class.php');
$usuario = new usuario();

if($usuario -> validar($_POST['username'], $_POST['pwd'])){
    require('../Modelo/sesion.class.php');
    $sesion = new sesion();
    $sesion -> iniciar();
    header('Location: http://localhost/ProyectoArboreo/Vista/index.php?'.SID);
    exit;
}else{
    header('Location: http://localhost/ProyectoArboreo/Vista/login.php?error=1');
    exit;
}
