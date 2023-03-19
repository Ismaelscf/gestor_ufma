<?php

namespace App\Repositories\Report;
use App\Models\Contas\Customer;
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

    public function getAll(){
        $users = Customer::select('customers.*', \DB::raw('COUNT(orders.ord_id) AS has_orders'))
        ->leftJoin('orders', 'customers.cst_id', '=', 'orders.ord_cst_id')
        ->groupBy('customers.cst_id')
        ->orderBy('customers.cst_name')
        ->get();

        return $users;
    }

    public function getAllUsersRegistered(){
        $users = Customer::select('cst_id', 'cst_name')->join('orders', 'customers.cst_usr_id', '=', 'orders.ord_cst_id')->get();
        
        return $users;
    }

    public function getNumberUsersRegistered(){
        $users = Customer::select('cst_id', 'cst_name')->join('orders', 'customers.cst_usr_id', '=', 'orders.ord_cst_id')->count();
        
        return $users;
    }

    public function getNumberUsersUnregistered(){
        $users = Customer::select('customers.cst_id', 'customers.cst_name', 'customers.cst_email')
                    ->leftJoin('orders', 'customers.cst_id', '=', 'orders.ord_cst_id')
                    ->whereNull('orders.ord_id')
                    ->count();

        // $users = Customer::select('cst_id', 'cst_name')->join('orders', 'customers.cst_usr_id', '=', 'orders.ord_cst_id')->count();
        
        return $users;
    }

}