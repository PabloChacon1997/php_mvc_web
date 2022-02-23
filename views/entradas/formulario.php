<fieldset>
  <legend>Información general</legend>

  <label for="titulo">Titulo</label>
  <input type="text" id="titulo" name="entrada[titulo]" placeholder="Titulo entrada" 
    value="<?php echo s($entrada->titulo); ?>" />

  <label for="nombre">Nombre</label>
  <input type="text" id="nombre" name="entrada[usuario]" placeholder="Tu nombre" 
    value="<?php echo s($entrada->usuario); ?>" />

  <label for="descripcion">Descripción</label>
  <textarea id="descripcion"
    name="entrada[descripcion]" placeholder="Añade una descripcion" 
    cols="30" rows="10"><?php echo s($entrada->descripcion); ?></textarea>
  
  <label for="imagen">Imagen</label>
  <input type="file" id="imagen" accept="image/jpeg, image/png" name="entrada[imagen]"/>
  <?php if($entrada->imagen): ?>
    <img src="/imagenes/<?php echo $entrada->imagen; ?>" class="imagen-small" alt="" />
  <?php endif; ?>
  
</fieldset>