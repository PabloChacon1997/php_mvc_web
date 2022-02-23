<main class="contenedor seccion contenido-centrado">
    <h1><?php echo $entrada->titulo; ?></h1>
    <img loading="lazy" src="/imagenes/<?php echo $entrada->imagen; ?>" alt="anuncio">
    
    <p class="informacion-meta">Escrito el: <span><?php echo $entrada->fecha; ?></span> por: <span><?php echo $entrada->usuario; ?></span></p>
    <div class="resumen-propiedad">

      <p>
      <?php echo $entrada->descripcion; ?>
      </p>
    </div>
    <?php 
    if($auth && $_SESSION['id'] === $entrada->usuarioId): 
  ?>
      <a href="/entrada/actualizar?id=<?php echo $entrada->id; ?>" 
        class="boton boton-amarillo-block">Actualizar entrada</a>
        <form method="POST" class="w100" action="/entrada/eliminar">
          <input type="hidden" name="id" value="<?php echo $entrada->id; ?>" />
          <input type="hidden" name="tipo" value="entrada" />
          <input type="submit" class="boton-rojo-block" value="Eliminar">
        </form>
    <?php endif; ?>
  
  </main>