<?php

namespace WorkSpace\PersonService\Infrastructure;

use WorkSpace\PersonService\Domain\Customer;
use WorkSpace\PersonService\Domain\CustomerRepositoryInterface;

class RedisCustomerRepository implements CustomerRepositoryInterface
{
    /**
     *    @var Redis
     **/

    private $client;

    public function connect()
    {
        try {
            $this->client = new Predis\Client([
                'scheme' => 'tcp',
                'host' => '127.0.0.1',
                'port' => 6379,
                'database' => 0
            ]);
            echo "Successfully connected to Redis";
        } catch (Exception $e) {
            echo "Couldn't connect to Redis";
            echo $e->getMessage();
        }
    }

    public function save(Customer $customer)
    {
        $this->client->connect('127.0.0.1', 6379);
        $this->client->set('customer', $customer);
        $this->client->save();
        $this->client->close();
    }

    public function findByEmail(Customer $email)
    {
        $this->client->connect('127.0.0.1', 6379);
        $this->client->get($email);
        $this->client->close();
    }

    public function signedUp(Customer $email)
    {
        $this->client->connect('127.0.0.1', 6379);
        $custEmail = $this->client->get($email);
        if ($this->client->exists($email)) {
            throw new \Exception('You have already signed up with the e-mail address' . $custEmail);
        }
        $this->client->get($email);
    }
}
