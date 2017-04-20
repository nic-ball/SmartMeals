<?php

namespace spec\WorkSpace\PersonService\Entity;

use PhpSpec\Exception\Exception;
use WorkSpace\PersonService\Entity\Meal;
use PhpSpec\ObjectBehavior;
use WorkSpace\PersonService\Entity\GymOwner;

class GymOwnerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(GymOwner::class);
    }

    function let()
    {
        $this->beConstructedWith('', '', '', '', [''], [''], ['']);
    }

    function it_loves_meal()
    {
        $loveMeal = new Meal('Butternut squash Ravioli', 595, 35, 40, 12, 1);
        $this->loveMeal($loveMeal);
        $this->hasLove($loveMeal);
    }

    function it_does_not_love_duplicate_meals()
    {
        $loveMeal = new Meal('Butternut squash Ravioli', 595, 35, 40, 12, 1);
        $this->loveMeal($loveMeal);
        $this->shouldThrow(new \Exception('Meal has already been loved'))->during('loveMeal', [$loveMeal]);
    }

    function it_unloves_meal()
    {
        $meal = new Meal('Butternut squash Ravioli', 595, 35, 40, 12, 1);
        $this->unLoveMeal($meal);
    }

    function it_loathes_meal()
    {
        $meal = new Meal('Clam Bake', 595, 35, 40, 12, 86);
        $this->loatheMeal($meal);
        $this->hasLoathed($meal);
    }

    function it_does_not_loathe_duplicate_meals()
    {
        $meal = new Meal('Clam Bake', 595, 35, 40, 12, 86);
        $this->loatheMeal($meal);
        $this->shouldThrow(new \Exception('Meal has already been loathed'))->during('loatheMeal', [$meal]);
    }

    function it_unloathes_meal()
    {
        $meal = new Meal('Clam Bake', 595, 35, 40, 12, 86);
        $this->unLoatheMeal($meal);
    }

    function it_stars_loved_meal()
    {
        $meal = new Meal('Butternut squash Ravioli', 595, 35, 40, 12, 1);
        $this->starMeal($meal);
    }

    function it_unstars_favorite_meal()
    {
        $meal = new Meal('Butternut squash Ravioli', 595, 35, 40, 12, 1);
        $this->unStarMeal($meal);
    }

    function it_should_not_star_duplicate_loved_meals()
    {
        $meal = new Meal('Butternut squash Ravioli', 595, 35, 40, 12, 1);
        $this->starMeal($meal);
        $this->shouldThrow(new \Exception('Cannot star a meal that is not loved'))->during('starMeal', [$meal]);
    }

    function it_should_not_star_loathed_meals()
    {
        $meal = new Meal('Butternut squash Ravioli', 595, 35, 40, 12, 1);
        $this->starMeal($meal);
        $this->shouldThrow(new Exception('Cannot star a meal that is not loved'))->during('starMeal', [$meal]);
    }

    function it_allows_samples_to_be_sent()
    {
        $meal = new Meal('Butternut squash Ravioli', 595, 35, 40, 12, 1);
        $this->sendSample($meal);
    }

    function it_does_not_allow_duplicate_samples_to_be_sent()
    {
        $meal = new Meal('Butternut squash Ravioli', 595, 35, 40, 12, 1);
        $this->sendSample($meal);
        $this->shouldThrow(new Exception('Cannot send repeat samples'))->during('sendSample', [$meal]);
    }


}