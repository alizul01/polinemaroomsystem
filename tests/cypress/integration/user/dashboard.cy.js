/// <reference types="cypress" />

describe('Dashboard Test', () => {
  before(() => {
    cy.exec('php artisan migrate:fresh --seed');
  })

  beforeEach(() => {
    cy.visit('/login');
    cy.get('input[name="email"]').type('ali@example.com');
    cy.get('input[name="password"]').type('password');
    cy.get('.text-white').click();
  })

  it('should show dashboard page', () => {
    cy.location('pathname').should('eq', '/');
    cy.get('.text-xl').should('be.visible').contains('Ruangan');
  });

  it('should show list of rooms', () => {
    cy.get('.grid-cols-3').should('be.visible');
    cy.get('.grid-cols-3').children().should('have.length.at.least', 3);
  });

  it('should can click reservation link and show reservation page', () => {
    cy.get('a[href="/reservation"]').click();
    cy.location('pathname').should('eq', '/reservation');
  });

  it('should can click process link and show process page', () => {
    cy.contains('Proses').click();
    cy.location('pathname').should('eq', '/process');
  });

  it('should can click logout link and show login page', () => {
    cy.get('#userDropdown').click();
    cy.get('a[href="/logout"]').click();
    cy.location('pathname').should('eq', '/login');
  });
});
