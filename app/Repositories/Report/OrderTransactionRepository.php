<?php

namespace App\Repositories;
use App\Models\OrderTransaction;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class OrderTransactionRepository
{
    protected $orderTransaction;

    public function __construct(OrderTransaction $orderTransaction)
    {
        $this->orderTransaction = $orderTransaction;
    }
}