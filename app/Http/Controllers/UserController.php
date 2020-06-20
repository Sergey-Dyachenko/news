<?php


namespace App\Http\Controllers;


use App\Services\UserService;

class UserController
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

}
