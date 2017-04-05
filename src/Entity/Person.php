<?php

namespace WorkSpace\PersonService\Entity;

class Person
{
    private $firstName;
    private $lastName;
    private $dob;
    private $height;
    private $eyeColour;
    private $assignGender;
    private $favoritedItems = [];

    /**
     * Person constructor.
     *
     * @param string         $firstName
     * @param string         $lastName
     * @param DateTime       $dob
     * @param string         $height
     * @param string         $eyeColour
     * @param string         $assignGender
     * @param $favoritedItems
     */
    public function __construct(
        string $firstName,
        string $lastName,
        \DateTime $dob,
        string $height,
        string $eyeColour,
        string $assignGender,
        $favoritedItems
    ) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->dob = $dob;
        $this->height = $height;
        $this->eyeColour = $eyeColour;
        $this->assignGender = $assignGender;
        $this->favoritedItems[] = $favoritedItems;
    }

    public function favoriteItem(FoodItem $foodItemToFavorite)
    {
        if ($this->hasFavorited($foodItemToFavorite)) {
            throw new \Exception("Item has already been favorited");
        }
        $this->favoritedItems[$foodItemToFavorite->getItemSku()] = $foodItemToFavorite;
    }

    public function removeFavoriteItems(FoodItem $foodItemToRemove)
    {
        if (!$this->hasFavorited($foodItemToRemove)) {
            throw new \Exception('Cannot remove an item that has not been favorited');
        }
        unset($this->favoritedItems[$foodItemToRemove->getItemSku()]);
    }

    public function hasFavorited(FoodItem $foodItemToCheck)
    {
        if (array_key_exists($foodItemToCheck->getItemSku(), $this->favoritedItems) == true) {
            return true;
        }
        return false;
    }
}
