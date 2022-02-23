<main class="contenedor seccion contenido-centrado">
    <h1 data-cy="heading-login" >Iniciar Sesión</h1>
    <?php foreach($errores as $error): ?>
      <div data-cy="alerta-login" class="alerta error"><?php echo $error; ?></div>
    <?php endforeach; ?>
    <form data-cy="formulario-login" method="POST" class="formulario" action="/login">
    <fieldset>
        <legend>Email y Password</legend>

        <label for="email">Email</label>
        <input data-cy="input-email" type="text" name="email" id="email" placeholder="Tu Email" />
        
        <label for="password">Password</label>
        <input data-cy="input-password" type="password" name="password" id="password" placeholder="Tu Password" />

      </fieldset>

      <input type="submit" value="Iniciar sesión" class="boton boton-verde" />
    </form>
  </main>