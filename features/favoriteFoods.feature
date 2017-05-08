Feature: Starring a meal from the menu
  In order to star and unstar meals from the menu
  As a Customer
  I need to be able to save and delete meals

  Rules:
  - Meals should be allowed to starred
  - Duplicate meals should not starred
  - Starred meals should be removable

  Scenario: Star a meal
    Given there is a customer with the email address "nic@nic.com"
    And there is a meal with the menu number 12
    And "nic@nic.com" has no starred meals
    When "nic@nic.com" stars a meal with the menu number 12
    Then "nic@nic.com" should have a starred meal with the menu number 12

  Scenario: Star duplicate meals
    Given there is a customer with the email address "nic@nic.com"
    And there is a meal with the menu number 1
    And "nic@nic.com" has starred a meal with the menu number 1
    When "nic@nic.com" attempts to star the meal with the menu number 1
    Then "nic@nic.com" should have a starred meal with the menu number 1

  Scenario: Remove Starred meal
    Given there is a customer with the email address "nic@nic.com"
    And there is a meal with the menu number 1
    And "nic@nic.com" has starred a meal with the menu number 1
    When "nic@nic.com" unstars the meal with the menu number 1
    Then "nic@nic.com" should not have a starred meal with the menu number 1

  Scenario: Attempting to unstar a meal that has not been starred
    Given there is a customer with the email address "nic@nic.com"
    And there is a meal with the menu number 1
    And "nic@nic.com" has no starred meals
    When "nic@nic.com" attempts to unstar meal with the menu number 1
    Then "nic@nic.com" should not have a starred meal with the menu number 1
