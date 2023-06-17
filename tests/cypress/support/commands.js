/// <reference types="cypress" />
Cypress.Commands.add('login', (email, password) => {
  cy.request({
    method: 'POST',
    url: '/login', // ganti dengan endpoint login Anda
    body: {
      email: email,
      password: password,
    },
  }).then((resp) => {
    expect(resp.status).to.eq(200); // asumsi response sukses adalah 200
  });
});
