/// <reference types="cypress" />

describe('Admin Approvement Test', () => {
  before(() => {
    cy.exec('php artisan migrate:fresh --seed');
  })
  it('Himpunan should be able to approve a reservation', () => {
    cy.visit('/login');
    cy.get('input[name="email"]').type('hmti@admin.com');
    cy.get('input[name="password"]').type('password');
    cy.get('.text-white').click();
    cy.contains('Approval').click();
    cy.get('.bg-green-700').click();
    cy.get('.swal2-confirm').click();
    cy.get('.swal2-title').contains('Reservasi berhasil disetujui');
    cy.get('#status-himpunan-1').should('contain', 'Validasi Terkonfirmasi');
  });

  it('Bem should be able to approve a reservation', () => {
    cy.visit('/login');
    cy.get('input[name="email"]').type('bem@admin.com');
    cy.get('input[name="password"]').type('password');
    cy.get('.text-white').click();
    cy.contains('Approval').click();
    cy.get('.bg-green-700').click();
    cy.get('.swal2-confirm').click();
    cy.get('.swal2-title').contains('Reservasi berhasil disetujui');
    cy.get('#status-bem-1').should('contain', 'Validasi Terkonfirmasi');
  });

  it('Kajur should be able to approve a reservation', () => {
    cy.visit('/login');
    cy.get('input[name="email"]').type('kajur@admin.com');
    cy.get('input[name="password"]').type('password');
    cy.get('.text-white').click();
    cy.contains('Approval').click();
    cy.get('.bg-green-700').click();
    cy.get('.swal2-confirm').click();
    cy.get('.swal2-title').contains('Reservasi berhasil disetujui');
    cy.get('#status-kajur-1').should('contain', 'Validasi Terkonfirmasi');
  });

  it('User should can see final approved status and download the file', () => {
    cy.visit('/login');
    cy.get('input[name="email"]').type('ali@example.com');
    cy.get('input[name="password"]').type('password');
    cy.get('.text-white').click();
    cy.contains('Proses').click();
    cy.get('#status-1').should('contain', 'Approved');
    cy.get('#accordion-collapse-button').click();
    cy.get('#status-download-1').should('be.visible');
  });
});

