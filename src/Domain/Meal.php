<?php

declare(strict_types=1);

namespace WorkSpace\PersonService\Entity;

class Meal
{
    private $mealName;
    private $mealPrice;
    private $mealProtein;
    private $mealCarbs;
    private $mealFat;
    private $menuNumber;

    public function __construct(
        string $mealName,
        int $mealPrice,
        int $mealProtein,
        int $mealCarbs,
        int $mealFat,
        int $menuNumber
    ) {
        $this->mealName = $mealName;
        $this->mealPrice = $mealPrice;
        $this->mealProtein = $mealProtein;
        $this->mealCarbs = $mealCarbs;
        $this->mealFat = $mealFat;
        $this->menuNumber = $menuNumber;
    }

    /**
     * @return string
     */
    public function getMealName(): string
    {
        return $this->mealName;
    }

    /**
     * @return int
     */
    public function getMealPrice(): float
    {
        return $this->mealPrice;
    }

    /**
     * @return int
     */
    public function getMealProtein(): int
    {
        return $this->mealProtein;
    }

    /**
     * @return int
     */
    public function getMealCarbs(): int
    {
        return $this->mealCarbs;
    }

    /**
     * @return int
     */
    public function getMealFat(): int
    {
        return $this->mealFat;
    }

    /**
     * @return int
     */
    public function getMenuNumber(): int
    {
        return $this->menuNumber;
    }
}
