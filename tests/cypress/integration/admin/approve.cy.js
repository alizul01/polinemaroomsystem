/// <reference types="cypress" />

describe('Admin Approvement Test', () => {
  it('Himpunan should be able to approve a reservation', () => {
    cy.visit('/login');
    cy.get('input[name="email"]').type('hmti@admin.com');
    cy.get('input[name="password"]').type('password');
    cy.get('.text-white').click();
    cy.visit('/approval');
    cy.get('.bg-green-700').click();
    cy.get('.swal2-confirm').click();
    cy.get('.swal2-title').contains('Reservasi berhasil disetujui');
    cy.get('#status-himpunan-1').should('contain', 'Validasi Terkonfirmasi');
  });
})
