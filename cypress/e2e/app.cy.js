/// <reference types="Cypress" />
describe('app', () => {
  beforeEach(function() {
    cy.visit('localhost/wordpress-theme-boilerplate')
  })

  it('should display a welcome message', () => {
    cy.contains('hello')
  })
})