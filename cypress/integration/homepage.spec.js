/// <reference types="cypress" />

describe("Carga la pagina principal", () => {
  it("Prueba el header", () => {
    cy.visit("/");

    cy.get('[data-cy="heading-sitio"]').should("exist");
    cy.get('[data-cy="heading-sitio"]')
      .invoke("text")
      .should("equal", "Venta de Casas y Departamentos Exclusivos de Lujo");
    cy.get('[data-cy="heading-sitio"]')
      .invoke("text")
      .should("not.equal", "Bienes raices");
  });

  it("Prueba el loque de los iconos principales", () => {
    cy.get('[data-cy="heading-nosotros"]').should("exist");
    cy.get('[data-cy="heading-nosotros"]')
      .should("have.prop", "tagName")
      .should("equal", "H2");

    // Selecciona los iconos
    cy.get('[data-cy="iconos-nosotros"]').should("exist");
    cy.get('[data-cy="iconos-nosotros"]')
      .find(".icono")
      .should("have.length", 3);
    cy.get('[data-cy="iconos-nosotros"]')
      .find(".icono")
      .should("not.have.length", 6);
  });

  it("Prueba la seccion de propiedades", () => {
    // Debe haver 3 propiedades
    cy.get('[data-cy="anuncio"]').should("have.length", 3);
    cy.get('[data-cy="anuncio"]').should("not.have.length", 4);

    // Probar el enlace de las propiedades
    cy.get('[data-cy="enlace-propiedad"]').should(
      "have.class",
      "boton-amarillo-block"
    );
    cy.get('[data-cy="enlace-propiedad"]').should(
      "not.have.class",
      "boton-amarillo"
    );

    cy.get('[data-cy="enlace-propiedad"]')
      .first()
      .invoke("text")
      .should("equal", "Ver propiedad");

    // Probar el enlace a una cuenta
    cy.get('[data-cy="enlace-propiedad"]').first().click();
    cy.get('[data-cy="titulo-propiedad"]').should("exist");
    cy.wait(1000);
    cy.go("back");
  });

  it("Prueba el routing", () => {
    cy.get('[data-cy="todas-propiedades"]').should("exist");
    cy.get('[data-cy="todas-propiedades"]').should("have.class", "boton-verde");
    cy.get('[data-cy="todas-propiedades"]')
      .invoke("attr", "href")
      .should("equal", "/propiedades");
    cy.get('[data-cy="todas-propiedades"]').click();
    cy.get('[data-cy="heading-propiedades"]')
      .invoke("text")
      .should("equal", "Casas y Depas en Venta");
    cy.wait(1000);
    cy.go("back");
  });

  it("Pueba el bloque de contacto", () => {
    cy.get('[data-cy="iamgen-contacto"]').should("exist");
    cy.get('[data-cy="iamgen-contacto"]')
      .find("H2")
      .invoke("text")
      .should("equal", "Encuentra la casa de tus sueños");
    cy.get('[data-cy="iamgen-contacto"]')
      .find("p")
      .invoke("text")
      .should(
        "equal",
        "Llenar el formulario de contacto y un asesor se pondra en contacto con tigo a la brevedad"
      );
    cy.get('[data-cy="iamgen-contacto"]')
      .find("a")
      .invoke("attr", "href")
      .then((href) => cy.visit(href));
    cy.get('[data-cy="heading-contacto"]').should("exist");
    cy.wait(1000);
    cy.visit("/");
  });

  it("Prueba los testimoniales y el blog", () => {
    cy.get('[data-cy="blog"]').should("exist");
    cy.get('[data-cy="blog"]')
      .find("h3")
      .invoke("text")
      .should("equal", "Nuestro blog");
    cy.get('[data-cy="blog"]')
      .find("h3")
      .invoke("text")
      .should("not.equal", "Blog");

    cy.get('[data-cy="blog"]').find("img").should("have.length.greaterThan", 0);

    cy.get('[data-cy="testimoniales"]').should("exist");
    cy.get('[data-cy="testimoniales"]')
      .find("h3")
      .invoke("text")
      .should("not.equal", "Nuestros testimoniales");
  });
});
