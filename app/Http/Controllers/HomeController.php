<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Report\UserService;
use App\Services\Report\CustomerService;
Use App\Services\Moodle\MoodleService;
use App\Models\Contas\UserContas;

class HomeController extends Controller
{
    protected $userService;
    protected $customerService;
    protected $moodleService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserService $userService, CustomerService $customerService, MoodleService $moodleService)
    {
        $this->middleware('auth');
        $this->userService = $userService;
        $this->customerService = $customerService;
        $this->moodleService = $moodleService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $nUsersRegistered = $this->customerService->getNumberUsersRegistered();
        $nUsersUnregistered = $this->customerService->getNumberUsersUnregistered();
        $userContas = $this->customerService->getAll();

        $dados['users'] = $this->moodleService->getNumberUsers();
        $dados['aprovadosA1'] = $this->moodleService->getNumberAprovados();
        $dados['reprovadosA1'] = $this->moodleService->getNumberReprovados();
        $dados['nAcessaram'] = $this->moodleService->getNumberNAcessaram();
        $dados['aprovadosR1'] = $this->moodleService->getNumberAprovadosR1M1();
        $dados['reprovadosR1'] = $this->moodleService->getNumberReprovadosR1M1();

        $dados = json_decode (json_encode ($dados), FALSE);

        return view('home', compact('nUsersRegistered', 'nUsersUnregistered', 'userContas', 'dados'));
    }
}
