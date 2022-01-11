<?php
    /**
     * @author Sergio Matamoros Delgado
    */
    require_once __DIR__."/operacionesBd.php";
    class Database extends OperacionesBd {
        //Vars
        private $mysql = null;

        function __construct()
        {
            $this->mysql = $this->inicioBd();
        }

        /**
         * Inserta los datos de una nueva puntuación
        */
        function crearMinijuego() {

            //Listado de minijuegos
            $minijuegosLista = array(
                1 => array("minijuego1", "enlace"),
                2 => array("minijuego2", "enlace2"),
                3 => array("minijuego3", "enlace3"),
                4 => array("minijuego4", "enlace4"),
                5 => array("minijuego5", "enlace5")
            );

            //https://diego.com.es/sentencias-preparadas-en-php

            $sql = "INSERT INTO minijuegos(nombre,enlace) VALUES (?, ?);";

            //Preparamos la consulta
            $consulta = $this->prepararConsulta($sql);

            //Bindeamos los parámetros
            $consulta->bind_param("ss", $nombre, $enlace);


            //Iteramos sobre array
            foreach ($minijuegosLista as $minijuego) {

                $nombre = $minijuego[0];
                $enlace = $minijuego[1];

                //Ejecutamos la consulta y si hay un error lo mostramos
                if(!$consulta->execute()) echo $this->mysql->errno;
            }

            //Cerramos la consulta preparada
            $consulta->close();
        }
    }
?>