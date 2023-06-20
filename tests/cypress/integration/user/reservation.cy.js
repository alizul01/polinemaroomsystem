/// <reference types="cypress" />

describe('Reservation Test', () => {
  beforeEach(() => {
    cy.exec('php artisan migrate:fresh --seed');
    cy.visit('/login');
    cy.get('input[name="email"]').type('ali@example.com');
    cy.get('input[name="password"]').type('password');
    cy.get('.text-white').click();
    cy.visit('/reservation');
  });

  it('Fills out reservation form and submits it', () => {
    cy.get('input[name="start_date"]').type('2023-07-20');
    cy.get('input[name="start_time"]').type('09:00');
    cy.get('input[name="end_time"]').type('15:00');
    cy.get('input[name="participant"]').type('5');
    cy.get('textarea[name="keterangan"]').type('This is a test reservation.');
    cy.get('#submit').click();
    cy.url().should('include', '/reservation-2');
  });

  it('Shows validation error when end time is before start time', () => {
    cy.get('input[name="start_date"]').type('2023-07-20');
    cy.get('input[name="start_time"]').type('15:00');
    cy.get('input[name="end_time"]').type('09:00');
    cy.get('input[name="participant"]').type('5');
    cy.get('textarea[name="keterangan"]').type('This is a test reservation.');
    cy.get('#submit').click();
    cy.get('.text-red-500').contains('The end time field must be a date after start time');
  });

  it('Shows validation error when no date is selected', () => {
    cy.get('input[name="start_time"]').type('09:00');
    cy.get('input[name="end_time"]').type('15:00');
    cy.get('input[name="participant"]').type('5');
    cy.get('textarea[name="keterangan"]').type('This is a test reservation.');
    cy.get('#submit').click();
    cy.get('.text-red-500').contains('The start date field is required.');
  });

  it('Shows validation error when no time is selected', () => {
    cy.get('input[name="start_date"]').type('2023-07-20');
    cy.get('input[name="participant"]').type('5');
    cy.get('textarea[name="keterangan"]').type('This is a test reservation.');
    cy.get('#submit').click();
    cy.get('.text-red-500').contains('The start time field is required.');
  });

  it('Should can do a room reservation', () => {
    cy.get('input[name="start_date"]').type('2023-07-20');
    cy.get('input[name="start_time"]').type('09:00');
    cy.get('input[name="end_time"]').type('15:00');
    cy.get('input[name="participant"]').type('5');
    cy.get('textarea[name="keterangan"]').type('This is a test reservation.');
    cy.get('#submit').click();
    cy.url().should('include', '/reservation-2');

    cy.get('#bookBtn1').click();

    cy.get('.bookBtn').each(($btn) => {
      if ($btn.attr('id') !== 'bookBtn1') {
        cy.wrap($btn).should('be.disabled');
      }
    });

    cy.get('form').submit();

    cy.url().should('include', '/reservation-final');
    cy.get('tbody').within(() => {
      cy.get('tr').should('have.length', 5)
      cy.get('tr').eq(0).find('td').eq(2).should('contain', '20 July 2023'); // start_date
      cy.get('tr').eq(1).find('td').eq(2).should('contain', '09:00'); // start_time
      cy.get('tr').eq(2).find('td').eq(2).should('contain', '15:00'); // end_time
      cy.get('tr').eq(3).find('td').eq(2).should('contain', '5'); // participant
      cy.get('tr').eq(4).find('td').eq(2).should('contain', 'This is a test reservation.'); // keterangan
    });

    cy.get('#submitBtn').click();

    cy.url().should('include', '/reservation');
  });

});
