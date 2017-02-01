<?php

namespace spec\NicBall\PersonService\Collection\PersonCollectionSpec;


use NicBall\PersonService\Entity\Person;

class PersonCollectionSpec
{
    function it_should_be_initializable()
    {
        $this->shouldHaveType(Person::class);
    }

    function it_should_allow_a_person_to_be_added()
    {
        $this->addPerson()->shouldBeArray();
    }

}