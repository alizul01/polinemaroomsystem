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

  it('should show error when both email and password fields are empty', () => {
    cy.visit('/login');
    cy.get('.text-white').click();
    cy.get('[cy-data="error-email"]').should('have.text', 'The email field is required.');
    cy.get('[cy-data="error-password"]').should('have.text', 'The password field is required.');
    cy.location('pathname').should('eq', '/login');
  });


  it('should show error when the email field is empty', () => {
    cy.visit('/login');
    cy.get('input[name="password"]').type('password');
    cy.get('.text-white').click();
    cy.get('[cy-data="error-email"]').should('have.text', 'The email field is required.');
    cy.location('pathname').should('eq', '/login');
  });

  it('should show error when the password field is empty', () => {
    cy.visit('/login');
    cy.get('input[name="email"]').type('anisa@example.com');
    cy.get('.text-white').click();
    cy.get('[cy-data="error-password"]').should('have.text', 'The password field is required.');
    cy.location('pathname').should('eq', '/login');
  });


  it('should show error when password is incorrect', () => {
    cy.visit('/login');
    cy.get('input[name="email"]').type('anisa@example.com');
    cy.get('input[name="password"]').type('wrongpassword');
    cy.get('.text-white').click();
    cy.get('.text-red-500').should('have.text', 'The provided credentials do not match our records.');
    cy.location('pathname').should('eq', '/login');
  });

  it('should show error when email is incorrect', () => {
    cy.visit('/login');
    cy.get('input[name="email"]').type('wrongemail@example.com');
    cy.get('input[name="password"]').type('password');
    cy.get('.text-white').click();
    cy.get('.text-red-500').should('have.text', 'The provided credentials do not match our records.');
    cy.location('pathname').should('eq', '/login');
  });

  it('should navigate to /register when the link is clicked', () => {
    cy.visit('/login');
    cy.get('a[href="/register"]').click();
    cy.location('pathname').should('eq', '/register');
  });

})
