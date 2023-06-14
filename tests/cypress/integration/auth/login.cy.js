/// <reference types="cypress" />
describe('Log In Test', () => {
  it('should log in succesfully ', () => {
    cy.visit('/login')
    cy.get('input[name="email"]').type('anisa@example.com');
    cy.get('input[name="password"]').type('password');
    cy.get('.text-white').click();
    cy.location('pathname').should('eq', '/');
  });

  it('should show error messages when email its not there', () => {
    cy.visit('/login');
    cy.get('input[name="email"]').type('wrong@example.com');
    cy.get('input[name="password"]').type('wrong');
    cy.get('.text-white').click();
    cy.get('.text-red-500').should('have.text', 'The provided credentials do not match our records.');
    cy.location('pathname').should('eq', '/login');
  });

  
})
