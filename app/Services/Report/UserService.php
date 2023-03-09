<?php

namespace App\Services\Report;

use App\Repositories\Report\UserRepository;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAll(){
        $users = $this->userRepository->getAll();

        return $users;
    }

    public function nUsers(){
        $users = $this->userRepository->nUsers();

        return $users;
    }

}