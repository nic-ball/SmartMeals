<?php

namespace WorkSpace\PersonService\Entity;

class Customer
{
    protected $firstName;
    protected $email;
    protected $starMeal = [];

    /**
     * Person constructor.
     *
     * @param string   $firstName
     * @param string   $email
     * @param $starMeal
     */
    public function __construct(
        string $firstName,
        string $email,
        $starMeal
    ) {
        $this->firstName = $firstName;
        $this->email = $email;
        $this->starMeal[] = $starMeal;
    }

    public function starMeal(Meal $mealToStar)
    {
        if ($this->hasStar($mealToStar)) {
            throw new \Exception("Meal has already been starred");
        }
        $this->starMeal[$mealToStar->getMenuNumber()] = $mealToStar;
    }

    public function unStarMeal(Meal $mealToRemove)
    {
        if (!$this->hasStar($mealToRemove)) {
            throw new \Exception('Cannot unstar a meal that has not been starred');
        }
        unset($this->starMeal[$mealToRemove->getMenuNumber()]);
    }

    public function hasStar(Meal $mealToCheck)
    {
        if (array_key_exists($mealToCheck->getMenuNumber(), $this->starMeal) == true) {
            return true;
        }
        return false;
    }
}
