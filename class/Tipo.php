<?php

class Tipo

    {
        protected $id;
        protected $nombre;

        public function get_x_id(int $id) :? self
        {
            $conexion = Conexion::getConexion();
            $query = "SELECT * FROM tipo WHERE id = $id";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
            $PDOStatement->execute();
            $resultado = $PDOStatement->fetch();
    
            return $resultado ? $resultado : null;
            
        }

        public function catalogo_completo(): array
        {
            $catalogo = [];
            $conexion = Conexion::getConexion();
            $query = "SELECT * FROM tipo";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
            $PDOStatement->execute();
    
            $catalogo = $PDOStatement->fetchAll();
    
            return $catalogo;
        } 
        
        public function insert($nombre): void
        {
            try {
                $conexion = Conexion::getConexion();
                $query = "INSERT INTO tipo VALUES (null, :nombre)";
                $PDOStatement = $conexion->prepare($query);
                $PDOStatement->execute([
                    "nombre" => htmlspecialchars($nombre),
                ]);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    
        public function delete(){
            $conexion = Conexion::getConexion();
            $query = "DELETE FROM tipo WHERE id = :id";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute([
                "id" => htmlspecialchars($this->id)
            ]);
        }
    
        public function edit($nombre, $id){
            try {
                $conexion = Conexion::getConexion();
                $query = "UPDATE tipo SET nombre = :nombre WHERE id = :id";
                $PDOStatement = $conexion->prepare($query);
                $PDOStatement->execute([
                    "nombre" => htmlspecialchars($nombre),
                    "id" => $id 
                ]);
            } catch (Exception $e) {
                echo $e->getMessage();
                die("Error al editar el categoria");
            }
        }
        
        
        public function getId()
        {
                return $this->id;
        }

        public function setId($id): self
        {
                $this->id = $id;

                return $this;
        }

        public function getNombre()
        {
                return $this->nombre;
        }

        public function setNombre($nombre): self
        {
                $this->nombre = $nombre;

                return $this;
        }

    }