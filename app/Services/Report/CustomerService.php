<?php

namespace App\Services\Report;

use App\Repositories\Report\CustomerRepository;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;
use PhpParser\Node\Expr\FuncCall;

class CustomerService
{
    protected $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function getAll(){
        $users = $this->customerRepository->getAll();

        return $users;
    }

    public function getAllUsersRegistered(){
        $users = $this->customerRepository->getAllUsersRegistered();

        return $users;
    }

    public function getNumberUsersRegistered(){
        $users = $this->customerRepository->getNumberUsersRegistered();

        return $users;
    }

    public function getNumberUsersUnregistered(){
        $users = $this->customerRepository->getNumberUsersUnregistered();

        return $users;
    }

}