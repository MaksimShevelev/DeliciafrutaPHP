<?php
// Incluir la clase de conexión
include_once './class/Conexion.php';

// Obtener la conexión
$pdo = Conexion::getConexion();

// Verificar si se envió el formulario y procesar los datos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $apellido = $_POST['apellido'] ?? '';
    $email = $_POST['email'] ?? '';
    $tel = $_POST['tel'] ?? '';
    $comment = $_POST['comment'] ?? '';

    try {
        // Preparar la consulta SQL para insertar datos
        $sql = "INSERT INTO suscripciones (nombre, apellido, email, telefono, comentario) 
                VALUES (:nombre, :apellido, :email, :telefono, :comentario)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':apellido', $apellido, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':telefono', $tel, PDO::PARAM_STR);
        $stmt->bindParam(':comentario', $comment, PDO::PARAM_STR);

        // Ejecutar la consulta
        $stmt->execute();

        // Mensaje de éxito
        $mensajeExito = '¡Datos guardados correctamente!';
    } catch (PDOException $e) {
        // Mensaje de error
        $mensajeError = 'Error, inténtalo de nuevo (' . $e->getMessage() . ')';
    }
}  
?>



    <div class="row">
        <div class="respuesta col-lg-6 col-md-12 col-sm-12">
            <div>
                <h3 class="my-6 text-center">¡Los datos se han enviado correctamente!</h3>
                <h4 class="my-6 text-center">Ahora estarás siempre al tanto de nuestras promociones y novedades.</h4>
            </div>
            <div>
                <h5 class="text-center">Tus datos</h5>
                <ul>
                    <li><span>Nombre: </span><?php echo htmlspecialchars($nombre); ?> </li>
                    <li><span>Apellido: </span><?php echo htmlspecialchars($apellido); ?> </li>
                    <li><span>Email: </span><?php echo htmlspecialchars($email); ?> </li>
                    <li><span>Teléfono: </span><?php echo htmlspecialchars($tel); ?> </li>
                    <li><span>Comentario: </span><?php echo htmlspecialchars($comment); ?> </li>
                </ul>
            </div>
        </div>
        <div class="respuesta col-lg-6 col-md-12 col-sm-12">
            <img src="img/logo_mockup_06.png" alt="logo Deliciafruta">
        </div>
    </div>

<?php if (isset($mensajeExito)): ?>
    <div class="alert alert-success" role="alert">
        <?php echo $mensajeExito; ?>
    </div>
<?php endif; ?>

<?php if (isset($mensajeError)): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $mensajeError; ?>
    </div>
<?php endif; ?>


<style>
    .row {
        margin-top: 50px;
    }

    span {
        color: rgb(124, 75, 151);
        }
</style>