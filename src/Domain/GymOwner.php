<?php

declare(strict_types=1);

namespace WorkSpace\PersonService\Entity;

use PhpSpec\Exception\Exception;

class GymOwner extends Customer
{
    private $gymName;
    private $gymAddress;
    private $mealSample = [];
    private $loveMeal = [];
    private $loatheMeal = [];

    public function __construct(
        string $firstName,
        string $email,
        string $gymName,
        string $gymAddress,
        $loveIt,
        $loatheIt,
        $mealSample
    ) {
        parent::__construct($firstName, $email, ['']);
        $this->gymName = $gymName;
        $this->gymAddress = $gymAddress;
        $this->loveMeal[] = $loveIt;
        $this->loatheMeal[] = $loatheIt;
    }

    public function loveMeal(Meal $mealToLove)
    {
        if ($this->hasLove($mealToLove)) {
            throw new \Exception('Meal has already been loved');
        }
        $this->loveMeal[$mealToLove->getMenuNumber()] = $mealToLove;
    }

    public function unLoveMeal(Meal $mealToUnlove)
    {
        if ($this->hasLove($mealToUnlove)) {
            throw new \Exception('Cannot unlove a meal that has been shown no love');
        }
        unset($this->loveMeal[$mealToUnlove->getMenuNumber()]);
    }

    public function hasLove(Meal $mealToCheck)
    {
        if (array_key_exists($mealToCheck->getMenuNumber(), $this->loveMeal) == true) {
            return true;
        }
        return false;
    }

    public function loatheMeal(Meal $mealToLoathe)
    {
        if ($this->hasLoathed($mealToLoathe)) {
            throw new \Exception('Meal has already been loathed');
        }
        $this->loatheMeal[$mealToLoathe->getMenuNumber()] = $mealToLoathe;
    }

    public function unLoatheMeal(Meal $mealToUnloathe)
    {
        if ($this->hasLove($mealToUnloathe)) {
            throw new \Exception('Cannot unloathe a meal that isn\'t already loathed');
        }
        unset($this->loveMeal[$mealToUnloathe->getMenuNumber()]);
    }

    public function hasLoathed(Meal $mealToCheck)
    {
        if (array_key_exists($mealToCheck->getMenuNumber(), $this->loatheMeal) == true) {
            return true;
        }
        return false;
    }

    public function starMeal(Meal $loveMealToStar)
    {
        if ($this->hasLove($loveMealToStar)) {
            throw new Exception('Cannot star a meal that is not loved');
        }
            $this->loveMeal[$loveMealToStar->getMenuNumber()] = $loveMealToStar;
    }

    public function unStarMeal(Meal $loveMealToUnstar)
    {
        if ($this->hasStar($loveMealToUnstar)) {
            throw new Exception(('Cannot unstar a meal that has not been starred'));
        }
        unset($this->starMeal[$loveMealToUnstar->getMenuNumber()]);
    }

    public function hasStar(Meal $loveMealHasStar)
    {
        if (array_key_exists($loveMealHasStar->getMenuNumber(), $this->starMeal) == true) {
            return true;
        }
        return false;
    }

    public function sendSample(Meal $sampleToSend)
    {
        if (array_key_exists($sampleToSend->getMenuNumber(), $this->mealSample) == true) {
            throw new Exception('Cannot send repeat samples');
        }
        $this->mealSample[$sampleToSend->getMenuNumber()] = $sampleToSend;
    }

    public function hasSample(Meal $hasSample)
    {
        if (array_key_exists($hasSample->getMenuNumber(), $this->mealSample) == true) {
            return true;
        }
        return false;
    }
}
