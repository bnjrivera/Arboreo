<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of patio
 *
 * @author cetecom
 */
class patio {
    
    function obtenerTodos() {
        global $gbd;
        $sql = "SELECT * FROM patio";
        $res = $gbd -> query($sql);
        if($res) {
            $row = $res -> fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }else{
            return false;
        }
    }
    
    function agregar($n_patio) {
        global $gbd;
        $sql = "INSERT INTO patio (n_patio) VALUES (:n_patio)";
        $res = $gbd -> prepare($sql);
        if($res -> execute(array(':n_patio' => $n_patio) )) {
            return true;
        }else{
            return false;
        } 
    }
    
    function eliminar($id_patio) {
        global $gbd;
        $sql = "DELETE FROM patio WHERE id_patio=:id_patio";
        $res = $gbd -> prepare($sql);
        if($res -> execute(array(':id_patio' => $id_patio ))) {
            return true;
        }else{
            return false;
        }
    }
    
    function obtenerPatio($id_patio) {
        global $gbd;
        $sql = "SELECT * FROM patio WHERE id_patio=".$id_patio;
        $res = $gbd -> query($sql);
        if($res) {
            $row = $res -> fetch(PDO::FETCH_ASSOC);
            return $row;
        }else{
            return false;
        }
    }
    
    function modificar($id_patio, $n_patio) {
        global $gbd;
        $datos = array();
        $sql = "UPDATE patio SET n_patio=:n_patio WHERE id_patio=:id_patio";
        $datos[':n_patio'] = $n_patio;
        $datos[':id_patio'] = $id_patio;
        $res = $gbd -> prepare($sql);
        if($res->execute($datos)) {
            return true;
        }else{
            return false;
        }
    }
}
