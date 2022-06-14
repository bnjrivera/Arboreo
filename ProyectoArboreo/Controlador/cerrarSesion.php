<?php
require('../Modelo/sesion.class.php');
$sesion = new sesion();
$sesion -> cerrar();

header('Location: http://localhost/ProyectoArboreo/Vista/index.php');
exit;

