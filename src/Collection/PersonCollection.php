<?php
declare(strict_types=1)

namespace \src\NicBall\PersonService\Collection\PersonCollection;


class PersonCollection extends \spec\NicBall\PersonService\Collection\PersonCollectionSpec\PersonCollectionSpec
{
    private $people = array();

    public function addPerson($person) : Person
    {
        $this->people[] = $person;
    }
}