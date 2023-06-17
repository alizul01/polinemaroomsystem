/// <reference types="cypress" />
describe('Register Test', () => {
  beforeEach(() => {
    cy.exec('php artisan migrate:fresh --seed');
    cy.visit('/register');
  });

  it('should register a new user', () => {
    cy.get('input[name="name"]').type('John Doe');
    cy.get('input[name="email"]').type('johndoe@example.com');
    cy.get('input[name="password"]').type('password123');
    cy.get('input[name="password_confirmation"]').type('password123');
    cy.get('#register').click();

    cy.location('pathname').should('eq', '/login');
    cy.get('.swal2-title').should('be.visible').contains('Register success');
  });

  it('should failed to register a new user when email already exists', () => {
    cy.get('input[name="name"]').type('John Doe');
    cy.get('input[name="email"]').type('ali@example.com');
    cy.get('input[name="password"]').type('password123');
    cy.get('input[name="password_confirmation"]').type('password123');
    cy.get('#register').click();

    cy.get('.text-red-500').should('be.visible').contains('The email has already been taken.');
  });

  it('should show error messages when validation fails', () => {
    cy.get('#register').click();

    cy.get('[cy-data="error-name"]').should('be.visible').contains('The name field is required.');
    cy.get('[cy-data="error-email"]').should('be.visible').contains('The email field is required.');
    cy.get('[cy-data="error-password"]').should('be.visible').contains('The password field is required.');
  });

  it('should show error message when password confirmation does not match', () => {
    cy.get('input[name="name"]').type('John Doe');
    cy.get('input[name="email"]').type('johndoe@example.com');
    cy.get('input[name="password"]').type('password123');
    cy.get('input[name="password_confirmation"]').type('password321');

    cy.get('#register').click();

    cy.get('[cy-data="error-password"]').should('be.visible').contains('The password field confirmation does not match.');
  });
});
