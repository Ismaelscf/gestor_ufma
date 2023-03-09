<?php

namespace App\Repositories\Report;
use App\Models\Contas\UserContas;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class UserRepository
{
    protected $user;

    public function __construct(UserContas $user)
    {
        $this->user = $user;
    }

    public function getAll(){
        $users = UserContas::all();

        return $users;
    }

    public function nUsers(){
        $nUsers = UserContas::count();

        return $nUsers;
    }

}