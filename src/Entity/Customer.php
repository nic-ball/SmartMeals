<?php

namespace WorkSpace\PersonService\Entity;

class Customer
{
    private $firstName;
    private $email;
    private $starredMeals = [];

    /**
     * Person constructor.
     *
     * @param string         $firstName
     * @param string         $email
     * @param $favoritedMeals
     */
    public function __construct(
        string $firstName,
        string $email,
        $starredMeals
    ) {
        $this->firstName = $firstName;
        $this->email = $email;
        $this->starredMeals[] = $starredMeals;
    }

    public function starredMeals(Meal $mealToStar)
    {
        if ($this->hasStarred($mealToStar)) {
            throw new \Exception("Meal has already been starred");
        }
        $this->starredMeals[$mealToStar->getMenuNumber()] = $mealToStar;
    }

    public function removeStarredMeals(Meal $mealToRemove)
    {
        if (!$this->hasStarred($mealToRemove)) {
            throw new \Exception('Cannot unstar a meal that has not been starred');
        }
        unset($this->starredMeals[$mealToRemove->getMenuNumber()]);
    }

    public function hasStarred(Meal $mealToCheck)
    {
        if (array_key_exists($mealToCheck->getMenuNumber(), $this->starredMeals) == true) {
            return true;
        }
        return false;
    }
}
