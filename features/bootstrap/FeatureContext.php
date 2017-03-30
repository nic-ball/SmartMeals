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
    //private $favoritedItems;

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
        $this->people[$firstName] = new Person($firstName, 'Baloo', new DateTime(1981-06-23), "5'7", 'Blue', 'M', ['']);
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
    public function attemptsToFavoriteTheFoodItemWithTheSku($firstName, $itemSku)
    {
        $person = $this->people[$firstName];
        $foodItem = $this->foodItems[$itemSku];
        $person->favoriteItem($foodItem);
    }

    /**
     * @Then :firstName should have :itemSku favorited food item with sku :arg2
     */
    public function someoneShouldHaveFavoritedFoodItemWithSku($firstName, $itemSku)
    {
        $person
    }

    /**
     * @Given there is a person called Andy
     */
    public function thereIsAPersonCalledAndy()
    {
        throw new PendingException();
    }

    /**
     * @Given there is a non-food item with the sku :arg1
     */
    public function thereIsANonFoodItemWithTheSku($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given Andy has favorited :arg1 items
     */
    public function andyHasFavoritedItems($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When Andy attempts to favorite a non-food item with the sku :arg1
     */
    public function andyAttemptsToFavoriteANonFoodItemWithTheSku($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then Andy should have :arg1 favorited items
     */
    public function andyShouldHaveFavoritedItems($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given there is a person called Corey
     */
    public function thereIsAPersonCalledCorey()
    {
        throw new PendingException();
    }

    /**
     * @Given Corey has :arg1 favorited item with sku :arg2
     */
    public function coreyHasFavoritedItemWithSku($arg1, $arg2)
    {
        throw new PendingException();
    }

    /**
     * @When Corey removes the favorited food item with the sku :arg1
     */
    public function coreyRemovesTheFavoritedFoodItemWithTheSku($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then Corey should not have a favorited item with sku :arg1
     */
    public function coreyShouldNotHaveAFavoritedItemWithSku($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given there is a person called Ron
     */
    public function thereIsAPersonCalledRon()
    {
        throw new PendingException();
    }

    /**
     * @Given Ron has :arg1 favorited items
     */
    public function ronHasFavoritedItems($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When Ron attempts to remove a favorited food item
     */
    public function ronAttemptsToRemoveAFavoritedFoodItem()
    {
        throw new PendingException();
    }

    /**
     * @Then Ron should still have :arg1 favorited food items
     */
    public function ronShouldStillHaveFavoritedFoodItems($arg1)
    {
        throw new PendingException();
    }
}
