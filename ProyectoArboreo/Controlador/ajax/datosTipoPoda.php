<?php
require('../../Modelo/conexion.class.php');
$db = new conexion();
$db -> conn();
require('../../Modelo/tipopoda.class.php');
$tipo_poda = new tipo_poda();

$datos = $tipo_poda ->obtenerTipoPoda($_GET['id_tipopoda']);
echo json_encode($datos);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

