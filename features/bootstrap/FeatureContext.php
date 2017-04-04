<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    private $person;
    private $foodItem;

    /** @var Person[] */
    private $people = [];

    /** @var FoodItem[] */
    private $foodItems = [];


    public function __construct()
    {

    }

    /**
     * @Given there is a person called :firstName
     */
    public function thereIsAPersonCalled(string $firstName)
    {
        //this->person = new Person($firstName, 'Baloo', new DateTime(1981-06-23), "5'7", 'Blue', 'M', ['']);
        $this->people[$firstName] = new Person($firstName, 'Baloo', new DateTime(1981 - 06 - 23), "5'7", 'Blue', 'M', ['']);
    }

    /**
     * @Given there is a food item with the sku :itemSku
     */
    public function thereIsAFoodItemWithTheSku(int $itemSku)
    {
        //$this->foodItem = new FoodItem('Milk', 'Tasty goodness', 1, $itemSku);
        $this->foodItems[$itemSku] = new FoodItem('Milk', 'Tasty goodness', 1, $itemSku);
    }

    /**
     * @Given :firstName has no favorited items
     */
    public function someoneHasNoFavoritedItems($firstName)
    {
        //$this->favoritedItems = $favoritedItems;
    }

    /**
     * @When :firstName favorites an item with sku :itemSku
     */
    public function favoritesAnItemWithSku($firstName, $itemSku)
    {
        $person = $this->people[$firstName];
        $foodItems = $this->foodItems[$itemSku];
        $person->favoriteItem($foodItems);
    }

    /**
     * @Then :firstName should have favorited the item with sku :itemSku
     */
    public function shouldHaveFavoritedTheItemWithSku($firstName, $itemSku)
    {
        $person = $this->people[$firstName];
        $favoritedItems = $person->getFavoriteItems();

        if (array_key_exists($itemSku, $favoritedItems) == false) {
            throw new Exception('The person has not favorited the item');
        }
    }

    /**
     * @Given :firstName has favorited a food item with sku :itemSku
     */
    public function hasFavoritedAFoodItemWithSku($firstName, $itemSku)
    {
        $person = $this->people[$firstName];
        $foodItem = $this->foodItems[$itemSku];
        $person->favoriteItem($foodItem);
    }

    /**
     * @When :firstName attempts to favorite the food item with the sku :itemSku
     */
    public function someoneAttemptsToFavoriteTheFoodItemWithTheSku($firstName, $itemSku)
    {
        $person = $this->people[$firstName];
        $foodItem = $this->foodItems[$itemSku];

        try {
            $person->favoriteItem($foodItem);
        } catch (Exception $exception) {
            // Do nothing...
        }
    }

    /**
     * @Then :firstName should have favorited food item with sku :itemSku
     */
    public function someoneShouldHaveFavoritedFoodItemWithSku($firstName, $itemSku)
    {
        $person = $this->people[$firstName];
        $foodItem = $this->foodItems[$itemSku];
        $person->getFavoriteItems($foodItem);
    }
//    /**
//     * @Given there is a non-food item with the sku :nonFoodSku
//     */
//    public function thereIsANonFoodItemWithTheSku(int $nonFoodSku)
//    {
//        $this->nonFoodItem[$nonFoodSku] = new NonFoodItem("Bleach", "Cleans floors", 2, $nonFoodSku);
//    }
//
//    /**
//     * @Given :firstName has favorited no items
//     */
//    public function hasFavoritedNoItems($firstName)
//    {
//        //No items favorited
//    }
//
//    /**
//     * @When :firstName attempts to favorite a non-food item with the sku :nonFoodSku
//     */
//    public function attemptsToFavoriteANonFoodItemWithTheSku($firstName, $nonFoodSku)
//    {
////        $person = $this->people[$firstName];
////        $nonFoodItem = $this->nonFoodItem[$nonFoodSku];
////        $person->
//    }
//
//    /**
//     * @Then :arg1 should have :arg2 favorited items
//     */
//    public function shouldHaveFavoritedItems($arg1, $arg2)
//    {
//        throw new PendingException();
//    }
    /**
     * @Given :firstName has favorited item with sku :itemSku
     */
    public function someoneHasFavoritedItemWithSku($firstName, $itemSku)
    {
        $person = $this->people[$firstName];
        $foodItems = $this->foodItems[$itemSku];
        $person->favoriteItem($foodItems);
    }

    /**
     * @When :firstName removes the favorited food item with the sku :itemSku
     */
    public function removesTheFavoritedFoodItemWithTheSku($firstName, $itemSku)
    {
        $person = $this->people[$firstName];
        $foodItemToRemove = $this->foodItems[$itemSku];

        try {
            $person->removeFavoriteItems($foodItemToRemove);
        } catch (Exception $exception) {
            //Do Nothing
        }
    }

    /**
     * @Then :firstName should not have a favorited item with sku :itemSku
     */
    public function someoneShouldNotHaveAFavoritedItemWithSku($firstName, $itemSku)
    {
        $person = $this->people[$firstName];
        $favoritedItems = $person->getFavoriteItems();

        if (array_key_exists($itemSku, $favoritedItems) == true) {
            throw new Exception('This item should have been removed');
        }
    }
    /**
     * @When :firstName attempts to remove a favorited food item with the sku :itemSku
     */
    public function attemptsToRemoveAFavoritedFoodItemWithTheSku($firstName, $itemSku)
    {
        $person = $this->people[$firstName];
        $favoritedItems = $person->getFavoriteItems();

        if (array_key_exists($itemSku, $favoritedItems) == true) {
            throw new Exception("Cannot remove a favorite when no favorites have been added!");
        }
    }

    /**
     * @Then :firstName should still have no favorited food items with the sku :itemSku
     */
    public function shouldStillHaveNoFavoritedFoodItemsWithTheSku($firstName, $itemSku)
    {
        $person = $this->people[$firstName];
        $favoritedItems = $person->getFavoriteItems();

        if (array_key_exists($itemSku, $favoritedItems) == true) {
            throw new Exception("No food items should exist");
        }
    }
}




