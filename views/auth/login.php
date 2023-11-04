<main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesión</h1>
        <?php foreach($errores as $error):?>
            <div class="alerta error">
                <?php echo $error?>
            </div>
            <?php endforeach;?>

        <form class="formulario" method="POST" novalidate action="/login">
            <fieldset>
                    <legend>Email y password</legend>

                    <label for="email">E-mail</label>
                    <input id="email" type="email" placeholder="Tu email" name="email" required>

                    <label for="Password">Password</label>
                    <input id="Password" type="password" placeholder="Tu Password" name="password" required>

                    
                </fieldset>
                <input type="submit" class="boton boton-verde" value="Iniciar sesión">
        </form>
</main>