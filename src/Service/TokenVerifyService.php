<?php

namespace App\Service;

class TokenVerifyService
{
    public function isValid (int $token): bool
    {
        if (is_integer($token) and $token >= 1 and $token <= 9999){

            return true;
        }

        return false;
    }

    public function isCombinationValid (int $token, $user): bool
    {
        if ($this->isValid($token)) {

            return ($token == $user->getToken());

        }
    }
}