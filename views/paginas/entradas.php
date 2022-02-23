<?php foreach($entradas as $entrada ): ?>
<article class="entrada-blog">
  <div class="imagen">
    <img loading="lazy" src="/imagenes/<?php echo $entrada->imagen; ?>" alt="anuncio">
  </div>

  <div class="texto-entrada">
    <a href="/entrada?id=<?php echo $entrada->id; ?>">
      <h4><?php echo $entrada->titulo; ?></h4>
      <p>Escrito el: <span><?php echo $entrada->fecha; ?></span> por: <span><?php echo $entrada->usuario; ?></span></p>

      <p>
      <?php echo $entrada->descripcion; ?>
      </p>
    </a>
  </div>
</article>
<?php endforeach; ?>