<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tipopoda
 *
 * @author cetecom
 */
class tipo_poda {
    
    function obtenerTodos() {
        global $gbd;
        $sql = "SELECT * FROM tipo_poda";
        $res = $gbd -> query($sql);
        if($res) {
            $row = $res -> fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }else{
            return false;
        }
    }
    
    function agregar($tipo_poda) {
        global $gbd;
        $sql = "INSERT INTO tipo_poda (tipo_poda) VALUES (:tipo_poda)";
        $res = $gbd -> prepare($sql);
        if($res -> execute(array(':tipo_poda' => $tipo_poda) )) {
            return true;
        }else{
            return false;
        } 
    }
    
    function eliminar($id_tipopoda) {
        global $gbd;
        $sql = "DELETE FROM tipo_poda WHERE id_tipopoda=:id_tipopoda";
        $res = $gbd -> prepare($sql);
        if($res -> execute(array(':id_tipopoda' => $id_tipopoda ))) {
            return true;
        }else{
            return false;
        }
    }
    
    function obtenerTipoPoda($id_tipopoda) {
        global $gbd;
        $sql = "SELECT * FROM tipo_poda WHERE id_tipopoda=".$id_tipopoda;
        $res = $gbd -> query($sql);
        if($res) {
            $row = $res -> fetch(PDO::FETCH_ASSOC);
            return $row;
        }else{
            return false;
        }
    }
    
    function modificar($id_tipopoda, $tipo_poda) {
        global $gbd;
        $datos = array();
        $sql = "UPDATE tipo_poda SET tipo_poda=:tipo_poda WHERE id_tipopoda=:id_tipopoda";
        $datos[':tipo_poda'] = $tipo_poda;
        $datos[':id_tipopoda'] = $id_tipopoda;
        $res = $gbd -> prepare($sql);
        if($res->execute($datos)) {
            return true;
        }else{
            return false;
        }
    }
}
