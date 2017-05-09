<?php

namespace Infrastructure;


use WorkSpace\PersonService\Domain\Meal;
use WorkSpace\PersonService\Domain\MealRepositoryInterface;

class RedisMealRepository implements MealRepositoryInterface
{
    /*
     * @Redis
     */

    public function save(Meal $meal)
    {
        $client = new \Redis();
        $client->connect('127.0.0.1', 6379);
        $client->set('meal', $meal);
        $client->save();
        $client->close();
    }

    public function findById(Meal $menuNumber)
    {
        $client = new \Redis();
        $client->connect('127.0.0.1', 6379);
        $client->get($menuNumber);
        $client->close();
    }
}