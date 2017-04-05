Feature: Favoriting a food item
  In order to add and remove favorite food items
  As a Person
  I need to be able to save and delete food items

  Rules:
  - Food items should be allowed to favorited
  - Duplicate food items should not favorited
  - Non-food items should not be favorited
  - Favorited items should be removable

  Scenario: Favoriting food item
    Given there is a person called "Nic"
    And there is a food item with the sku 357937
    And "Nic" has no favorited items
    When "Nic" favorites an item with sku 357937
    Then "Nic" should have favorited food item with sku 357937

  Scenario: Favoriting duplicate food items
    Given there is a person called "Jim"
    And there is a food item with the sku 111111111
    And "Jim" has favorited a food item with sku 111111111
    When "Jim" attempts to favorite the food item with the sku 111111111
    Then "Jim" should have favorited food item with sku 111111111

  Scenario: Remove Favorited food item
    Given there is a person called "Corey"
    And there is a food item with the sku 111111111
    And "Corey" has favorited item with sku 111111111
    When "Corey" removes the favorited food item with the sku 111111111
    Then "Corey" should not have a favorited item with sku 111111111

  Scenario: Attempting to remove an item that has not been favorited
    Given there is a person called "Ron"
    And there is a food item with the sku 111111111
    And "Ron" has no favorited items
    When "Ron" attempts to remove a favorited food item with the sku 111111111
    Then "Ron" should not have a favorited item with sku 111111111
