<?php

namespace WorkSpace\PersonService\Domain;

interface MealRepositoryInterface
{
    public function findById(Meal $menuNumber);
}
