<?php

class Idoniedad

    {
        protected $id;
        protected $nombre_completo;
        protected $cantidad;

        public function get_x_id(int $id) :? self
        {
            $conexion = Conexion::getConexion();
            $query = "SELECT * FROM idoniedad WHERE id = $id";
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
            $query = "SELECT * FROM idoniedad";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
            $PDOStatement->execute();

            $catalogo = $PDOStatement->fetchAll();

            return $catalogo;
        }

        public function edit($nombre, $cantidad, $id) {
            try {
                $conexion = Conexion::getConexion();
                $query = "UPDATE idoniedad SET nombre_completo = :nombre, cantidad = :cantidad WHERE id = :id";
                $PDOStatement = $conexion->prepare($query);
                $PDOStatement->execute([
                    "nombre" => htmlspecialchars($nombre),
                    "cantidad" => htmlspecialchars($cantidad),
                    "id" => $id // Тип уже не нужно обрамлять в htmlspecialchars(), так как мы ожидаем int
                ]);
            } catch (Exception $e) {
                throw new Exception("Error al editar la idoniedad: " . $e->getMessage());
            }
        }

        public function insert($nombre, $cantidad): void
        {
            try {
                $conexion = Conexion::getConexion();
                $query = "INSERT INTO idoniedad (nombre_completo, cantidad) VALUES (:nombre, :cantidad)";
                $PDOStatement = $conexion->prepare($query);
                $PDOStatement->execute([
                    "nombre" => htmlspecialchars($nombre),
                    "cantidad" => htmlspecialchars($cantidad)
                ]);
            } catch (Exception $e) {
                throw new Exception("Error al insertar la idoniedad: " . $e->getMessage());
            }
        }

        public function delete(): void
        {
            try {
                $conexion = Conexion::getConexion();
                $query = "DELETE FROM idoniedad WHERE id = :id";
                $PDOStatement = $conexion->prepare($query);
                $PDOStatement->execute(['id' => $this->id]);
            } catch (Exception $e) {
                throw new Exception("Error al eliminar la idoniedad: " . $e->getMessage());
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

        public function getCantidad()
        {
            return $this->cantidad;
        }

        public function setCantidad($cantidad): self
        {
            $this->cantidad = $cantidad;

            return $this;
        }
    }