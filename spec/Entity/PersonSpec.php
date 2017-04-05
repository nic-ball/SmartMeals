<?php

namespace spec\WorkSpace\PersonService\Entity;

use PhpSpec\Exception\Exception;
use WorkSpace\PersonService\Entity\FoodItem;
use WorkSpace\PersonService\Entity\Person;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PersonSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Person::class);
    }

    function let()
    {
        $this->beConstructedWith('','', new \DateTime(), '', '', '', null);
    }

    function it_favorites_items()
    {
        $foodItem = new FoodItem('Mars Bar', 'Chocolate bar 100g', 70, 5465456);
        $this->favoriteItem($foodItem);
        $this->shouldHaveFavorited($foodItem);
    }

    function it_does_not_favorite_duplicate_food_items()
    {
        $foodItem = new FoodItem('Mars Bar', 'Chocolate bar 100g', 70, 5465456);
        $this->favoriteItem($foodItem);
        $this->shouldThrow(new \Exception('Item has already been favorited'))->during('favoriteItem', [$foodItem]);
    }

    function it_removes_a_favorite_food_item()
    {
        $foodItem = new FoodItem('Mars Bar', 'Chocolate bar 100g', 70, 5465456);
        $this->favoriteItem($foodItem);
        $this->shouldHaveFavorited($foodItem);
        $this->removeFavoriteItems($foodItem);
    }
    function it_does_not_allow_favorites_to_be_removed_if_no_favorites_added()
    {
        $foodItem = new FoodItem('Cheese', 'Somerset\'s finest 500g', 450, 567343 );
        $this->shouldNotHaveFavorited($foodItem);
        $this->shouldThrow(new \Exception("Cannot remove an item that has not been favorited"))->during('removeFavoriteItems', [$foodItem]);
    }
}
