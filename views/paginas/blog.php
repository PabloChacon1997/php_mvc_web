<main class="contenedor seccion contenido-centrado">
  <?php if($auth): ?>
    <a href="/entrada/crear" class="boton boton-verde">Nueva entrada</a>
  <?php endif; ?>
  <?php if(!$auth): ?>
    <a href="/login" class="boton boton-verde">Regsitrarse</a>
    <p><small>Necesitas estar registrado para crear una nueva entrada</small></p>
  <?php endif; ?>
  <h1>Nuestro Blog</h1>
    
  <?php 
    @include 'entradas.php';
  ?>


  </main>