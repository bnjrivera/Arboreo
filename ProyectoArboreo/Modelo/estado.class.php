<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of estado
 *
 * @author cetecom
 */
class estado {
    
    function obtenerTodos() {
        global $gbd;
        $sql = "SELECT * FROM estado";
        $res = $gbd -> query($sql);
        if($res) {
            $row = $res -> fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }else{
            return false;
        }
    }
    
    function agregar($estado) {
        global $gbd;
        $sql = "INSERT INTO estado (estado) VALUES (:estado)";
        $res = $gbd -> prepare($sql);
        if($res -> execute(array(':estado' => $estado) )) {
            return true;
        }else{
            return false;
        } 
    }
    
    function eliminar($id_estado) {
        global $gbd;
        $sql = "DELETE FROM estado WHERE id_estado=:id_estado";
        $res = $gbd -> prepare($sql);
        if($res -> execute(array(':id_estado' => $id_estado ))) {
            return true;
        }else{
            return false;
        }
    }
    
    function obtenerEstado($id_estado) {
        global $gbd;
        $sql = "SELECT * FROM estado WHERE id_estado=".$id_estado;
        $res = $gbd -> query($sql);
        if($res) {
            $row = $res -> fetch(PDO::FETCH_ASSOC);
            return $row;
        }else{
            return false;
        }
    }
    
    function modificar($id_estado, $estado) {
        global $gbd;
        $datos = array();
        $sql = "UPDATE estado SET estado=:estado WHERE id_estado=:id_estado";
        $datos[':estado'] = $estado;
        $datos[':id_estado'] = $id_estado;
        $res = $gbd -> prepare($sql);
        if($res->execute($datos)) {
            return true;
        }else{
            return false;
        }
    }
}
