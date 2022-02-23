<fieldset>
  <legend>Información general</legend>

  <label for="titulo">Titulo</label>
  <input type="text" id="titulo" name="propiedad[titulo]" placeholder="Titulo propiedad" 
    value="<?php echo s($propiedad->titulo); ?>" />

  <label for="precio">Precio</label>
  <input type="number" id="precio" name="propiedad[precio]" placeholder="Precio propiedad" 
    value="<?php echo s($propiedad->precio); ?>" />

  <label for="imagen">Imagen</label>
  <input type="file" id="imagen" accept="image/jpeg, image/png" name="propiedad[imagen]"/>
  <?php if($propiedad->imagen): ?>
    <img src="/imagenes/<?php echo $propiedad->imagen; ?>" class="imagen-small" alt="" />
  <?php endif; ?>

  <label for="descripcion">Descripción</label>
  <textarea id="descripcion"
    name="propiedad[descripcion]" cols="30" rows="10"><?php echo s($propiedad->descripcion); ?></textarea>
</fieldset>

<fieldset>
  <legend>Información de la propiedad</legend>
  
  <label for="habitaciones">Habitaciones</label>
  <input type="number" id="habitaciones" name="propiedad[habitaciones]" 
    value="<?php echo s($propiedad->habitaciones); ?>" placeholder="Ej:3" min="1" max="9" />

  <label for="wc">Baños</label>
  <input type="number" id="wc" name="propiedad[wc]" 
    value="<?php echo s($propiedad->wc); ?>"placeholder="Ej:3" min="1" max="9" />

  <label for="estacionamiento">Estacionamientos</label>
  <input type="number" id="estacionamiento" name="propiedad[estacionamiento]" 
    value="<?php echo s($propiedad->estacionamiento); ?>" placeholder="Ej:3" min="1" max="9" />
</fieldset>

<fieldset>
  <legend for="vendedor">Vendedor</legend>
  <select name="propiedad[vendedorId]" id="vendedor">
    <option value="" selected disabled>--Seleccione--</option>
    <?php foreach($vendedores as $vendedor): ?>
      <option
        <?php echo $propiedad->vendedorId === $vendedor->id ? 'selected': ''; ?>
        value="<?php echo s($vendedor->id); ?>"> 
        <?php echo s($vendedor->nombre)." ".s($vendedor->apellido); ?> 
      </option>
    <?php endforeach; ?>
  </select>
</fieldset>
