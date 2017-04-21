<?php

namespace WorkSpace\PersonService\Domain;

interface CustomerRepositoryInterface
{
    public function save(Customer $customer);
    public function findByEmail(Customer $email);
}
