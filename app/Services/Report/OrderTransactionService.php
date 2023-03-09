<?php

namespace App\Services\Report;

use App\Repositories\OrderTransactionRepository;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class OrderTransactionService
{
    protected $orderTransactionRepository;

    public function __construct(OrderTransactionRepository $orderTransactionRepository)
    {
        $this->orderTransactionRepository = $orderTransactionRepository;
    }


}