<?php

namespace spec\WorkSpace\PersonService\Entity;

use PhpSpec\Exception\Exception;
use WorkSpace\PersonService\Entity\Meal;
use WorkSpace\PersonService\Entity\Customer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CustomerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Customer::class);
    }

    function let()
    {
        $this->beConstructedWith('','', '', null);
    }

    function it_stars_meal()
    {
        $meal = new Meal('Butternut squash Ravioli', 595, 35, 40, 12, 1);
        $this->starMeal($meal);
        $this->hasStar($meal);
    }

    function it_does_not_star_duplicate_meals()
    {
        $meal = new Meal('Butternut squash Ravioli', 595, 35, 40, 12, 1);
        $this->starMeal($meal);
        $this->shouldThrow(new \Exception('Meal has already been starred'))->during('starMeal', [$meal]);
    }

    function it_unstars_meal()
    {
        $meal = new Meal('Butternut squash Ravioli', 595, 35, 40, 12, 1);
        $this->starMeal($meal);
        $this->hasStar($meal);
        $this->unStarMeal($meal);
    }
    function it_does_not_unstar_meal_if_not_star_meal()
    {
        $meal = new Meal('Mac \'n Cheese', 499, 23, 56, 20, 12);
        $this->shouldNotHaveStar($meal);
        $this->shouldThrow(new \Exception("Cannot unstar a meal that has not been starred"))->during('unStarMeal', [$meal]);
    }
}
