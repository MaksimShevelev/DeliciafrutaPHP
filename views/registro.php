<div class="row my-5 justify-content-center">
    <div class="col col-md-5">

        <h1 class="text-center mb-5 fw-bold">Registro</h1>
        <form class="row g-3" action="admin/actions/registrar_usuario.php" method="post">
        <label for="username" class="form-label">Correo electrónico</label>
            <input class="form-control" type="text" name="email">
            <label for="pass" class="form-label">Contraseña</label>
            <input class="form-control" type="text" name="pass">
            <button class="btn btn-primary" type="submit">Registrar</button>
            <a class="btn btn-primary" href="index.php?sec=login">Entrar</a>
        </form>
    </div>
</div>