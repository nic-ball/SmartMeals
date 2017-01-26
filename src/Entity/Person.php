<?php
declare(strict_types=1);

namespace NicBall\PersonService\Entity;

class Person
{
    private $firstName;
    private $lastName;
    private $dob;
    private $height;

    public function __construct(string $firstName, string $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function getFirstName() : string
    {
        return $this->firstName;
    }

    public function getLastName() : string
    {
        return $this-> lastName;
    }


    public function getDOB() : \DateTime
    {
        return $this->dob;
    }

    public function setDOB(\DateTime $dob)
    {
        $this->dob = $dob;
    }

    public function setHeight(int $height)
    {
        $this->height = $height;
    }

    public function getHeight() : int
    {
        return $this->height;
    }

    public function getEyeColour()
    {
        return $this->eyecolour;
    }

    public function setEyeColour($eyecolour)
    {

        if(!)
    }

}
