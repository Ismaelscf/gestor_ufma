<?php

namespace App\Repositories;
use App\Models\Customer;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class CustomerRepository
{
    protected $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function getAllUsersRegistered(){
        $users = Customer::select('cst_id', 'cst_name')->join('orders', 'customers.cst_usr_id', '=', 'orders.ord_cst_id')->get();
        
        return $users;
    }

}