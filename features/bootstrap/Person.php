<?php

final class Person
{
    private $firstName;
    private $lastName;
    private $dob;
    private $height;
    private $eyeColour;
    private $assignGender;
    private $favoritedItems = [];

    public function __construct(string $firstName, string $lastName, \DateTime $dob, string $height, string $eyeColour, string $assignGender, $favoritedItems)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->dob = $dob;
        $this->height = $height;
        $this->eyeColour = $eyeColour;
        $this->assignGender = $assignGender;
        $this->favoritedItems = $favoritedItems;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }


    public function getDOB(): \DateTime
    {
        return $this->dob;
    }

    public function getHeight(): string
    {
        return $this->height;
    }

    public function getEyeColour(): string
    {
        return $this->eyeColour;
    }

    public function capitalEyeColour(string $eyeColour)
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

    public function capitalGender(string $assignGender)
    {
        $validGenders = ["Male", "Female", "M", "F"];
        $capitalGender = ucwords(strtolower($assignGender));

        // Check input is valid
        if (!in_array($capitalGender, $validGenders)) {
            // Invalid Genders
            throw new Exception('That is an Invalid input...');
        } else {
            $this->assignGender = $capitalGender;
        }
    }

    public function getGender(): string
    {
        return $this->assignGender;
    }

    public function getFavoritedItems() : array
    {
        return $this->favoritedItems;
    }
}