<?php

namespace WorkSpace\PersonService\Domain;

interface GymOwnerRepositoryInterface
{
    public function save(GymOwner $gymOwner);
    public function findByEmail(GymOwner $email);
}
