<?php
    namespace TECWEB\MYAPI;
    abstract class DataBase {
        protected $conexion;
        protected $data;

        public function __construct($db, $user, $pass) {
            $this->conexion = new \mysqli('localhost', $user, $pass, $db);
            $this->data = array();


            if ($this->conexion->connect_error) {
                die("Error de conexión: " . $this->conexion->connect_error);
            }
        }

        public function getData() {
            return json_encode($this->data, JSON_PRETTY_PRINT);
        }
    }
?>