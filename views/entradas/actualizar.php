<main class="contenedor seccion">
    <h1>Actualizar entrada</h1>
    <a href="/entrada?id=<?php echo $entrada->id; ?>" class="boton boton-verde">Volver</a>

    <?php foreach($errores as $error): ?>
      <div class="alerta error">
        <?php echo $error; ?>
      </div>
    <?php endforeach; ?>

    <form method="POST"  class="formulario" enctype="multipart/form-data" >
      <?php include __DIR__."/formulario.php"; ?>
      <input type="submit" value="Guardar entrada" class="boton boton-verde" />
    </form>
  </main>