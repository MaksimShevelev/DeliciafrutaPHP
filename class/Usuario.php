<?php

class Usuario

    {
        protected $id;
        protected $email;
        protected $nombre_usuario;    
        protected $nombre_completo;    
        protected $password;    
        protected $roles; 

        public function getEmail() {
            return $this->email;
        }

        public function setEmail($email): self {
            $this->email = $email;
            return $this;
        }

        public function getNombreUsuario() {
            return $this->nombre_usuario;
        }

        public function setNombreUsuario($nombre_usuario): self {
            $this->nombre_usuario = $nombre_usuario;
            return $this;
        }

        public function getNombreCompleto() {
            return $this->nombre_completo;
        }

        public function setNombreCompleto($nombre_completo): self {
            $this->nombre_completo = $nombre_completo;
            return $this;
        }

        public function getPassword() {
            return $this->password;
        }

        public function setPassword($password): self {
            $this->password = $password;
            return $this;
        }

        public function getRoles() {
            return $this->roles;
        }

        public function setRoles($roles): self {
            $this->roles = $roles;
            return $this;
        }

        public function getId() {
            return $this->id;
        }

        public function usuario_x_email(string $email){
            $conexion = Conexion::getConexion();
            $query = "SELECT * FROM usuarios WHERE email = :email";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->setFetchMode(PDO::FETCH_CLASS,self::class);
            $PDOStatement->execute([
                "email" => $email
            ]);
            $result = $PDOStatement->fetch();
            return $result;
        }

        public function usuario_x_id(int $id) {
            $conexion = Conexion::getConexion();
            $query = "SELECT * FROM usuarios WHERE id = :id";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
            $PDOStatement->execute(['id' => $id]);
            return $PDOStatement->fetch();
        }

        public function insert(string $email, string $password){
            $conexion = Conexion::getConexion();
            $query = "INSERT INTO usuarios VALUES (NULL, '$email', '', '', '$password', 'usuario')";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute();
        }

        public function obtenerOrdenes(int $id_usuario) {
            try {
                $conexion = Conexion::getConexion();
                $query = "SELECT * FROM `ordenes` WHERE id_usuario = :id_usuario";
                $PDOStatement = $conexion->prepare($query);
                $PDOStatement->execute([
                    "id_usuario" => htmlspecialchars($id_usuario),
                ]);
                return $PDOStatement->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                echo $e->getMessage();
                return [];
            }
        }

        public function obtenerDetalleOrden(int $id_orden) {
            try {
                $conexion = Conexion::getConexion();
                $query = "SELECT detalle_orden.*, productos.titulo AS producto 
                        FROM detalle_orden 
                        JOIN productos ON detalle_orden.id_producto = productos.id 
                        WHERE id_orden = :id_orden";
                $PDOStatement = $conexion->prepare($query);
                $PDOStatement->execute([
                    "id_orden" => htmlspecialchars($id_orden),
                ]);
                return $PDOStatement->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                echo $e->getMessage();
                return [];
            }
        }


        public function obtenerOrdenPorId(int $id) {
            try {
                $conexion = Conexion::getConexion();
                $query = "SELECT * FROM ordenes WHERE id = :id";
                $PDOStatement = $conexion->prepare($query);
                $PDOStatement->execute([
                    "id" => htmlspecialchars($id),
                ]);
                return $PDOStatement->fetch(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                echo $e->getMessage();
                return null;
            }
        }
        

        public function obtenerTodosLosUsuariosConOrdenes() {
            try {
                $conexion = Conexion::getConexion();
                $query = "SELECT u.id, u.email, u.nombre_usuario, u.nombre_completo, u.roles,
                                o.id AS orden_id, o.total, o.fecha
                        FROM usuarios u
                        LEFT JOIN ordenes o ON u.id = o.id_usuario
                        WHERE u.roles != 'admin'"; // Исключить пользователей с ролью 'admin'
                $PDOStatement = $conexion->prepare($query);
                $PDOStatement->execute();
                return $PDOStatement->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo 'Query failed: ' . $e->getMessage();
                return [];
            }
        }
        
        

        
    }
