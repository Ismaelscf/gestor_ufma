<?php

namespace App\Http\Controllers\Contas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Report\UserService;
use App\Services\Report\CustomerService;
use App\Models\Contas\UserContas;

class UserController extends Controller
{
    protected $userService;
    protected $customerService;
    
    public function __construct(UserService $userService, CustomerService $customerService)
    {
        $this->userService = $userService;
        $this->customerService = $customerService;
    }


    public function index(){
        $nUsersRegistered = $this->customerService->getNumberUsersRegistered();
        $nUsersUnregistered = $this->customerService->getNumberUsersUnregistered();
        $userContas = $this->customerService->getAll();


        return view('report.index', compact('nUsersRegistered', 'nUsersUnregistered', 'userContas'));
    }
}
