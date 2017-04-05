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
        $itemToCheck = $this->foodItems[$itemSku];
        $hasFavorited = $person->hasFavorited($itemToCheck);

        if($hasFavorited == false) {
            throw new Exception('Person has not favorited item with sku');
        }
    }

    /**
     * @Given there is a non-food item with the sku :itemSku
     */
    public function thereIsANonFoodItemWithTheSku($itemSku)
    {
        $this->foodItems[$itemSku] = "";
    }

    /**
     * @When :firstName attempts to favorite a non-food item with the sku :itemSku
     */
    public function someoneAttemptsToFavoriteANonFoodItemWithTheSku($firstName, $itemSku)
    {
        $person = $this->people[$firstName];
        //$nonFood = $this->nonFoodItems;

        try {
            $person->favoriteItem("");
        } catch (TypeError $error) {
            // Do nothing
        }
    }

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

        $person->removeFavoriteItems($foodItemToRemove);
    }

    /**
     * @Then :firstName should not have a favorited item with sku :itemSku
     */
    public function someoneShouldNotHaveAFavoritedItemWithSku($firstName, $itemSku)
    {
        $person = $this->people[$firstName];
        $itemToCheck = $this->foodItems[$itemSku];
        $hasFavorited = $person->hasFavorited($itemToCheck);

        if($hasFavorited == true) {
            throw new Exception('Person has favorited item with sku');
        }
    }
    /**
     * @When :firstName attempts to remove a favorited food item with the sku :itemSku
     */
    public function attemptsToRemoveAFavoritedFoodItemWithTheSku($firstName, $itemSku)
    {
        $person = $this->people[$firstName];
        $itemToRemove = $this->foodItems[$itemSku];

        try {
            $person->removeFavoriteItems($itemToRemove);
        } catch (Exception $exception) {
            //Do Nothing
        }
    }

}