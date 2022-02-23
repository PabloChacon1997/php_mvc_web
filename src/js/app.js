document.addEventListener("DOMContentLoaded", function () {
  eventListeners();
  darkMode();

  // Muestra campos condicionales
  const metodoContacto = document.querySelectorAll(
    'input[name="contacto[contacto]"]'
  );
  metodoContacto.forEach((input) =>
    input.addEventListener("click", metodosContacto)
  );
});

function metodosContacto(e) {
  const contactoDiv = document.querySelector("#contacto");
  if (e.target.value === "telefono") {
    contactoDiv.innerHTML = `
      <label for="telefono">Numero telefono</label>
      <input data-cy="input-telefono" type="tel" id="telefono" name="contacto[telefono]" placeholder="Tu Telefono">

      <p>Elija la fecha y hora para la llamada</p>

      <label for="fecha">Fecha</label>
      <input data-cy="input-fecha" type="date" id="fecha" name="contacto[fecha]" >
      <label for="hora">Hora</label>
      <input data-cy="input-hora" type="time" id="hora" name="contacto[hora]" min="09:00" max="18:00">
    `;
  } else {
    contactoDiv.innerHTML = `
      <label for="email">E-mail</label>
      <input data-cy="input-email" type="email" id="email" name="contacto[email]" placeholder="Tu Email" >
    `;
  }
}

function darkMode() {
  // Comprueba si estaba habilidado dark mode
  let darkLocal = window.localStorage.getItem("dark");
  if (darkLocal === "true") {
    document.body.classList.add("dark-mode");
  }
  // Añadimos el evento de click al botón de dark mode
  document
    .querySelector(".dark-mode-boton")
    .addEventListener("click", darkChange);
}

function darkChange() {
  let darkLocal = window.localStorage.getItem("dark");

  if (darkLocal === null || darkLocal === "false") {
    // No está inicializado darkLocal o es falso
    window.localStorage.setItem("dark", true);
    document.body.classList.add("dark-mode");
  } else {
    // Está activado darkMode, por lo que se desactiva
    window.localStorage.setItem("dark", false);
    document.body.classList.remove("dark-mode");
  }
}

function eventListeners() {
  const mobileMenu = document.querySelector(".mobile-menu");
  mobileMenu.addEventListener("click", navegacionResponsive);
}

function navegacionResponsive() {
  const navegacion = document.querySelector(".navegacion");
  if (navegacion.classList.contains("mostrar")) {
    navegacion.classList.remove("mostrar");
  } else {
    navegacion.classList.add("mostrar");
  }
}
