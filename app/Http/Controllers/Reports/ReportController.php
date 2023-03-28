<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Report\UserService;
use App\Services\Report\CustomerService;
Use App\Services\Moodle\MoodleService;
use App\Models\Contas\UserContas;

class ReportController extends Controller
{
    protected $userService;
    protected $customerService;
    protected $moodleService;
    
    public function __construct(UserService $userService, CustomerService $customerService, MoodleService $moodleService)
    {
        $this->userService = $userService;
        $this->customerService = $customerService;
        $this->moodleService = $moodleService;
    }


    public function index(){
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

        return view('report.reports', compact('nUsersRegistered', 'nUsersUnregistered', 'userContas', 'dados'));
    }

    public function reports(Request $request){
        switch ($request->report) {
            case 99:
                return redirect('/users');
                break;

            case 1:
                if($request->course == 6)
                    return redirect('/report/'.$request->course.'/'.$request->report.'/12');
                else
                    dd('2');
                break;

            case 2:
                if($request->course == 6)
                    return redirect('/report/'.$request->course.'/'.$request->report.'/12');
                else
                    dd('2');
                break;

            case 3:
                if($request->course == 6)
                    return redirect('/report/'.$request->course.'/'.$request->report.'/12');
                else
                    dd('2');
                break;

            case 4:
                if($request->course == 6)
                    return redirect('/report/'.$request->course.'/'.$request->report.'/16');
                else
                    dd('2');
                break;

            case 5:
                if($request->course == 6)
                    return redirect('/report/'.$request->course.'/'.$request->report.'/16');
                else
                    dd('2');
                break;

            case 6:
                if($request->course == 6)
                    dd('1');
                else
                    dd('2');
                break;

            case 7:
                if($request->course == 6)
                    dd('1');
                else
                    dd('2');
                break;

            case 8:
                if($request->course == 6)
                    dd('1');
                else
                    dd('2');
                break;

            case 9:
                if($request->course == 6)
                    dd('1');
                else
                    dd('2');
                break;

            case 10:
                if($request->course == 6)
                    dd('1');
                else
                    dd('2');
                break;
        }
    }

    public function report($course, $report, $quiz){
        $dados['users'] = $this->moodleService->getNumberUsers();

        switch ($report) {
            case 1:
                $dados['aprovados'] = $this->moodleService->getNumberAprovados();
                $dados = json_decode (json_encode ($dados), FALSE);

                return view('report.moodle.aprovadosForpres', compact('dados'));
                break;

            case 2:
                $dados['reprovados'] = $this->moodleService->getNumberReprovados();
                $dados = json_decode (json_encode ($dados), FALSE);

                return view('report.moodle.reprovadosForpres', compact('dados'));
                break;

            case 3:
                $dados['nAcessaram'] = $this->moodleService->getNumberNAcessaram();
                $dados = json_decode (json_encode ($dados), FALSE);

                return view('report.moodle.nAcessaramQ1Forpres', compact('dados'));
                break;

            case 4:
                $dados['aprovados'] = $this->moodleService->getNumberAprovadosR1M1();
                $dados = json_decode (json_encode ($dados), FALSE);

                return view('report.moodle.aprovadosR1M1Forpres', compact('dados'));
                break;

            case 5:
                $dados['reprovados'] = $this->moodleService->getNumberReprovadosR1M1();
                $dados = json_decode (json_encode ($dados), FALSE);

                return view('report.moodle.reprovadosR1M1Forpres', compact('dados'));
                break;
        }

    }

    public function aprovadosForpres()
    {
        $users = $this->moodleService->getAprovados();
        return datatables()->of($users)->make(true);
    }

    public function aprovadosR1M1Forpres()
    {
        $users = $this->moodleService->getAprovadosR1M1();
        return datatables()->of($users)->make(true);
    }

    public function reprovadosForpres()
    {
        $users = $this->moodleService->getReprovados();
        return datatables()->of($users)->make(true);
    }

    public function reprovadosR1M1Forpres()
    {
        $users = $this->moodleService->getReprovadosR1M1();
        return datatables()->of($users)->make(true);
    }

    public function nAcessaramQ1Forpres()
    {
        $users = $this->moodleService->nAcessaramQ1Forpres();
        return datatables()->of($users)->make(true);
    }
}
