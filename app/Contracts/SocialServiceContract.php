<?php


namespace App\Contracts;

use SocialiteProviders\Manager\OAuth2\User;

interface SocialServiceContract
{
    public function login(User $user): string;
}
