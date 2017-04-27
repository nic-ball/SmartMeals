<?php

namespace WorkSpace\PersonService\Domain;

interface MealRepositoryInterface
{
    public function save(Meal $meal);
    public function findById(Meal $menuNumber);
}
