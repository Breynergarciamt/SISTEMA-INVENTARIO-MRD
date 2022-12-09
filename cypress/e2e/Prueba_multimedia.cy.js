describe("Prueba_multimedia", () => {
it("tests Prueba_multimedia", () => {
  cy.viewport(811, 657);

  cy.visit("http://localhost/ventasAlmacen-master/index.php");

  cy.get("#usuario").click();

  cy.get("#usuario").type("prueba");

  cy.get("#password").click();

  cy.get("#password").type("1234");

  cy.get("#entrarSistema").click();
  cy.location("href").should("eq", "http://localhost/ventasAlmacen-master/vistas/inicio.php");

  cy.get("#navbar > ul > li:nth-child(2) > a").click();

  cy.get("#navbar > ul > li.dropdown.open > ul > li:nth-child(1) > a").click();
  cy.location("href").should("eq", "http://localhost/ventasAlmacen-master/vistas/categorias.php");

  cy.get("#categoria").click();

  cy.get("#categoria").type("Herramientas");

  cy.get("#btnAgregaCategoria").click();

  cy.get("#navbar > ul > li:nth-child(2) > a").click();

  cy.get("#navbar > ul > li.dropdown.open > ul > li:nth-child(2) > a").click();
  cy.location("href").should("eq", "http://localhost/ventasAlmacen-master/vistas/articulos.php");

  cy.get("#categoriaSelect").select('Herramientas');

  cy.get("#categoriaSelect").type("3");

  cy.get("#nombre").click();

  cy.get("#nombre").type("destornillador");

  cy.get("#descripcion").click();

  cy.get("#descripcion").type("herramientaxd");

  cy.get("#cantidad").click();

  cy.get("#cantidad").type("3");

  cy.get("#precio").click();

  cy.get("#precio").type("3500");

  cy.get("#imagen").click();

  cy.get("#imagen").attachFile("producto1.jpg");

  cy.get("#btnAgregaArticulo").click();

  cy.get('.ajs-message').should('include.text', 'Agregado')

  });
});
