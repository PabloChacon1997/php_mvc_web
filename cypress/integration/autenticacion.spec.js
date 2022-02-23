/// <reference types="cypress" />

describe("Probar la autenticacion", () => {
  it("Prueba la autenticacion en el Login", () => {
    cy.visit("/login");
    cy.get('[data-cy="heading-login"]').should("exist");
    cy.get('[data-cy="heading-login"]').should("have.text", "Iniciar Sesión");
    cy.get('[data-cy="formulario-login"]').should("exist");

    // Ambos campos obligatorios
    cy.get('[data-cy="formulario-login"]').submit();
    cy.get('[data-cy="alerta-login"]').should("exist");
    cy.get('[data-cy="alerta-login"]').eq(0).should("have.class", "error");
    cy.get('[data-cy="alerta-login"]')
      .eq(0)
      .should("have.text", "El email es obligatorio");
    cy.get('[data-cy="alerta-login"]').eq(1).should("have.class", "error");
    cy.get('[data-cy="alerta-login"]')
      .eq(1)
      .should("have.text", "El password es obligatorio");
    // Usuario existe
    cy.get('[data-cy="input-email"]').should("exist");
    cy.get('[data-cy="input-email"]').type("corrreo@correo.com");
    cy.get('[data-cy="input-password"]').type("123456");

    cy.get('[data-cy="formulario-login"]').submit();

    cy.get('[data-cy="alerta-login"]').eq(0).should("have.class", "error");
    cy.get('[data-cy="alerta-login"]')
      .eq(0)
      .should("have.text", "El usuario y/o password incorrecto/s");
    // Password es correcto

    cy.get('[data-cy="input-email"]').type("corrreo@correo.com");
    cy.get('[data-cy="input-password"]').type("12345");

    cy.get('[data-cy="formulario-login"]').submit();

    cy.get('[data-cy="alerta-login"]')
      .eq(0)
      .should("have.text", "El usuario y/o password incorrecto/s");

    // Acceso al admin con email y passaword correctos

    cy.get('[data-cy="input-email"]').type("correo@correo.com");
    cy.get('[data-cy="input-password"]').type("123456");

    cy.get('[data-cy="formulario-login"]').submit();

    cy.get('[data-cy="heading-admin"]').should("exist");
    cy.get('[data-cy="heading-admin"]').should(
      "have.text",
      "Administrador de Bienes Raices"
    );
  });
});
