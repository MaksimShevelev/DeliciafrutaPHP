<?php

class Producto

    {
        protected $id; 
        protected $categoria_principal;
        protected $tipo; 
        protected $valor_energetico;
        protected $peso;
        protected $titulo;
        protected $idoniedad;
        protected $subcategoria;
        protected $descripcion;
        protected $origen;
        protected $ingridientes;
        protected $imagen;
        protected $precio;
        protected $categorias_secundarios_ids;
        protected $categorias_secundarios;
        
        protected static $valores = ["id", "valor_energetico", "peso", "titulo", "descripcion", "origen", "ingridientes", "imagen", "precio"];

        protected $db;

        public function __construct()
        {
            $this->db = Conexion::getConexion();
        }


        public function mapear($productoArrayAsociativo) : self
        {
            $producto = new self();
            foreach (self::$valores as $valor) {
                if (isset($productoArrayAsociativo[$valor])) {
                    $producto->{$valor} = $productoArrayAsociativo[$valor];
                } else {
                    $producto->{$valor} = null;
                }
            }
        
            $producto->categoria_principal = (new Categoria())->catalogo_x_id($productoArrayAsociativo["categoria_principal_id"]);
            $producto->tipo = (new Tipo())->get_x_id($productoArrayAsociativo["tipo_id"]);
            $producto->idoniedad = (new Idoniedad())->get_x_id($productoArrayAsociativo["idoniedad_id"]);
            $producto->subcategoria = (new Subcategoria())->get_x_id($productoArrayAsociativo["subcategoria_id"]);
        
            // Проверяем наличие ключа "categorias_secundarios" перед его использованием
            if (isset($productoArrayAsociativo["categorias_secundarios"])) {
                $PSids = explode(",", $productoArrayAsociativo["categorias_secundarios"]);
                $categoria_secundario_array = [];
                foreach ($PSids as $PSid) {
                    $categoria_secundario_array[] = (new Categoria())->catalogo_x_id(intval($PSid));
                }
                $producto->categorias_secundarios = $categoria_secundario_array;
                $producto->categorias_secundarios_ids = $productoArrayAsociativo["categorias_secundarios"];
            } else {
                $producto->categorias_secundarios = [];
                $producto->categorias_secundarios_ids = '';
            }
        
            return $producto;
        }
        
        

        public function catalogo_completo()
        {
            $catalogo = [];
            $conexion = Conexion::getConexion();
            $query = 'SELECT productos.*, GROUP_CONCAT(producto_x_categoria.id_categoria) AS categorias_secundarios FROM productos 
            LEFT JOIN producto_x_categoria ON productos.id = producto_x_categoria.id_producto 
            GROUP BY productos.id';
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
            $PDOStatement->execute();
            while ($producto = $PDOStatement->fetch()) {
                $catalogo[] = $this->mapear($producto);
            }
            
            return $catalogo;
        }

        public function catalogo_x_id($id)
        {
            $productos = $this->catalogo_completo();

            foreach ($productos as $producto) {
                if ($producto->id == $id) {
                    return $producto;
                }
            }

            return [];
        }

        public function catalogo_x_categoria(int $categoria_id): array
        {
            $categorias = [];

            $conexion = Conexion::getConexion();
            $query = "SELECT productos.*, GROUP_CONCAT(producto_x_categoria.id_categoria) AS categorias_secundarios FROM productos 
            LEFT JOIN producto_x_categoria ON productos.id = producto_x_categoria.id_producto
            WHERE categoria_principal_id = $categoria_id GROUP BY productos.id ";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
            $PDOStatement->execute();
            while ($producto = $PDOStatement->fetch()) {
                $categorias[] = $this->mapear($producto);
            }

            return $categorias;
        }

        public function categorias_validos()
        {
            $categorias = [];

            $conexion = Conexion::getConexion();
            $query = 'SELECT categoria_principal_id FROM `productos` GROUP BY categoria_principal_id';
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute();

            $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
            $categorias = $PDOStatement->fetchAll();

            return $categorias;
        }

        public function insert($categoria_principal_id, $tipo_id, $valor_energetico, $peso, $titulo, $idoniedad_id, $subcategoria_id, $descripcion, $origen, $ingridientes, $imagen, $precio): int
        {
            try {
                $conexion = Conexion::getConexion();
                $query = "INSERT INTO `productos` (`id`, `titulo`, `categoria_principal_id`, `idoniedad_id`, `subcategoria_id`, `tipo_id`, `valor_energetico`, `peso`, `origen`, `ingridientes`, `descripcion`, `imagen`, `precio`) VALUES (NULL, :titulo, :categoria_principal_id, :idoniedad_id, :subcategoria_id, :tipo_id, :valor_energetico, :peso, :origen, :ingridientes, :descripcion, :imagen, :precio)";
                $PDOStatement = $conexion->prepare($query);
                $PDOStatement->execute([
                    'categoria_principal_id' => htmlspecialchars($categoria_principal_id),
                    'tipo_id' => htmlspecialchars($tipo_id),
                    'valor_energetico' => htmlspecialchars($valor_energetico),
                    'peso' => htmlspecialchars($peso),
                    'titulo' => htmlspecialchars($titulo),
                    'idoniedad_id' => htmlspecialchars($idoniedad_id),
                    'subcategoria_id' => htmlspecialchars($subcategoria_id),
                    'descripcion' => htmlspecialchars($descripcion),
                    'origen' => htmlspecialchars($origen),
                    'ingridientes' => htmlspecialchars($ingridientes),
                    'imagen' => htmlspecialchars($imagen),
                    'precio' => htmlspecialchars($precio),
                ]);
                return $conexion->lastInsertId();
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

        public function reemplazarImagen($imagen, $id){
            $conexion = Conexion::getConexion();
            $query = "UPDATE productos SET imagen=:imagen WHERE id = :id";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute([
                "imagen" => $imagen,
                "id" => $id
            ]);
        }
        public function edit($categoria_principal_id, $tipo_id, $valor_energetico, $peso, $titulo, $idoniedad_id, $subcategoria_id, $descripcion, $origen, $ingridientes, $precio, $id){
            $conexion = Conexion::getConexion();
            $query = "UPDATE `productos` SET `titulo` = :titulo, `categoria_principal_id` = :categoria_principal_id, `idoniedad_id` = :idoniedad_id, `subcategoria_id` = :subcategoria_id, `tipo_id` = :tipo_id, `valor_energetico` = :valor_energetico, `peso` = :peso, `origen` = :origen, `ingridientes` = :ingridientes, `descripcion` = :descripcion,`precio` = :precio WHERE `productos`.`id` = :id";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute([
                'categoria_principal_id' => htmlspecialchars($categoria_principal_id),
                'tipo_id' => htmlspecialchars($tipo_id),
                'valor_energetico' => htmlspecialchars($valor_energetico),
                'peso' => htmlspecialchars($peso),
                'titulo' => htmlspecialchars($titulo),
                'idoniedad_id' => htmlspecialchars($idoniedad_id),
                'subcategoria_id' => htmlspecialchars($subcategoria_id),
                'descripcion' => htmlspecialchars($descripcion),
                'origen' => htmlspecialchars($origen),
                'ingridientes' => htmlspecialchars($ingridientes),
                'precio' => htmlspecialchars($precio),
                "id" => htmlspecialchars($id)
            ]);
        }

        public function delete(){
            $conexion = Conexion::getConexion();
            $query = "DELETE FROM productos WHERE id = :id";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute([
                "id" => htmlspecialchars($this->id)
            ]);
        }

        public function add_categoria_secundario($id_producto, $id_categoria){
            $conexion = Conexion::getConexion();
            $query = "INSERT INTO `producto_x_categoria` (`id`, `id_producto`, `id_categoria`) VALUES (NULL, :id_producto, :id_categoria)";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute([
                "id_producto" => $id_producto,
                "id_categoria" => $id_categoria
            ]);
        }

        public function clear_categorias_secundarios($id){
            $conexion = Conexion::getConexion();
            $query = "DELETE FROM producto_x_categoria WHERE id_producto = :id";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute([
                "id" => $id,
            ]);
        }


        public function obtenerTodosLosProductos() {
            // Получаем подключение к базе данных
            $db = Conexion::getConexion();
            $stmt = $db->query("SELECT * FROM productos");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        

    public function buscarProductosPorNombre($nombre)
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM productos WHERE titulo LIKE :nombre";
        $stmt = $conexion->prepare($query);
        $stmt->bindValue(':nombre', "%$nombre%", PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
        
        
        
        
        public function mostrarProducto($producto) {
            echo '<pre>';
            print_r($producto);
            echo '</pre>';
        
            echo '<div class="col-6 col-md-4 col-lg-3 mb-4">';
            echo '<div class="card rounded-0 border-0">';
            echo '<img class="card-img-top rounded-0" src="img/covers/' . htmlspecialchars($producto['imagen']) . '" alt="Imagen del producto">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . htmlspecialchars($producto['titulo']) . '</h5>';
            echo '<p class="card-text">' . htmlspecialchars($producto['descripcion']) . '</p>';
            echo '<p class="card-text">$' . htmlspecialchars($producto['precio']) . '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        
        
        

        
        public function getId()
        {
            return $this->id;
        }

        public function getCategoria()
        {
            return $this->categoria_principal->getNombre();
        }

        public function getValor_energetico()
        {
            return $this->valor_energetico;
        }

        public function getTipo()
        {
            return $this->tipo->getNombre();
        }

        public function getPeso()
        {
            return $this->peso;
        }

        public function getTitulo()
        {
            return $this->titulo;
        }

        public function getIdoniedad()
        {
            return $this->idoniedad->getNombreCompleto();
        }

        public function getSubcategoria()
        {
            return $this->subcategoria->getNombreCompleto();
        }

        public function getDescripcion()
        {
            return $this->descripcion;
        }

        public function getImagen()
        {
            return $this->imagen;
        }

        public function getPrecio()
        {
            return $this->precio;
        }

        public function setId($id)
        {
            $this->id = $id;

            return $this;
        }

        public function getOrigen()
        {
            return $this->origen;
        }

        public function setOrigen($origen): self
        {
            $this->origen = $origen;

            return $this;
        }

        public function getIngridientes()
        {
            return $this->ingridientes;
        }

        public function setIngridientes($ingridientes)
        {
            $this->ingridientes = $ingridientes;

            return $this;
        }

        public function getTipo_id(){
            return $this->tipo->getId();
        }

        public function getCategoria_id(){
            return $this->categoria_principal->getId();
        }

        public function getIdoniedad_id(){
            return $this->idoniedad->getId();
        }

        public function getSubcategoria_id(){
            return $this->subcategoria->getId();
        }

        public function getCategoriasSecundarios(){
            return $this->categorias_secundarios_ids;
        }
    }
