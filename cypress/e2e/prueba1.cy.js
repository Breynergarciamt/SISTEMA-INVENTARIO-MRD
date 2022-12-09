describe('prueba 1', () => {
  it('Creacion de un cliente', () => {
    cy.visit('http://localhost/ventasAlmacen-master/');
    cy.get('#usuario').type('prueba');
    cy.get('#password').type('1234');
    cy.get('#entrarSistema').click(); 
  })
})


