<?php

namespace Infrastructure;

use WorkSpace\PersonService\Domain\GymOwner;
use WorkSpace\PersonService\Domain\GymOwnerRepositoryInterface;

class RedisGymOwnerRepository implements GymOwnerRepositoryInterface
{
    /*
     * @Redis
     */

    public function save(GymOwner $gymOwner)
    {
        $client = new \Redis();
        $client->connect('127.0.0.1', 6379);
        $client->set('gymOwner', $gymOwner);
        $client->save();
        $client->close();
    }

    public function findByEmail(GymOwner $email)
    {
        $client = new \Redis();
        $client->connect('127.0.0.1', 6379);
        $client->get($email);
        $client->close();
    }
}