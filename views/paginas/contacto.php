<main class="contenedor seccion">
    <h1 data-cy="heading-contacto">Contacto</h1>
  <?php if ($mensaje) { ?>
        <p data-cy="alerta-envio-formulario" class="alerta exito"><?php echo $mensaje; ?></p>      
      <?php } ?>
    <picture>
      <source srcset="build/img/destacada3.webp" type="image/webp">
      <source srcset="build/img/destacada3.jpg" type="image/jpeg">
      <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen contacto">
    </picture>

    <h2 data-cy="heading-formulario">Llene el Formulario de Contacto</h2>
    <form data-cy="formulario-contacto" class="formulario" action="/contacto" method="POST" >
      <fieldset>
        <legend>Informacion personal</legend>

        <label for="nombre">Nombre</label>
        <input data-cy="input-nombre" type="text" id="nombre" name="contacto[nombre]" placeholder="Tu Nombre">
        
        <label for="mensaje">Mensaje</label>
        <textarea data-cy="input-mensaje" id="mensaje" name="contacto[mensaje]" cols="30" rows="10"></textarea>

      </fieldset>

      <fieldset>
        <legend>Informacion sobre la propiedad</legend>

        <label for="opciones">Vende o Compra</label>
        <select data-cy="input-opciones" id="opciones" name="contacto[tipo]">
          <option value="" disabled selected>--Seleccione--</option>
          <option value="compra">Compra</option>
          <option value="vende">Vende</option>
        </select>
        <label for="presupuesto">Precio o Presupuesto</label>
        <input data-cy="input-precio" type="number" name="contacto[precio]" id="presupuesto" placeholder="Tu Precio o Presupuesto">
      </fieldset>

      <fieldset>
        <legend>Contacto</legend>

        <p>Como desea ser contactado</p>
        <div class="forma-contacto">
          <label for="contactar-telefono">Telefono</label>
          <input name="contacto[contacto]" type="radio" data-cy="forma-contacto" value="telefono" id="contactar-telefono" >
          <label for="contactar-email">E-mail</label>
          <input name="contacto[contacto]" type="radio" data-cy="forma-contacto" value="email" id="contactar-email" >
        </div>
        <div id="contacto"></div>
      </fieldset>

      <input type="submit" value="Enviar" class="boton-verde">
    </form>
  </main>