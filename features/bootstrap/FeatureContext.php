<?php

use Behat\Behat\Context\Context;
use WorkSpace\PersonService\Domain\Customer;
use WorkSpace\PersonService\Domain\Meal;
use WorkSpace\PersonService\Domain\GymOwner;

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

    /*
     *    @BeforeScenario
     */
    public function setUp()
    {
        $this->customers = [];
        $this->meals = [];
        $this->owners = [];
    }

    /*
     * @AfterScenario
     */
    public function tearDown()
    {

    }

    /**
     * @Given there is a customer with the email address :email
     */
    public function thereIsACustomerWithTheEmailAddress(String $email)
    {
        $this->customers[$email] = new Customer('Nic', $email, ['']);
    }
    

    /**
     * @Given there is a meal with the menu number :menuNumber
     */
    public function thereIsAMealWithTheMenuNumber(int $menuNumber)
    {
        $this->meals[$menuNumber] = new Meal('Butternut squash ravioli', 5.95, 35, 40, 12, $menuNumber);
    }

    /**
     * @Given :email has no starred meals
     */
    public function someoneHasNoStarredMeals($email)
    {

    }

    /**
     * @When :email stars a meal with the menu number :menuNumber
     */
    public function someoneStarsAMealWithTheMenuNumber($email, $menuNumber)
    {
        $customer = $this->customers[$email];
        $meal = $this->meals[$menuNumber];
        $customer->starMeal($meal);

    }

    /**
     * @Then :email should have a starred meal with the menu number :menuNumber
     */
    public function someoneShouldHaveAStarredMealWithTheMenuNumber($email, $menuNumber)
    {
        $customer = $this->customers[$email];
        $meal = $this->meals[$menuNumber];
        $customer->hasStar($meal);
    }

    /**
     * @Given :email has starred a meal with the menu number :menuNumber
     */
    public function someoneHasStarredAMealWithTheMenuNumber($email, $menuNumber)
    {
        $customer = $this->customers[$email];
        $meal = $this->meals[$menuNumber];
        $customer->starMeal($meal);
    }

    /**
     * @When :email attempts to star the meal with the menu number :menuNumber
     */
    public function someoneAttemptsToStarTheMealWithTheMenuNumber($email, $menuNumber)
    {
        $customer = $this->customers[$email];
        $meal = $this->meals[$menuNumber];

        try {
            $customer->starMeal($meal);
        } catch (Exception $exception) {
            // Do Nothing
        }
    }

    /**
     * @When :email unstars the meal with the menu number :menuNumber
     */
    public function someoneUnstarsTheMealWithTheMenuNumber($email, $menuNumber)
    {
        $customer = $this->customers[$email];
        $mealToCheck = $this->meals[$menuNumber];
        $customer->unStarMeal($mealToCheck);
    }

    /**
     * @When :email attempts to unstar meal with the menu number :menuNumber
     */
    public function someoneAttemptsToUnstarMealWithTheMenuNumber($email, $menuNumber)
    {
        $customer = $this->customers[$email];
        $mealToCheck = $this->meals[$menuNumber];

        try {
            $customer->unStarMeal($mealToCheck);
        } catch (Exception $exception) {
            echo 'Cannot unstar a meal that has not been starred';
        }
    }

    /**
     * @Then :email should not have a starred meal with the menu number :menuNumber
     */
    public function someoneShouldNotHaveAStarredMealWithTheMenuNumber($email, $menuNumber)
    {
        $customer = $this->customers[$email];
        $mealToCheck = $this->meals[$menuNumber];
        $hasStar = $customer->hasStar($mealToCheck);

        if ($hasStar == true) {
            throw new \Exception('Customer has starred a meal');
        }
    }

    /**
     * @Given there is a gym owner with the email address :email
     */
    public function thereIsAGymOwnerWithTheEmailAddress($email)
    {
        $this->owners[$email] = new GymOwner('Keith', $email, 'Iron Heights', '123 some st, sometown, the world', [''], [''], ['']);
    }

    /**
     * @Given :email has no love it meals with the menu number :menuNumber
     */
    public function someoneHasNoLoveItMealsWithTheMenuNumber($email, $menuNumber)
    {

    }

    /**
     * @When :email loves a meal with the menu number :menuNumber
     */
    public function someoneLovesAMealWithTheMenuNumber($email, $menuNumber)
    {
        $owner = $this->owners[$email];
        $loveMeal = $this->meals[$menuNumber];
        $owner->loveMeal($loveMeal);
    }

    /**
     * @Then :email has a love it meal with the menu number :menuNumber
     */
    public function gymOwnerHasALoveItMealWithTheMenuNumber($email, $menuNumber)
    {
        $owner = $this->owners[$email];
        $loveMeal = $this->meals[$menuNumber];
        $owner->hasLove($loveMeal);
    }

    /**
     * @When :email attempts to love the meal with the menu number :menuNumber
     */
    public function gymOwnerAttemptsToLoveTheMealWithTheMenuNumber($email, $menuNumber)
    {
        $owner = $this->owners[$email];
        $loveMeal = $this->meals[$menuNumber];

        try {
            $owner->loveMeal($loveMeal);
        } catch (Exception $exception) {
            //Do Nothing
        }
    }

    /**
     * @Then :email should still have a love it meal with the menu number :menuNumber
     */
    public function gymOwnerShouldStillHaveALoveItMealWithTheMenuNumber($email, $menuNumber)
    {
        $owner = $this->owners[$email];
        $loveMealToCheck = $this->meals[$menuNumber];
        $owner->hasLove($loveMealToCheck);
    }

    /**
     * @When :email stars the meal with menu number :menuNumber
     */
    public function gymOwnerStarsTheMealWithMenuNumber($email, $menuNumber)
    {
        $owner = $this->owners[$email];
        $mealToStar = $this->meals[$menuNumber];
        $owner->starMeal($mealToStar);

    }

    /**
     * @Then :email should have a starred love it meal with the menu number :menuNumber
     */
    public function gymOwnerShouldHaveAStarredLoveItMealWithTheMenuNumber($email, $menuNumber)
    {
        $owner = $this->owners[$email];
        $loveMealToStar = $this->meals[$menuNumber];

        $owner->hasStar($loveMealToStar);

    }

    /**
     * @Given :email has starred a loved meal with the menu number :menuNumber
     */
    public function hasStarredALovedMealWithTheMenuNumber($email, $menuNumber)
    {
        $owner = $this->owners[$email];
        $loveMealHasStar = $this->meals[$menuNumber];

        $owner->hasStar($loveMealHasStar);

    }

    /**
     * @When :email unstars the meal with menu number :menuNumber
     */
    public function gymOwnerUnstarsTheMealWithMenuNumber($email, $menuNumber)
    {
        $owner = $this->owners[$email];
        $loveMealToUnstar = $this->meals[$menuNumber];
        $owner->unStarMeal($loveMealToUnstar);
    }

    /**
     * @Then :email should not have starred a loved meal with the menu number :menuNumber
     */
    public function gymOwnerShouldNotHaveStarredALovedMealWithTheMenuNumber($email, $menuNumber)
    {
        $owner = $this->owners[$email];
        $mealToCheck = $this->meals[$menuNumber];
        $hasStar = $owner->hasStar($mealToCheck);

        if ($hasStar == true) {
            throw new \Exception('Customer still has a starred meal');
        }
    }

    /**
     * @When :email unloves the meal with the menu number :menuNumber
     */
    public function gymOwnerUnlovesTheMealWithTheMenuNumber($email, $menuNumber)
    {
        $owner = $this->owners[$email];
        $loveMealToUnlove = $this->meals[$menuNumber];
        $owner->unLoveMeal($loveMealToUnlove);
    }

    /**
     * @Then :email should not have a love it meal with the menu number :menuNumber
     */
    public function gymOwnerShouldNotHaveALoveItMealWithTheMenuNumber($email, $menuNumber)
    {
        $owner = $this->owners[$email];
        $mealToCheck = $this->meals[$menuNumber];
        $hasLove = $owner->hasLove($mealToCheck);

        if ($hasLove == true) {
            throw new \Exception('Customer still has a Loved meal');
        }
    }

    /**
     * @Given :email has no loath it meals with the menu number :menuNumber
     */
    public function gymOwnerHasNoLoathItMealsWithTheMenuNumber($email, $menuNumber)
    {
        $owner = $this->owners[$email];
        $mealToCheck = $this->meals[$menuNumber];
        $hasLoathed = $owner->hasLoathed($mealToCheck);

        if ($hasLoathed == true) {
            throw new Exception('Customer already loathes this meal');
        }
    }

    /**
     * @When :email attempts to loathe the meal with the menu number :menuNumber
     */
    public function gymOwnerAttemptsToLoatheTheMealWithTheMenuNumber($email, $menuNumber)
    {
        $owner = $this->owners[$email];
        $loatheMeal = $this->meals[$menuNumber];

        try {
            $owner->loatheMeal($loatheMeal);
        } catch (Exception $exception) {
            // Do Nothing
        }
    }

    /**
     * @Then :email should have a loathed meal with the menu number :menuNumber
     */
    public function gymOwnerShouldHaveALoathedMealWithTheMenuNumber($email, $menuNumber)
    {
        $owner = $this->owners[$email];
        $mealToCheck = $this->meals[$menuNumber];
        $hasLoathed = $owner->hasLoathed($mealToCheck);

        if ($hasLoathed == false) {
            throw new Exception('Customer has not loathed the meal' . $menuNumber);
        }
    }

    /**
     * @Given :email has a loathed meal with the menu number :menuNumber
     */
    public function gymOwnerHasALoathedMealWithTheMenuNumber($email, $menuNumber)
    {
        $owner = $this->owners[$email];
        $hasLoathed = $this->meals[$menuNumber];
        $owner->hasLoathed($hasLoathed);
    }

    /**
     * @When :email attempts to star a loathed meal with the menu number :menuNumber
     */
    public function gymOwnerAttemptsToStarALoathedMealWithTheMenuNumber($email, $menuNumber)
    {
        $owner = $this->owners[$email];
        $starLoathed = $this->meals[$menuNumber];

        try {
            $owner->starMeal($starLoathed);
        } catch (Exception $exception) {
            // Do Nothing
        }
    }

    /**
     * @Then :email should not have a starred loathe it meal with the menu number :menuNumber
     */
    public function gymOwnerShouldNotHaveAStarredLoatheItMealWithTheMenuNumber($email, $menuNumber)
    {
        $owner = $this->owners[$email];
        $mealToCheck = $this->meals[$menuNumber];
        $loathedNotStarred = $owner->hasStar($mealToCheck);

        if ($loathedNotStarred == true) {
            throw new Exception('Loathed meals should not be starred');
        }

    }

    /**
     * @When :email unloathes the meal with the menu number :menuNumber
     */
    public function gymOwnerUnloathesTheMealWithTheMenuNumber($email, $menuNumber)
    {
        $owner = $this->owners[$email];
        $unloatheMeal = $this->meals[$menuNumber];

        try {
            $owner->unLoatheMeal($unloatheMeal);
        } catch (Exception $exception) {
            // Do Nothing
        }
    }

    /**
     * @Then :email should not have a loathed meal with the menu number :menuNumber
     */
    public function gymOwnerShouldNotHaveALoathedMealWithTheMenuNumber($email, $menuNumber)
    {
        $owner = $this->owners[$email];
        $mealToCheck = $this->meals[$menuNumber];
        $hasLoathed = $owner->unLoatheMeal($mealToCheck);

        if ($hasLoathed == true) {
            throw new Exception('Customer should not have a loathed meal');
        }
    }

    /**
     * @Given menu number :menuNumber is not in :email love it or loathe it list
     */
    public function menuNumberIsNotInLoveItOrLoatheItList($email, $menuNumber)
    {
        $owner = $this->owners[$email];
        $mealToCheck = $this->meals[$menuNumber];

        if($owner->hasLove($mealToCheck)) {
            throw new Exception('Gym owner has loved meal');
        }

        if($owner->hasLoathed($mealToCheck)) {
            throw new Exception('Gym owner has loathed meal');
        }
    }

    /**
     * @Then :email should be sent a sample of the meal with menu number :menuNumber
     */
    public function gymOwnerShouldBeSentASampleOfTheMealWithMenuNumber($email, $menuNumber)
    {

        $owner = $this->owners[$email];
        $mealToSample = $this->meals[$menuNumber];
        $owner->sendSample($mealToSample);
    }

    /**
     * @Given menu number :menuNumber has not been sent to :email before
     */
    public function menuNumberHasNotBeenSentToBefore($email, $menuNumber)
    {
        $owner = $this->owners[$email];
        $mealSample = $this->meals[$menuNumber];
        $hasSample = $owner->hasSample($mealSample);

        if ($hasSample == true) {
            throw new Exception('Customer has already been sent a sample');
        }
    }

    /**
     * @Then :email should not be sent a sample of menu number :menuNumber
     */
    public function shouldNotBeSentASampleOfMenuNumber($email, $menuNumber)
    {
        $owner = $this->owners[$email];
        $noSample = $this->meals[$menuNumber];
        $owner->sendSample($noSample);
    }

    /**
     * @Given the customer has not signed up with the email address :email
     */
    public function theCustomerHasNotSignedUpWithTheEmailAddress($email)
    {
        $redis = new Predis\Client([
            'scheme' => 'tcp',
            'host' => '127.0.0.1',
            'port' => 6379
        ]);
        $redis->set('customer', $email);
        $redis->get('email');
        if ($redis->exists($email) == true) {
            throw new Exception('Email address has already been used to sign up');
        }
        $redis->set('customer', $email);
        $redis->quit();
    }

    /**
     * @When the customer signs up with the email address :email
     */
    public function theCustomerSignsUpWithTheEmailAddress($email)
    {
        $redis = new Predis\Client([
            'scheme' => 'tcp',
            'host' => '127.0.0.1',
            'port' => 6379
        ]);
        $redis->set('customer', $email);
        $redis->quit();
    }

    /**
     * @Then the customer should be saved to the data store by the email address :email
     */
    public function theCustomerShouldBeSavedToTheDataStoreByTheEmailAddress($email)
    {
        $redis = new Predis\Client([
            'scheme' => 'tcp',
            'host' => '127.0.0.1',
            'port' => 6379
        ]);
        $redis->get('email');
        if ($redis->exists($email) == false) {
            echo 'Welcome to SmartMeals';
            $redis->quit();
        } else {
            throw new \Exception('Something has gone wrong');
        }
        $redis->quit();
    }

    /**
     * @Given the customer has signed up with the email address :email
     */
    public function theCustomerHasSignedUpWithTheEmailAddress($email)
    {
        $redis = new Predis\Client([
            'scheme' => 'tcp',
            'host' => '127.0.0.1',
            'port' => 6379
        ]);
        $redis->exists($email);
        $redis->quit();
    }

    /**
     * @When the customer attempts to sign up again with the same email address :email
     */
    public function theCustomerAttemptsToSignUpAgainWithTheSameEmailAddress2($email)
    {
        $redis = new Predis\Client([
            'scheme' => 'tcp',
            'host' => '127.0.0.1',
            'port' => 6379
        ]);
        $redis->set('customer', $email);
        $redis->get('email');
        if ($redis->exists($email) == true) {
            throw new Exception('Email address has already been used to sign up');
        }
        $redis->quit();
    }

    /**
     * @Then the customer should still be signed up with the email address :email
     */
    public function theCustomerShouldStillBeSignedUpWithTheEmailAddress($email)
    {
        $redis = new Predis\Client([
            'scheme' => 'tcp',
            'host' => '127.0.0.1',
            'port' => 6379
        ]);
        $redis->exists($email);
        $custEmail = $redis->get($email);
        echo 'You have already signed up with: ' . $custEmail;
    }

    /**
     * @When the email address :email is searched for
     */
    public function theEmailAddressIsSearchedFor($email)
    {
        $redis = new Predis\Client([
            'scheme' => 'tcp',
            'host' => '127.0.0.1',
            'port' => 6379
        ]);
        $redis->get($email);
        $redis->quit();
    }

    /**
     * @Then the customer should be findable with :email
     */
    public function theCustomerShouldBeFindableWith($email)
    {
        $redis = new Predis\Client([
            'scheme' => 'tcp',
            'host' => '127.0.0.1',
            'port' => 6379
        ]);
        $redis->exists($email);
        $redis->get($email);
        $redis->echo($email);
        $redis->quit();
    }
}