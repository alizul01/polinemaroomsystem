/// <reference types="cypress" />
describe('Register Test', () => {
  beforeEach(() => {
    cy.exec('php artisan db:wipe --env=testing && php artisan migrate --env=testing && php artisan db:seed --env=testing');
    cy.visit('/register');
  });

  it('should register a new user', () => {
    cy.get('input[name="name"]').type('John Doe');
    cy.get('input[name="email"]').type('johndoe@example.com');
    cy.get('input[name="password"]').type('password123');
    cy.get('input[name="password_confirmation"]').type('password123');

    const fileName = 'identity-file.jpg';
    cy.fixture(fileName).then((fileContent) => {
      cy.get('input[type="file"]').attachFile({
        fileContent: fileContent.toString(),
        fileName: fileName,
        mimeType: 'image/png',
      });
    });

    cy.get('button[type="submit"]').click();

    cy.location('pathname').should('eq', '/');
    cy.get('.toast-success').should('be.visible').contains('Register success');
  });

  it('should show error messages when validation fails', () => {
    cy.get('button[type="submit"]').click();

    cy.get('.invalid-feedback').should('be.visible').contains('The name field is required.');
    cy.get('.invalid-feedback').should('be.visible').contains('The email field is required.');
    cy.get('.invalid-feedback').should('be.visible').contains('The password field is required.');
    cy.get('.invalid-feedback').should('be.visible').contains('The identity field is required.');
  });
});
