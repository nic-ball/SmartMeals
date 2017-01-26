<?php
declare(strict_types=1);

namespace NicBall\PersonService\Entity;

use PhpSpec\Exception\Exception;

class Person
{
    private $firstName;
    private $lastName;
    private $dob;
    private $height;
    private $eyeColour;
    private $favouriteFoods;
    private $assignGender;

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
        return $this->eyeColour;
    }

    public function setEyeColour($eyeColour)
    {
        $validColours = ["Blue", "Green", "Brown"];
        $capitalEyeColour = ucwords(strtolower($eyeColour));

        // Check user input is valid
        if (!in_array($capitalEyeColour, $validColours)) {
            // Invalid colour
            throw new Exception('Invalid Selection...');
        } else {
            $this->eyeColour = $capitalEyeColour;
        }
    }

    public function setGender($assignGender)
    {
        $validGenders = ["Male", "Female", "Trans","M", "F", "T"];
        $capitalGender = ucwords(strtolower($assignGender));

        // Check input is valid
        if (!in_array($capitalGender, $validGenders)) {
            // Invalid Genders
            throw new Exception('That is an Invalid input...');
        } else {
            $this->assignGender = $capitalGender;
        }
    }

    public function getGender()
    {
        return $this->assignGender;
    }

    public function addFavouriteFoods($favouriteFoods)
    {
        $this->favouriteFoods[] = $favouriteFoods;
    }

    public function showFavouriteFoods()
    {
        return $this->favouriteFoods;
    }

}
