<?php
require('../Modelo/sesion.class.php');
$sesion = new sesion();
if(!$sesion -> validar()) {
    header('Location: http://localhost/ProyectoArboreo/Vista/login.php?error=NoHaySesion');
    exit;
} else {
    require('../Modelo/conexion.class.php');
    $db = new conexion();
    $db -> conn();
    require('../Modelo/patio.class.php');
    $patio = new patio();
 
    if(isset($_GET['accion']) && $_GET['accion'] == 'eliminar') {
        if($patio -> eliminar($_GET['id_patio'])){
            header('Location: http://localhost/ProyectoArboreo/Vista/patios.php?eliminar=true');
            exit;
        }else{
            header('Location: http://localhost/ProyectoArboreo/Vista/patios.php?eliminar=false');
            exit;
        }
    }elseif(isset($_POST['accion']) && $_POST['accion'] == 'agregar') {
        if($patio -> agregar($_POST['n_patio'])) {
            header('Location: http://localhost/ProyectoArboreo/Vista/patios.php?agregar=true');
            exit;
        }else{
            header('Location: http://localhost/ProyectoArboreo/Vista/patios.php?agregar=false');
            exit;
        }
    }elseif(isset($_POST['accion']) && $_POST['accion'] == 'editar') {
        if($patio -> modificar($_POST['id_patio'], $_POST['n_patio'])) {
            header('Location: http://localhost/ProyectoArboreo/Vista/patios.php?editar=true');
            exit;
        }else{
            header('Location: http://localhost/ProyectoArboreo/Vista/patios.php?editar=false');
            exit;
        }
    }
    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

