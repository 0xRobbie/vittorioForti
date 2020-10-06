<div class="container">

<div class="col-sm-12 col-md-6">

        <h2> Log in</h2>
        <br>

        <form name="login" action="?controller=acceso&&action=login" onsubmit="validarLogin()" method="POST">
            <div class="form-group">
                <label for="usuarios">Usuario</label>
                <input type="text" class="form-control" id="usuarios" name="usuarios" placeholder="Nombre de usuario" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Acceder</button>
        </form>
    </div>
</div>

<script src="assets/js/valida_login.js"></script>