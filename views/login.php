<div class="row my-5 justify-content-center">
    <div class="col col-md-5">
        <h1 class="text-center mb-5 fw-bold">Inciar sessión</h1>
        <?= (new Alerta())->get_alertas() ?>
        <form class="row g-3" action="admin/actions/auth_login.php" method="post">
            <label for="username" class="form-label">Correo electrónico</label>
            <input class="form-control" type="text" name="email">
            <label for="pass" class="form-label">Contraseña</label>
            <input class="form-control" type="text" name="pass">
            <button class="btn btn-primary" type="submit">Entrar</button>
            <a class="btn btn-primary" href="index.php?sec=registro">Registrar</a>
        </form>
    </div>
</div>