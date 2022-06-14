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
    require('../Modelo/tipopoda.class.php');
    $tipo_poda = new tipo_poda();
 
    if(isset($_GET['accion']) && $_GET['accion'] == 'eliminar') {
        if($tipo_poda -> eliminar($_GET['id_tipopoda'])){
            header('Location: http://localhost/ProyectoArboreo/Vista/tipo_podas.php?eliminar=true');
            exit;
        }else{
            header('Location: http://localhost/ProyectoArboreo/Vista/tipo_podas.php?eliminar=false');
            exit;
        }
    }elseif(isset($_POST['accion']) && $_POST['accion'] == 'agregar') {
        if($tipo_poda -> agregar($_POST['tipo_poda'])) {
            header('Location: http://localhost/ProyectoArboreo/Vista/tipo_podas.php?agregar=true');
            exit;
        }else{
            header('Location: http://localhost/ProyectoArboreo/Vista/tipo_podas.php?agregar=false');
            exit;
        }
    }elseif(isset($_POST['accion']) && $_POST['accion'] == 'editar') {
        if($tipo_poda -> modificar($_POST['id_tipopoda'], $_POST['tipo_poda'])) {
            header('Location: http://localhost/ProyectoArboreo/Vista/tipo_podas.php?editar=true');
            exit;
        }else{
            header('Location: http://localhost/ProyectoArboreo/Vista/tipo_podas.php?editar=false');
            exit;
        }
    }
    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

