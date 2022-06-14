<?php
require('../../Modelo/conexion.class.php');
$db = new conexion();
$db -> conn();
require('../../Modelo/propiedad.class.php');
$propiedad = new propiedad();

$datos = $propiedad ->obtenerPropiedad($_GET['id_propiedad']);
echo json_encode($datos);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

