<?php
    namespace TECWEB\MYAPI;
    include_once __DIR__.'/DataBase.php';
    class Update extends DataBase {

        public function __construct($db, $user='root', $pass='changocome') {
            parent::__construct($db, $user, $pass);
        }

        public function edit($object) {
            $producto = $object;
            $this->data = array(
                'status'  => 'error',
                'message' => 'No se encontró el producto o ocurrió un error'
            );

            if (!empty($producto)) {
                $jsonOBJ = json_decode($producto);

                if (isset($jsonOBJ->id)) {
                    $id = $jsonOBJ->id;
                    $sql = "SELECT * FROM productos WHERE id = '{$id}' AND eliminado = 0";
                    $result = $this->conexion->query($sql);

                    if ($result->num_rows > 0) {
                        $this->conexion->set_charset("utf8");
                        $sql = "UPDATE productos SET
                                    nombre = '{$jsonOBJ->nombre}',
                                    marca = '{$jsonOBJ->marca}',
                                    modelo = '{$jsonOBJ->modelo}',
                                    precio = {$jsonOBJ->precio},
                                    detalles = '{$jsonOBJ->detalles}',
                                    unidades = {$jsonOBJ->unidades},
                                    imagen = '{$jsonOBJ->imagen}'
                                WHERE id = '{$id}' AND eliminado = 0";

                        // Ejecutar la consulta de actualización
                        if ($this->conexion->query($sql)) {
                            $this->data['status'] = "success";
                            $this->data['message'] = "Producto actualizado correctamente";
                        } else {
                            $this->data['message'] = "ERROR: No se pudo ejecutar $sql. " . mysqli_error($this->conexion);
                        }
                    } else {
                        $this->data['message'] = "No se encontró el producto con el id especificado.";
                    }

                    $result->free();
                } 
                else {
                    $this->data['message'] = "El id del producto no fue proporcionado en el JSON.";
                }

                $this->conexion->close();
            }
        }
    }
?>