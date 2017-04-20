<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use WorkSpace\PersonService\Entity\Customer;
use WorkSpace\PersonService\Entity\Meal;
use WorkSpace\PersonService\Entity\GymOwner;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{

    /** @var Customer[] */
    private $customers = [];

    /** @var Meal[] */
    private $meals = [];

    /** @var GymOwner[] */
    private $owners = [];


    public function __construct()
    {

    }

    /**
     * @Given there is a customer called :firstName
     */
    public function thereIsACustomerCalled(string $firstName)
    {
        //this->person = new Person($firstName, 'Baloo', new DateTime(1981-06-23), "5'7", 'Blue', 'M', ['']);
        $this->customers[$firstName] = new Customer($firstName, 'nunchuckbaloo@gmail.com', ['']);
    }

    /**
     * @Given there is a meal with the menu number :menuNumber
     */
    public function thereIsAMealWithTheMenuNumber(int $menuNumber)
    {
        $this->meals[$menuNumber] = new Meal('Butternut squash ravioli', 5.95, 35, 40, 12, $menuNumber);
    }

    /**
     * @Given :firstName has no starred meals
     */
    public function someoneHasNoStarredMeals($firstName)
    {

    }

    /**
     * @When :firstName stars a meal with the menu number :menuNumber
     */
    public function someoneStarsAMealWithTheMenuNumber($firstName, $menuNumber)
    {
        $customer = $this->customers[$firstName];
        $meal = $this->meals[$menuNumber];
        $customer->starMeal($meal);

    }

    /**
     * @Then :firstName should have a starred meal with the menu number :menuNumber
     */
    public function someoneShouldHaveAStarredMealWithTheMenuNumber($firstName, $menuNumber)
    {
        $customer = $this->customers[$firstName];
        $meal = $this->meals[$menuNumber];
        $customer->hasStar($meal);
    }

    /**
     * @Given :firstName has starred a meal with the menu number :menuNumber
     */
    public function someoneHasStarredAMealWithTheMenuNumber($firstName, $menuNumber)
    {
        $customer = $this->customers[$firstName];
        $meal = $this->meals[$menuNumber];
        $customer->starMeal($meal);
    }

    /**
     * @When :firstName attempts to star the meal with the menu number :menuNumber
     */
    public function someoneAttemptsToStarTheMealWithTheMenuNumber($firstName, $menuNumber)
    {
        $customer = $this->customers[$firstName];
        $meal = $this->meals[$menuNumber];

        try {
            $customer->starMeal($meal);
        } catch (Exception $exception) {
            // Do Nothing
        }
    }

    /**
     * @When :firstName unstars the meal with the menu number :menuNumber
     */
    public function someoneUnstarsTheMealWithTheMenuNumber($firstName, $menuNumber)
    {
        $customer = $this->customers[$firstName];
        $mealToCheck = $this->meals[$menuNumber];
        $customer->unStarMeal($mealToCheck);
    }

    /**
     * @When :firstName attempts to unstar meal with the menu number :menuNumber
     */
    public function someoneAttemptsToUnstarMealWithTheMenuNumber($firstName, $menuNumber)
    {
        $customer = $this->customers[$firstName];
        $mealToCheck = $this->meals[$menuNumber];

        try {
            $customer->unStarMeal($mealToCheck);
        } catch (Exception $exception) {
            echo 'Cannot unstar a meal that has not been starred';
        }
    }

    /**
     * @Then :firstName should not have a starred meal with the menu number :menuNumber
     */
    public function someoneShouldNotHaveAStarredMealWithTheMenuNumber($firstName, $menuNumber)
    {
        $customer = $this->customers[$firstName];
        $mealToCheck = $this->meals[$menuNumber];
        $hasStar = $customer->hasStar($mealToCheck);

        if ($hasStar == true) {
            throw new \Exception('Customer has starred a meal');
        }
    }


    /**
     * @Given there is a gym owner called :firstName
     */
    public function thereIsAGymOwnerCalled(string $firstName)
    {
        $this->owners[$firstName] = new GymOwner($firstName, 'owner@thegym.com', 'Iron Heights', '123 some st, sometown, the world', [''], [''], ['']);
    }

    /**
     * @Given :firstName has no love it meals with the menu number :menuNumber
     */
    public function someoneHasNoLoveItMealsWithTheMenuNumber($firstName, $menuNumber)
    {

    }

    /**
     * @When :firstName loves a meal with the menu number :menuNumber
     */
    public function someoneLovesAMealWithTheMenuNumber($firstName, $menuNumber)
    {
        $owner = $this->owners[$firstName];
        $loveMeal = $this->meals[$menuNumber];
        $owner->loveMeal($loveMeal);
    }

    /**
     * @Then :firstName has a love it meal with the menu number :menuNumber
     */
    public function gymOwnerHasALoveItMealWithTheMenuNumber($firstName, $menuNumber)
    {
        $owner = $this->owners[$firstName];
        $loveMeal = $this->meals[$menuNumber];
        $owner->hasLove($loveMeal);
    }

    /**
     * @When :firstName attempts to love the meal with the menu number :menuNumber
     */
    public function gymOwnerAttemptsToLoveTheMealWithTheMenuNumber($firstName, $menuNumber)
    {
        $owner = $this->owners[$firstName];
        $loveMeal = $this->meals[$menuNumber];

        try {
            $owner->loveMeal($loveMeal);
        } catch (Exception $exception) {
            //Do Nothing
        }
    }

    /**
     * @Then :firstName should still have a love it meal with the menu number :menuNumber
     */
    public function gymOwnerShouldStillHaveALoveItMealWithTheMenuNumber($firstName, $menuNumber)
    {
        $owner = $this->owners[$firstName];
        $loveMealToCheck = $this->meals[$menuNumber];
        $owner->hasLove($loveMealToCheck);
    }

    /**
     * @When :firstName stars the meal with menu number :menuNumber
     */
    public function gymOwnerStarsTheMealWithMenuNumber($firstName, $menuNumber)
    {
        $owner = $this->owners[$firstName];
        $mealToStar = $this->meals[$menuNumber];
        $owner->starMeal($mealToStar);

    }

    /**
     * @Then :firstName should have a starred love it meal with the menu number :menuNumber
     */
    public function gymOwnerShouldHaveAStarredLoveItMealWithTheMenuNumber($firstName, $menuNumber)
    {
        $owner = $this->owners[$firstName];
        $loveMealToStar = $this->meals[$menuNumber];

        $owner->hasStar($loveMealToStar);

    }

    /**
     * @Given :firstName has starred a loved meal with the menu number :menuNumber
     */
    public function hasStarredALovedMealWithTheMenuNumber($firstName, $menuNumber)
    {
        $owner = $this->owners[$firstName];
        $loveMealHasStar = $this->meals[$menuNumber];

        $owner->hasStar($loveMealHasStar);

    }

    /**
     * @When :firstName unstars the meal with menu number :menuNumber
     */
    public function gymOwnerUnstarsTheMealWithMenuNumber($firstName, $menuNumber)
    {
        $owner = $this->owners[$firstName];
        $loveMealToUnstar = $this->meals[$menuNumber];
        $owner->unStarMeal($loveMealToUnstar);
    }

    /**
     * @Then :firstName should not have starred a loved meal with the menu number :menuNumber
     */
    public function gymOwnerShouldNotHaveStarredALovedMealWithTheMenuNumber($firstName, $menuNumber)
    {
        $owner = $this->owners[$firstName];
        $mealToCheck = $this->meals[$menuNumber];
        $hasStar = $owner->hasStar($mealToCheck);

        if ($hasStar == true) {
            throw new \Exception('Customer still has a starred meal');
        }
    }

    /**
     * @When :firstName unloves the meal with the menu number :menuNumber
     */
    public function gymOwnerUnlovesTheMealWithTheMenuNumber($firstName, $menuNumber)
    {
        $owner = $this->owners[$firstName];
        $loveMealToUnlove = $this->meals[$menuNumber];
        $owner->unLoveMeal($loveMealToUnlove);
    }

    /**
     * @Then :firstName should not have a love it meal with the menu number :menuNumber
     */
    public function gymOwnerShouldNotHaveALoveItMealWithTheMenuNumber($firstName, $menuNumber)
    {
        $owner = $this->owners[$firstName];
        $mealToCheck = $this->meals[$menuNumber];
        $hasLove = $owner->hasLove($mealToCheck);

        if ($hasLove == true) {
            throw new \Exception('Customer still has a Loved meal');
        }
    }

    /**
     * @Given :firstName has no loath it meals with the menu number :menuNumber
     */
    public function gymOwnerHasNoLoathItMealsWithTheMenuNumber($firstName, $menuNumber)
    {
        $owner = $this->owners[$firstName];
        $mealToCheck = $this->meals[$menuNumber];
        $hasLoathed = $owner->hasLoathed($mealToCheck);

        if ($hasLoathed == true) {
            throw new Exception('Customer already loathes this meal');
        }
    }

    /**
     * @When :firstName attempts to loathe the meal with the menu number :menuNumber
     */
    public function gymOwnerAttemptsToLoatheTheMealWithTheMenuNumber($firstName, $menuNumber)
    {
        $owner = $this->owners[$firstName];
        $loatheMeal = $this->meals[$menuNumber];

        try {
            $owner->loatheMeal($loatheMeal);
        } catch (Exception $exception) {
            // Do Nothing
        }
    }

    /**
     * @Then :firstName should have a loathed meal with the menu number :menuNumber
     */
    public function gymOwnerShouldHaveALoathedMealWithTheMenuNumber($firstName, $menuNumber)
    {
        $owner = $this->owners[$firstName];
        $mealToCheck = $this->meals[$menuNumber];
        $hasLoathed = $owner->hasLoathed($mealToCheck);

        if ($hasLoathed == false) {
            throw new Exception('Customer has not loathed the meal' . $menuNumber);
        }
    }

    /**
     * @Given :firstName has a loathed meal with the menu number :menuNumber
     */
    public function gymOwnerHasALoathedMealWithTheMenuNumber($firstName, $menuNumber)
    {
        $owner = $this->owners[$firstName];
        $hasLoathed = $this->meals[$menuNumber];
        $owner->hasLoathed($hasLoathed);
    }

    /**
     * @When :firstName attempts to star a loathed meal with the menu number :menuNumber
     */
    public function gymOwnerAttemptsToStarALoathedMealWithTheMenuNumber($firstName, $menuNumber)
    {
        $owner = $this->owners[$firstName];
        $starLoathed = $this->meals[$menuNumber];

        try {
            $owner->starMeal($starLoathed);
        } catch (Exception $exception) {
            // Do Nothing
        }
    }

    /**
     * @Then :firstName should not have a starred loathe it meal with the menu number :menuNumber
     */
    public function gymOwnerShouldNotHaveAStarredLoatheItMealWithTheMenuNumber($firstName, $menuNumber)
    {
        $owner = $this->owners[$firstName];
        $mealToCheck = $this->meals[$menuNumber];
        $loathedNotStarred = $owner->hasStar($mealToCheck);

        if ($loathedNotStarred == true) {
            throw new Exception('Loathed meals should not be starred');
        }

    }

    /**
     * @When :firstName unloathes the meal with the menu number :menuNumber
     */
    public function gymOwnerUnloathesTheMealWithTheMenuNumber($firstName, $menuNumber)
    {
        $owner = $this->owners[$firstName];
        $unloatheMeal = $this->meals[$menuNumber];

        try {
            $owner->unLoatheMeal($unloatheMeal);
        } catch (Exception $exception) {
            // Do Nothing
        }
    }

    /**
     * @Then :firstName should not have a loathed meal with the menu number :menuNumber
     */
    public function gymOwnerShouldNotHaveALoathedMealWithTheMenuNumber($firstName, $menuNumber)
    {
        $owner = $this->owners[$firstName];
        $mealToCheck = $this->meals[$menuNumber];
        $hasLoathed = $owner->unLoatheMeal($mealToCheck);

        if ($hasLoathed == true) {
            throw new Exception('Customer should not have a loathed meal');
        }
    }

    /**
     * @Given menu number :menuNumber is not in :firstName love it or loathe it list
     */
    public function menuNumberIsNotInLoveItOrLoatheItList($firstName, $menuNumber)
    {
        $owner = $this->owners[$firstName];
        $mealToCheck = $this->meals[$menuNumber];

        if($owner->hasLove($mealToCheck)) {
            throw new Exception('Gym owner has loved meal');
        }

        if($owner->hasLoathed($mealToCheck)) {
            throw new Exception('Gym owner has loathed meal');
        }
    }

    /**
     * @Then :firstName should be sent a sample of the meal with menu number :menuNumber
     */
    public function gymOwnerShouldBeSentASampleOfTheMealWithMenuNumber($firstName, $menuNumber)
    {

        $owner = $this->owners[$firstName];
        $mealToSample = $this->meals[$menuNumber];
        $owner->sendSample($mealToSample);
    }

    /**
     * @Given menu number :menuNumber has not been sent to :firstName before
     */
    public function menuNumberHasNotBeenSentToBefore($firstName, $menuNumber)
    {
        $owner = $this->owners[$firstName];
        $mealSample = $this->meals[$menuNumber];
        $hasSample = $owner->hasSample($mealSample);

        if ($hasSample == true) {
            throw new Exception('Customer has already been sent a sample');
        }
    }

    /**
     * @Then :firstName should not be sent a sample of menu number :menuNumber
     */
    public function shouldNotBeSentASampleOfMenuNumber($firstName, $menuNumber)
    {
        $owner = $this->owners[$firstName];
        $noSample = $this->meals[$menuNumber];
        $owner->sendSample($noSample);
    }

}
