<?php

namespace App\Service;

class TokenVerifyService
{
    public function isValid (string $token): bool
    {
        if (is_string($token)){

            return true;
        }

        return false;
    }

    public function isCombinationValid (string $token,mixed $user): bool
    {
        if ($this->isValid($token)) {

            return ($token == $user->getToken());

        }

        return false;
    }
}