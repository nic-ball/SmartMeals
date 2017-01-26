<?php

namespace spec\NicBall\PersonService\Src\Collection;


use NicBall\PersonService\Entity\Person;

class PersonCollection extends Person
{
    public function __construct($firstName, $lastName, $dob, $height, $eyeColour, $favouriteFoods, $assignGender)
    {
        parent::__construct($firstName, $lastName);
    }

//    public function addPerson()
//    {
//
//    }
}