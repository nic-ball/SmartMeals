<?php

namespace spec\WorkSpace\PersonService\Entity;

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


}