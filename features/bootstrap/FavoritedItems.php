<?php

final class FavoritedItems implements \countable
{
    private $favoritedItems = array();

    public function setFavoritedItems($itemName, $itemSku)
    {
        $this->favoritedItems[$itemName] = $itemSku;
    }

    public function getFavoritedItems($itemName)
    {
        return $this->favoritedItems[$itemName];
    }

    public function count()
    {
        return $this->count($this->favoritedItems);
    }


}