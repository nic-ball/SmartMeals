<?php

declare(strict_types=1);

class NonFoodItem
{
    private $nonFoodName;
    private $nonFoodDescription;
    private $nonFoodPrice;
    private $nonFoodSku;

    public function __construct(string $nonFoodName, string $nonFoodDescription, int $nonFoodPrice, int $nonFoodSku)
    {
        $this->nonFoodName = $nonFoodName;
        $this->nonFoodDescription = $nonFoodDescription;
        $this->nonFoodPrice = $nonFoodPrice;
        $this->nonFoodSku = $nonFoodSku;
    }

    /**
     * @return string
     */
    public function getNonFoodName(): string
    {
        return $this->nonFoodName;
    }

    /**
     * @return string
     */
    public function getNonFoodDescription(): string
    {
        return $this->nonFoodDescription;
    }

    /**
     * @return int
     */
    public function getNonFoodPrice(): int
    {
        return $this->nonFoodPrice;
    }

    /**
     * @return int
     */
    public function getNonFoodSku(): int
    {
        return $this->nonFoodSku;
    }


}