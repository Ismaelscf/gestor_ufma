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
        $nUsers = $this->userService->nUsers();
        $nUsersRegistered = $this->customerService->getNumberUsersRegistered();

        $userContas = $this->userService->getAll();
        $usersRegistered = $this->customerService->getAllUsersRegistered();

        // dd($userContas[0]->customer->orders);
        return view('report.index', compact('nUsers', 'nUsersRegistered', 'userContas', 'usersRegistered'));
    }
}
