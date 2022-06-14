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
    require('../Modelo/tratamiento.class.php');
    $tratamiento = new tratamiento();
 
    if(isset($_GET['accion']) && $_GET['accion'] == 'eliminar') {
        if($tratamiento -> eliminar($_GET['id_tratamiento'])){
            header('Location: http://localhost/ProyectoArboreo/Vista/tratamientos.php?eliminar=true');
            exit;
        }else{
            header('Location: http://localhost/ProyectoArboreo/Vista/tratamientos.php?eliminar=false');
            exit;
        }
    }elseif(isset($_POST['accion']) && $_POST['accion'] == 'agregar') {
        if($tratamiento -> agregar($_POST['tratamiento'])) {
            header('Location: http://localhost/ProyectoArboreo/Vista/tratamientos.php?agregar=true');
            exit;
        }else{
            header('Location: http://localhost/ProyectoArboreo/Vista/tratamientos.php?agregar=false');
            exit;
        }
    }elseif(isset($_POST['accion']) && $_POST['accion'] == 'editar') {
        if($tratamiento -> modificar($_POST['id_tratamiento'], $_POST['tratamiento'])) {
            header('Location: http://localhost/ProyectoArboreo/Vista/tratamientos.php?editar=true');
            exit;
        }else{
            header('Location: http://localhost/ProyectoArboreo/Vista/tratamientos.php?editar=false');
            exit;
        }
    }
    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

