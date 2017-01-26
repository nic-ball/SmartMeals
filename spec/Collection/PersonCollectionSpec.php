<?php

namespace spec\NicBall\PersonService\Collection;


use NicBall\PersonService\Entity\Person;
use PhpSpec\ObjectBehavior;

class PersonCollection extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith("Nic", "Ball", '1981-06-23');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Person::class);
    }

    function it_should_allow_a_person_to_be_added()
    {
        $this->addPerson()->shouldHaveType();
    }
}