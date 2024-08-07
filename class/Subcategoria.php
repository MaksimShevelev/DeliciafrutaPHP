<?php

class Subcategoria

    {
        protected $id;
        protected $nombre_completo;


        
        public function get_x_id(int $id) :? Subcategoria
        {
            $conexion = Conexion::getConexion();
            $query = "SELECT * FROM subcategorias WHERE id = $id";
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
            $query = "SELECT * FROM subcategorias";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
            $PDOStatement->execute();

            $catalogo = $PDOStatement->fetchAll();

            return $catalogo;
        }

        public function insert($nombre): void
        {
            try {
                if (empty($nombre)) {
                    throw new Exception("El nombre de la subcategoria no puede estar vacío.");
                }
        
                $conexion = Conexion::getConexion();
                $query = "INSERT INTO subcategorias (nombre_completo) VALUES (:nombre)";
                $PDOStatement = $conexion->prepare($query);
                $PDOStatement->execute([
                    "nombre" => htmlspecialchars($nombre)
                ]);
            } catch (Exception $e) {
                throw new Exception("Error al insertar la subcategoria: " . $e->getMessage());
            }
        }
        
        public function delete(){
            $conexion = Conexion::getConexion();
            $query = "DELETE FROM subcategorias WHERE id = :id";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute(["id" => htmlspecialchars($this->id)]);
        }

        public function edit($nombre, $id) {
            try {
                $conexion = Conexion::getConexion();
                $query = "UPDATE subcategorias SET nombre_completo = :nombre WHERE id = :id";
                $PDOStatement = $conexion->prepare($query);
                $PDOStatement->execute([
                    "nombre" => htmlspecialchars($nombre),
                    "id" => ($id)
                ]);
            } catch (Exception $e) {
                throw new Exception("Error al editar la subcategoria: " . $e->getMessage());
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

        public function getNombreCompleto()
        {
            return $this->nombre_completo;
        }

        public function setNombreCompleto($nombre_completo): self
        {
            $this->nombre_completo = $nombre_completo;

            return $this;
        }

    }