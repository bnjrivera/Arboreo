<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuario
 *
 * @author cetecom
 */
class usuario {
    function validar($username, $pwd) {
        global $gbd;
        $sql = "SELECT pwd FROM usuario WHERE username='".$username."' ";
        $res = $gbd -> query($sql);
        if ($res) {
            $row = $res -> fetch(PDO::FETCH_ASSOC);
            if (password_verify($pwd, $row['pwd'])) {
                //echo '¡La contraseña es válida!';
                return true;
            } else {
                //echo 'La contraseña no es válida.';
                return false;
            }
        } else {
            return false;
        }
    }
    
    function obtenerTodos() {
        global $gbd;
        $sql = "SELECT * FROM usuario";
        $res = $gbd -> query($sql);
        if($res) {
            $row = $res -> fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }else{
            return false;
        }
    }
    
    function agregar($username, $pwd, $nombre) {
        global $gbd;
        if(!$this->existeNickname($username)) {
            $pwd_encriptada = password_hash($pwd, PASSWORD_DEFAULT);
            $sql = "INSERT INTO usuario (username, pwd, nombre) "
                    . "VALUES (:username, :pwd, :nombre)";
            $res = $gbd -> prepare($sql);
            if($res -> execute(array(':username' => $username,
                                     ':pwd' => $pwd_encriptada,
                                     ':nombre' => $nombre ) )) {
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }    
    }
    
    function existeNickname($username) {
        global $gbd;
        $sql = "SELECT idUsuario FROM usuario WHERE username='".$username."' ";
        $res = $gbd -> query($sql);
        if($res) {
            $row = $res -> fetch(PDO::FETCH_ASSOC);
            if($row['idUsuario'] > 0) {
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    
    function eliminar($idUsuario) {
        global $gbd;
        $sql = "DELETE FROM usuario WHERE idUsuario=:idUsuario";
        $res = $gbd -> prepare($sql);
        if($res -> execute(array(':idUsuario' => $idUsuario ))) {
            return true;
        }else{
            return false;
        }
    }
    
    function obtenerUsuario($idUsuario) {
        global $gbd;
        $sql = "SELECT * FROM usuario WHERE idUsuario=".$idUsuario;
        $res = $gbd -> query($sql);
        if($res) {
            $row = $res -> fetch(PDO::FETCH_ASSOC);
            return $row;
        }else{
            return false;
        }
    }
    
/*    function modificar($idUsuario, $username, $pwd, $nombre) {
        global $gbd;
        $datos = array();
        $sql = "UPDATE usuario SET username=:username, ";
        $datos[':username'] = $username;
        if (!empty($pwd)) {
            $pwd_encriptada = password_hash($pwd, PASSWORD_DEFAULT);
            $sql .= "pwd=:pwd,";
            $datos[':pwd'] = $pwd_encriptada;
        }
        $sql .= "nombre=:nombre WHERE idUsuario=:idUsuario";
        $datos[':nombre'] = $nombre;
        $datos[':idUsuario'] = $idUsuario;
        $res = $gbd -> prepare($sql);
        if($res->execute($datos)) {
            return true;
        }else{
            return false;
        }
    }
 * 
 */
}
