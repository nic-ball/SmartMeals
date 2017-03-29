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
    Given there is a person called Nic
    And there is a food item with the sku 357937
    And Nic has 0 favorited items
    When Nic favorites an item with sku 357937
    Then Nic should have 1 favorited item with sku 357937

  Scenario: Favoriting duplicate food items
    Given there is a person called Jim
    And there is a food item with the sku 111111111
    And Jim has 1 favorited food item with sku 111111111
    When Jim attempts to favorite the food item with the sku 111111111
    Then Jim should have 1 favorited food item with sku 111111111

  Scenario: Favoriting non-food items
    Given there is a person called Andy
    And there is a non-food item with the sku 222222222
    And Andy has favorited 0 items
    When Andy attempts to favorite a non-food item with the sku 222222222
    Then Andy should have 0 favorited items

  Scenario: Remove Favorited food item
    Given there is a person called Corey
    And Corey has 1 favorited item with sku 111111111
    When Corey removes the favorited food item with the sku 111111111
    Then Corey should not have a favorited item with sku 111111111

  Scenario: Attempting to remove an item that has not been favorited
    Given there is a person called Ron
    And Ron has 0 favorited items
    When Ron attempts to remove a favorited food item
    Then Ron should still have 0 favorited food items
