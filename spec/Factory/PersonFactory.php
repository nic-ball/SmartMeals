<?php

namespace spec\NicBall\Factory\PersonFactorySpec;


class PersonFactorySpec extends ObjectBehavior
{

    function it_is_initializable()
    {
        $this->shouldHaveType(PersonCollection::class);
    }

    function it_should_create_a_person_list_from_an_array()
    {
        $firstName = "Nic";
        $lastName = "Ball";
        $dob = "1981-06-23";
        $height = 164;
        $eyeColour = "Blue";
        $favouriteFood = "Chicken";
        $gender = "Male";

        $personCreator = [
            'first name' => $firstName,
            'last name' => $lastName,
            'date of birth' => $dob,
            'height' => $height,
            'eye colour' => $eyeColour,
            'favourite food' => $favouriteFood,
            'gender' => $gender,
        ];

        $personCreator = $this->addPerson($personCreator);
        $personCreator->shouldBeAnInstanceOf(PersonCollection::class);
        $personCreator->getFirstName()->shouldReturn($firstName);
        $personCreator->getLastName()->shouldReturn($lastName);
        $personCreator->getDob()->shouldReturn($dob)->shouldBeAnInstanceOf(\DateTime::class);
        $personCreator->getHeight()->shouldReturn($height);
        $personCreator->getEyeColour()->shouldReturn($eyeColour);
        $personCreator->getFavouriteFood()->shouldReturn($favouriteFood);
        $personCreator->getGender()->shouldReturn($gender);

    }

}