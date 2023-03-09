<?php

namespace App\Http\Controllers\Contas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contas\UserContas;

class UserController extends Controller
{
    public function index(){
        $users = UserContas::all();

        return view('report.index', compact('users'));
        // dd($users);
    }
}
