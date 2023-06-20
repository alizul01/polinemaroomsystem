

describe('SuperAdmin Tests', () => {
  beforeEach(() => {
    cy.visit('/login')
    cy.get('input[name=email]').type('polarys@superadmin.com')
    cy.get('input[name=password]').type('polarys#2023admproj1')
    cy.get('.text-white').click();
    cy.url().should('include', '/admin')
  })

  it('should be able to create a new user', () => {
    cy.visit('/admin/user/create')
    cy.get('input[name=name]').type('Test User')
    cy.get('input[name=email]').type('test@test.com')
    cy.get('input[name=password]').type('password')
    cy.get('select[name=role]').select('User')
    cy.get('#submit').click()
    cy.url().should('include', '/admin/user')
  })

  it('should be able to update a user', () => {
    cy.visit('/admin/user/6/edit')
    cy.get('input[name=name]').clear().type('Updated Test User')
    cy.get('#submit').click()
    cy.url().should('include', '/admin/user')
  })

  it('should be able to delete a user', () => {
    cy.visit('/admin/user')
    cy.get('form#form-5 button[type=button]').click()
    cy.url().should('include', '/admin/user')
  })

  it('should be able to create a new room', () => {
    cy.visit('/admin/room/create')
    cy.get('input[name=code]').type('Test Room')
    cy.get('input[name=name]').type('Test Room')
    cy.get('input[name=floor]').type('1')
    cy.get('input[name=capacity]').type('30')
    cy.get('button#submit').click()
    cy.url().should('include', '/admin/room')

  })

  it('should be able to update a room', () => {
    cy.visit('/admin/room/1/edit')
    cy.get('input[name=name]').clear().type('Updated Test Room')
    cy.get('button#submit').click()
    cy.url().should('include', '/admin/room')

  })

  it('should be able to delete a room', () => {
    cy.visit('/admin/room')
    cy.get('form#form-1 button[type=button]').click()
    cy.url().should('include', '/admin/room')

  })

})
