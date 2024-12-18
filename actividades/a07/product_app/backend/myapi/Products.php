<?php
    namespace TECWEB\MYAPI;
    require_once __DIR__. '/DataBase.php';

    class Products extends DataBase 
    {
        private $data;

        public function __construct($db, $user = 'root', $pass = 'changocome')
        {
            $this->data = array();
            parent::__construct($db, $user, $pass);
        }

        public function getData()
        {
            return json_encode($this->data, JSON_PRETTY_PRINT);
        }

        public function list()
        {
            if ($result = $this->conexion->query("SELECT * FROM productos WHERE eliminado = 0")) 
            {
                $this->data = $result->fetch_all(MYSQLI_ASSOC);
                $result->free();
            } 

            else 
            {
                die('Query Error: '.mysqli_error($this->conexion));
            }
            $this->conexion->close();
        }

        public function add($object)
        {
            $producto = $object;
            $this->data = array(
                'status'  => 'error',
                'message' => 'Ya existe un producto con ese nombre'
            );
            if(!empty($producto)) 
            {
                // SE TRANSFORMA EL STRING DEL JASON A OBJETO
                $jsonOBJ = json_decode($producto);
                // SE ASUME QUE LOS DATOS YA FUERON VALIDADOS ANTES DE ENVIARSE
                $sql = "SELECT * FROM productos WHERE nombre = '{$jsonOBJ->nombre}' AND eliminado = 0";
                $result = $this->conexion->query($sql);
                
                if ($result->num_rows == 0) 
                {
                    $this->conexion->set_charset("utf8");
                    $sql = "INSERT INTO productos VALUES (null, '{$jsonOBJ->nombre}', '{$jsonOBJ->marca}', '{$jsonOBJ->modelo}', {$jsonOBJ->precio}, '{$jsonOBJ->detalles}', {$jsonOBJ->unidades}, '{$jsonOBJ->imagen}', 0)";
                    if($this->conexion->query($sql))
                    {
                        $this->data['status'] =  "success";
                        $this->data['message'] =  "Producto agregado";
                    } 
                    else 
                    {
                        $this->data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
                    }
                }

                $result->free();
                // Cierra la conexion
                $this->conexion->close();
            }
        }

        public function delete($id)
        {
            $mensaje = array(
                'status'  => 'error',
                'message' => 'La consulta falló'
            );
            // SE VERIFICA HABER RECIBIDO EL ID
            if( $id ) {
                // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
                $sql = "UPDATE productos SET eliminado=1 WHERE id = {$id}";
                if ( $this->conexion->query($sql) ) {
                    $this->data['status'] =  "success";
                    $this->data['message'] =  "Producto eliminado";
                } else {
                    $this->data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
                }
                $this->conexion->close();
            } 
        }

        public function edit($object)
        {
            $producto = $object;
            $this->data = array(
                'status'  => 'error',
                'message' => 'No se encontró el producto o ocurrió un error'
            );
            if (!empty($producto)) 
            {
                // SE TRANSFORMA EL STRING DEL JSON A OBJETO
                $jsonOBJ = json_decode($producto);
                // Verificar que el nombre del producto existe en el JSON
                if (isset($jsonOBJ->id)) 
                {
                    // SE ASUME QUE LOS DATOS YA FUERON VALIDADOS ANTES DE ENVIARSE
                    $id = $jsonOBJ->id;
                    $sql = "SELECT * FROM productos WHERE id = '{$id}' AND eliminado = 0";
                    $result = $this->conexion->query($sql);
                    // Verificar si existe el producto con el nombre proporcionado
                    if ($result->num_rows > 0) 
                    {
                        // SE PREPARA EL UPDATE
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
                        if ($this->conexion->query($sql)) 
                        {
                            $this->data['status'] = "success";
                            $this->data['message'] = "Producto actualizado correctamente";
                        } 
                        else 
                        {
                            $this->data['message'] = "ERROR: No se pudo ejecutar $sql. " . mysqli_error($this->conexion);
                        }
                    } 
                    else 
                    {
                        // Producto no encontrado
                        $this->data['message'] = "No se encontró el producto con el id especificado.";
                    }
                    $result->free();
                } 
                else 
                {
                    // Error si no se envió el nombre
                    $this->data['message'] = "El nombre del producto no fue proporcionado en el JSON.";
                }
                // Cerrar la conexión
                $this->conexion->close();
            }
        }

        public function search($dato) 
        {
            if ($dato) 
            {
                $sql = "SELECT * FROM productos 
                        WHERE (id = '{$dato}' OR nombre LIKE '%{$dato}%' 
                            OR marca LIKE '%{$dato}%' 
                            OR detalles LIKE '%{$dato}%') 
                            AND eliminado = 0";
                
                $result = $this->conexion->query($sql);

                if ($result) 
                {
                    $this->data = $result->fetch_all(MYSQLI_ASSOC);
                    $result->free();
                } 
                else 
                {
                    die('Query Error: ' . $this->conexion->error);
                }
            }
            $this->conexion->close();
        }

        public function single($id) {
            if ($id) 
            {
                $sql = "SELECT * FROM productos WHERE id = '{$id}' AND eliminado = 0";
                
                $result = $this->conexion->query($sql);

                if ($result) 
                {
                    $this->data = $result->fetch_all(MYSQLI_ASSOC);
                    $result->free();
                } 
                else 
                {
                    die('Query Error: ' . $this->conexion->error);
                }
            }
            $this->conexion->close();
        }
    }

    
?>