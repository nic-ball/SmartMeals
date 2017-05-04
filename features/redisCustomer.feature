Feature: Saving and finding a customer
  As a customer
  I need to save and find by email
  So I can save and find my star meals

  Rules:
  - Customers should be saved by email
  - Customers should not be signed up more than once
  - Customers should be findable by email

  Scenario: New customer sign up
    Given there is a customer with the email address "terry@terry.com"
    And the customer has not signed up with the email address "terry@terry.com"
    When the customer signs up with the email address "terry@terry.com"
    Then the customer should be saved to the data store by the email address "terry@terry.com"

  Scenario: Customer duplicate sign up
    Given there is a customer with the email address "terry@terry.com"
    And the customer has signed up with the email address "terry@terry.com"
    When the customer attempts to sign up again with the same email address "terry@terry.com"
    Then the customer should still be signed up with the email address "terry@terry.com"

  Scenario: Customer should be findable by email
    Given there is a customer with the email address "terry@terry.com"
    And the customer has signed up with the email address "terry@terry.com"
    When the email address "terry@terry.com" is searched for
    Then the customer should be findable with "terry@terry.com"
