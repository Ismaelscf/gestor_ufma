<?php

namespace App\Services\Report;

use App\Repositories\CustomerRepository;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class CustomerService
{
    protected $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    
    public function getAllUsersRegistered(){
        $users = $this->customerRepository->getAllUsersRegistered();

        return $users;
    }

}