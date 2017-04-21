<?php

namespace WorkSpace\PersonService\Domain;

interface GymOwnerInterface
{
    public function save(GymOwner $gymOwner);
    public function findByEmail(GymOwner $email);
}
