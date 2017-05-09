<?php

namespace Infrastructure;

use WorkSpace\PersonService\Domain\Customer;
use WorkSpace\PersonService\Domain\CustomerRepositoryInterface;

class RedisCustomerRepository implements CustomerRepositoryInterface
{
    /*
     * @Redis
     */

    public function save(Customer $customer)
    {
        $client = new \Redis();
        $client->connect('127.0.0.1', 6379);
        $client->set('customer', $customer);
        $client->save();
        $client->close();
    }

    public function findByEmail(Customer $email)
    {
        $client = new \Redis();
        $client->connect('127.0.0.1', 6379);
        $client->get($email);
        $client->close();
    }
}
