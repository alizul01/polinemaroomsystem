/// <reference types="cypress" />
const roles = ['bem', 'himpunan', 'kajur'];
const emails = {
  bem: 'bem@admin.com',
  himpunan: 'hmti@admin.com',
  kajur: 'kajur@admin.com',
};
const password = 'password';

describe('Reservation page', () => {
  beforeEach(() => {
    cy.visit('/login');
    cy.get('input[name=email]').type('user@example.com');
    cy.get('input[name=password]').type('password');
    cy.get('button[type=submit]').click();
    cy.visit('/reservation');
  });

  it('should display main header', () => {
    cy.get('h1').should('contain', 'Peminjaman');
  });

  it('should display checkbox for completed reservations', () => {
    cy.get('#link-checkbox').should('exist');
  });

  it('should display the reservation table', () => {
    cy.get('table').should('exist');
  });

  it('should display columns correctly', () => {
    cy.get('th').eq(0).should('contain', 'No');
    cy.get('th').eq(1).should('contain', 'Tanggal Diajukuan');
    cy.get('th').eq(2).should('contain', 'Ruangan');
    cy.get('th').eq(3).should('contain', 'Tanggal Dipakai');
    cy.get('th').eq(4).should('contain', 'Val.Bem');
    cy.get('th').eq(5).should('contain', 'Val.Himpunan');
    cy.get('th').eq(6).should('contain', 'Val.KaJur');
  });

  it('should toggle the checkbox for completed reservations', () => {
    cy.get('#link-checkbox').check().should('be.checked');
    cy.get('#link-checkbox').uncheck().should('not.be.checked');
  });
});

it('Renders the page', () => {
  cy.get('table').should('exist');
});

it('Shows the correct approval status', () => {
  cy.get('.status-button').should('have.text', 'Pending');
});

it('Shows the correct approval stages', () => {
  cy.get('#accordion-collapse-heading').click();

  cy.get('[data-popover-target="popover-1"]').trigger('mouseover');
  cy.get('#popover-1').should('be.visible').and('have.text', 'On Progress');

  cy.get('[data-popover-target="popover-2"]').trigger('mouseover');
  cy.get('#popover-2').should('be.visible').and('have.text', 'On Progress');

  cy.get('[data-popover-target="popover-3"]').trigger('mouseover');
  cy.get('#popover-3').should('be.visible').and('have.text', 'On Progress');
});

roles.forEach((role) => {
  describe(`${role} validation button click`, () => {
    beforeEach(() => {
      cy.visit('/login');
      cy.get('input[name=email]').type(emails[role]);
      cy.get('input[name=password]').type(password);
      cy.get('button[type=submit]').click();
      cy.visit('/approval');
    });

    it(`should click the validation button for ${role} and check reservation status`, () => {
      cy.get(`form[id^=${role}Form] button`).first().click();
      cy.get('button.confirm').click();
      cy.wait(1000);
      cy.get('td:nth-child(5) span').first()
        .should('have.text', 'Validasi Terkonfirmasi');
    });
  });
});
