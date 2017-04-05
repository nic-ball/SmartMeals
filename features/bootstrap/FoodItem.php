<?php

declare(strict_types=1);

class FoodItem
{
    private $itemName;
    private $itemDescription;
    private $itemPrice;
    private $itemSku;

    public function __construct(string $itemName, string $itemDescription, int $itemPrice, int $itemSku)
    {
        $this->itemName = $itemName;
        $this->itemDescription = $itemDescription;
        $this->itemPrice = $itemPrice;
        $this->itemSku = $itemSku;
    }

    /**
     * @return string
     */
    public function getItemName(): string
    {
        return $this->itemName;
    }

    /**
     * @return string
     */
    public function getItemDescription(): string
    {
        return $this->itemDescription;
    }

    /**
     * @return int
     */
    public function getItemPrice(): int
    {
        return $this->itemPrice;
    }

    /**
     * @return int
     */
    public function getItemSku(): int
    {
        return $this->itemSku;
    }

}