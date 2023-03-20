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
        // $data = $this->customerService->getAll();

        // dd($userContas);


        return view('report.index', compact('nUsersRegistered', 'nUsersUnregistered', 'userContas'));
    }

    public function teste()
    {
        $data = UserContas::select('*')->get();
        return view('report.teste', compact('data'));
    }

    public function getData()
    {
        $userContas = $this->customerService->getAll();
        return datatables()->of($userContas)->make(true);
    }
}
