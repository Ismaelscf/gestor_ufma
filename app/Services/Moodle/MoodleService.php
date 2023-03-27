<?php

namespace App\Services\Moodle;

use App\Repositories\Moodle\MoodleRepository;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;
use PhpParser\Node\Expr\FuncCall;

class MoodleService
{
    protected $moodleRepository;

    public function __construct(MoodleRepository $moodleRepository)
    {
        $this->moodleRepository = $moodleRepository;
    }

    public function getNumberUsers(){
        $users = $this->moodleRepository->getNumberUsers();

        return $users;
    }

    public function getNumberAprovadosR1M1(){
        $users = $this->moodleRepository->getNumberAprovadosR1M1();

        return $users;
    }

    public function getNumberAprovados(){
        $users = $this->moodleRepository->getNumberAprovados();

        return $users;
    }

    public function getNumberReprovados(){
        $users = $this->moodleRepository->getNumberReprovados();

        return $users;
    }
    
    public function getNumberReprovadosR1M1(){
        $users = $this->moodleRepository->getNumberReprovadosR1M1();

        return $users;
    }

    public function getNumberNAcessaram(){
        $users = $this->moodleRepository->getNumberNAcessaram();

        return $users;
    }

    public function getAprovados(){
        $users = $this->moodleRepository->getAprovados();

        return $users;
    }

    public function getAprovadosExport(){
        $users = $this->moodleRepository->getAprovadosExport();

        return $users;
    }

    public function getReprovados(){
        $users = $this->moodleRepository->getReprovados();

        return $users;
    }

    public function getAprovadosR1M1(){
        $users = $this->moodleRepository->getAprovadosR1M1();

        return $users;
    }

    public function getReprovadosR1M1(){
        $users = $this->moodleRepository->getReprovadosR1M1();

        return $users;
    }

    public function nAcessaramQ1Forpres(){
        $users = $this->moodleRepository->nAcessaramQ1Forpres();

        return $users;
    }

}