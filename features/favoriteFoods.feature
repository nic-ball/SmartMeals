Feature: Starring a meal from the menu
  In order to star and unstar meals from the menu
  As a Customer
  I need to be able to save and delete meals

  Rules:
  - Meals should be allowed to starred
  - Duplicate meals should not starred
  - Starred items should be removable

  Scenario: Starring a meal
    Given there is a customer called "Nic"
    And there is a meal with the menu number 12
    And "Nic" has no starred meals
    When "Nic" stars a meal with the menu number 12
    Then "Nic" should have a starred meal with the menu number 12

  Scenario: Starring duplicate meals
    Given there is a customer called "Jim"
    And there is a meal with the menu number 1
    And "Jim" has starred a meal with the menu number 1
    When "Jim" attempts to star the meal with the menu number 1
    Then "Jim" should have a starred meal with the menu number 1

  Scenario: Remove Starred meal
    Given there is a customer called "Corey"
    And there is a meal with the menu number 1
    And "Corey" has starred a meal with the menu number 1
    When "Corey" unstars the meal with the menu number 1
    Then "Corey" should not have a starred meal with the menu number 1

  Scenario: Attempting to remove a meal that has not been starred
    Given there is a customer called "Ron"
    And there is a meal with the menu number 1
    And "Ron" has no starred meals
    When "Ron" unstars the meal with the menu number 1
    Then "Ron" should not have a starred meal with the menu number 1
