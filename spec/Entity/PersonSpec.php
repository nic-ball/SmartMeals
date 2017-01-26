<?php

namespace spec\NicBall\PersonService\Entity;

use NicBall\PersonService\Entity\Person;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PersonSpec extends ObjectBehavior

{
    function let()
    {
        $this->beConstructedWith("Nic", "Ball");
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Person::class);
    }

    function it_should_return_first_name()
    {
        $this->getFirstName()->shouldReturn("Nic");
    }

    function it_should_return_last_name()
    {
        $this->getLastName()->shouldReturn("Ball");
    }

    function it_should_allow_date_of_birth_to_be_set()
    {
        $this->setDOB(new \DateTime('1981-06-23'));

        $this->getDOB()->shouldReturnAnInstanceOf(\DateTime::class);
    }

    function it_should_allow_height_to_be_set()
    {
        $this->setHeight(167);

        $this->getHeight()->shouldReturn(167);
    }

    function it_should_allow_eye_colour_to_be_set()
    {
        $this->setEyeColour("Blue");

        $this->getEyeColour()->shouldReturn("Blue");
    }

    function it_should_throw_an_exception_if_colour_is_invalid()
    {
        $this->shouldThrow(new \Exception('Invalid Selection...'))->duringSetEyeColour("Red");
    }

    function it_should_decapitalise_the_initial_letter_of_string()
    {
        $this->setEyeColour("blue");

        $this->getEyeColour()->shouldReturn("Blue");
    }

    function it_should_allow_gender_to_be_set()
    {
        $this->setGender("Male");

        $this->getGender()->shouldReturn("Male");
    }

    function it_should_throw_an_exception_if_gender_is_invalid()
    {
        $this->shouldThrow(new \Exception('That is an Invalid input...'))->duringSetGender("None");
    }

    function it_should_decapitalise_the_initial_letter_of_inputted_gender()
    {
        $this->setGender("male");

        $this->getGender()->shouldReturn("Male");
    }

    function it_should_be_possible_to_add_list_of_favourite_foods_as_an_array()
    {
        $this->addFavouriteFoods([""]);

        $this->showFavouriteFoods()->shouldBeArray();


    }


}
