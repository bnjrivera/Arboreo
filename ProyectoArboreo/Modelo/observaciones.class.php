<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of observaciones
 *
 * @author cetecom
 */
class observaciones {
    
    function obtenerTodos() {
        global $gbd;
        $sql = "SELECT * FROM observaciones";
        $res = $gbd -> query($sql);
        if($res) {
            $row = $res -> fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }else{
            return false;
        }
    }
    
    function agregar($observaciones) {
        global $gbd;
        $sql = "INSERT INTO observaciones (observaciones) VALUES (:observaciones)";
        $res = $gbd -> prepare($sql);
        if($res -> execute(array(':observaciones' => $observaciones) )) {
            return true;
        }else{
            return false;
        } 
    }
    
    function eliminar($id_observaciones) {
        global $gbd;
        $sql = "DELETE FROM observaciones WHERE id_observaciones=:id_observaciones";
        $res = $gbd -> prepare($sql);
        if($res -> execute(array(':id_observaciones' => $id_observaciones ))) {
            return true;
        }else{
            return false;
        }
    }
    
    function obtenerObservaciones($id_observaciones) {
        global $gbd;
        $sql = "SELECT * FROM observaciones WHERE id_observaciones=".$id_observaciones;
        $res = $gbd -> query($sql);
        if($res) {
            $row = $res -> fetch(PDO::FETCH_ASSOC);
            return $row;
        }else{
            return false;
        }
    }
    
    function modificar($id_observaciones, $observaciones) {
        global $gbd;
        $datos = array();
        $sql = "UPDATE observaciones SET observaciones=:observaciones WHERE id_observaciones=:id_observaciones";
        $datos[':observaciones'] = $observaciones;
        $datos[':id_observaciones'] = $id_observaciones;
        $res = $gbd -> prepare($sql);
        if($res->execute($datos)) {
            return true;
        }else{
            return false;
        }
    }
}
