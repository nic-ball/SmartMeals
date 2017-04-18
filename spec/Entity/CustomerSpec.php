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

    function it_stars_meals()
    {
        $meal = new Meal('Butternut squash Ravioli', 595, 35, 40, 12, 1);
        $this->starredMeals($meal);
        $this->shouldHaveStarred($meal);
    }

    function it_does_not_star_duplicate_meals()
    {
        $meal = new Meal('Butternut squash Ravioli', 595, 35, 40, 12, 1);
        $this->starredMeals($meal);
        $this->shouldThrow(new \Exception('Meal has already been starred'))->during('starredMeals', [$meal]);
    }

    function it_removes_a_starred_meal()
    {
        $meal = new Meal('Butternut squash Ravioli', 595, 35, 40, 12, 1);
        $this->starredMeals($meal);
        $this->shouldHaveStarred($meal);
        $this->removeStarredMeals($meal);
    }
    function it_does_not_allow_starred_meals_to_be_removed_if_nothing_starred()
    {
        $meal = new Meal('Mac \'n Cheese', 499, 23, 56, 20, 12);
        $this->shouldNotHaveStarred($meal);
        $this->shouldThrow(new \Exception("Cannot unstar a meal that has not been starred"))->during('removeStarredMeals', [$meal]);
    }
}
