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
    require('../Modelo/estado.class.php');
    $estado = new estado();
 
    if(isset($_GET['accion']) && $_GET['accion'] == 'eliminar') {
        if($estado -> eliminar($_GET['id_estado'])){
            header('Location: http://localhost/ProyectoArboreo/Vista/estados.php?eliminar=true');
            exit;
        }else{
            header('Location: http://localhost/ProyectoArboreo/Vista/estados.php?eliminar=false');
            exit;
        }
    }elseif(isset($_POST['accion']) && $_POST['accion'] == 'agregar') {
        if($estado -> agregar($_POST['estado'])) {
            header('Location: http://localhost/ProyectoArboreo/Vista/estados.php?agregar=true');
            exit;
        }else{
            header('Location: http://localhost/ProyectoArboreo/Vista/estados.php?agregar=false');
            exit;
        }
    }elseif(isset($_POST['accion']) && $_POST['accion'] == 'editar') {
        if($estado -> modificar($_POST['id_estado'], $_POST['estado'])) {
            header('Location: http://localhost/ProyectoArboreo/Vista/estados.php?editar=true');
            exit;
        }else{
            header('Location: http://localhost/ProyectoArboreo/Vista/estados.php?editar=false');
            exit;
        }
    }
    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

