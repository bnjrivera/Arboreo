<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of conexion
 *
 * @author Benjamín
 */
class conexion {
    //put your code here
    function conn(){
        global $gbd;
        $dsn = 'mysql:dbname=proyectoarboreo; host=127.0.0.1';
        $usuario = 'root';
        $contrasena = '';

        try {
            $gbd = new PDO($dsn, $usuario, $contrasena);
        } catch (PDOException $e) {
            echo 'Falló la conexión: '.$e->getMessage();
        }
    }
}
