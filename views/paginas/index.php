<main class="contenedor seccion">
    <h2 data-cy='heading-nosotros'>Mas sobre nosotros</h2>

    <?php include 'iconos.php'; ?>
  </main>

  <section class="seccion contenedor">
    <h2>Casas y Depas en Venta</h2>
    
    <?php
      @include 'listado.php'; 
    ?>

    <div class="alinear-derecha">
      <a href="/propiedades" class="boton-verde" data-cy="todas-propiedades">Ver todas</a>
    </div>
  </section>


  <section data-cy="iamgen-contacto" class="imagen-contacto">
    <h2>Encuentra la casa de tus sueños</h2>
    <p>Llenar el formulario de contacto y un asesor se pondra en contacto con tigo a la brevedad</p>
    <a href="/contacto" class="boton-amarillo">Contáctanos</a>
  </section>

  <section class="contenedor seccion seccion-inferior">
    <section class="blog" data-cy="blog">
      <h3>Nuestro blog</h3>

      
      </article>

      <?php 
        @include 'entradas.php';
      ?>



    </section>

    <section class="testimoniales"  data-cy="testimoniales">
      <h3>Testimoniales</h3>
      <div class="testimonial">
        <blockquote>
          El personal se comporto de una excenlente forma, muy buena atencion y la casa que me ofrecieron cumple
          con todas mis expectativas.
        </blockquote>
        <p>
          - Andrés Chacón
        </p>
      </div>
    </section>
  </section>