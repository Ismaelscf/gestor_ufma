<?php

namespace App\Repositories\Moodle;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class MoodleRepository
{
    public function getNumberUsers(){
        $number = DB::connection('moodle')
           ->table('mdl_user')
           ->where('deleted', 0)
           ->where('suspended', 0)
           ->count();

        return $number;
    }

    public function getNumberAprovados(){
        $number = DB::connection('moodle')
            ->table('mdl_quiz_attempts as qa')
            ->join('mdl_user as u', 'qa.userid', '=', 'u.id')
            ->select('qa.userid as user_id', 'u.username', 'u.email', 'u.city', 'u.firstname', 'u.lastname', DB::raw('MAX(qa.sumgrades) as highest_grade'), DB::raw("'Aprovado' as status"))
            ->where('qa.quiz', 12)
            ->groupBy('qa.userid')
            ->havingRaw('MAX(qa.sumgrades) >= 70')
            ->count();

        return $number;

    }

    public function getNumberReprovados(){
        // dd($course, $quiz);

        $users = DB::connection('moodle')
            ->table('mdl_quiz_attempts as qa')
            ->join('mdl_user as u', 'qa.userid', '=', 'u.id')
            ->select('qa.userid as user_id', 'u.username', 'u.email', 'u.city', 'u.firstname', 'u.lastname', DB::raw('MAX(qa.sumgrades) as highest_grade'), DB::raw("'Reprovado' as status"))
            ->where('qa.quiz', 12)
            ->whereNotIn('qa.userid', function ($query) {
                $query->select('qa2.userid')
                      ->from('mdl_quiz_attempts as qa2')
                      ->where('qa2.quiz', 12)
                      ->where('qa2.sumgrades', '>=', 70)
                      ->groupBy('qa2.userid');
            })
            ->groupBy('qa.userid')
            ->havingRaw('highest_grade < 70')
            ->count();

        return $users;
    }

    public function getNumberNAcessaram(){

        $users = DB::connection('moodle')
            ->table('mdl_user as u')
            ->leftJoin('mdl_quiz_attempts as qa', function($join) {
                $join->on('u.id', '=', 'qa.userid')
                     ->where('qa.quiz', 12);
            })
            ->select('u.id as user_id', 'u.username', 'u.email', 'u.city', 'u.firstname', 'u.lastname', DB::raw("'--' as highest_grade"), DB::raw("'Não responderam o quiz' as status"))
            ->whereNull('qa.id')
            ->count();

        return $users;
    }

    public function getAprovados(){
        // dd($course, $quiz);

        $users = DB::connection('moodle')
            ->table('mdl_quiz_attempts as qa')
            ->join('mdl_user as u', 'qa.userid', '=', 'u.id')
            ->select('qa.userid as user_id', 'u.username', 'u.email', 'u.city', 'u.firstname', 'u.lastname', DB::raw('MAX(qa.sumgrades) as highest_grade'), DB::raw("'Aprovado' as status"))
            ->where('qa.quiz', 12)
            ->groupBy('qa.userid')
            ->havingRaw('MAX(qa.sumgrades) >= 70');

        return $users;
    }

    public function getReprovados(){
        // dd($course, $quiz);

        $users = DB::connection('moodle')
            ->table('mdl_quiz_attempts as qa')
            ->join('mdl_user as u', 'qa.userid', '=', 'u.id')
            ->select('qa.userid as user_id', 'u.username', 'u.email', 'u.city', 'u.firstname', 'u.lastname', DB::raw('MAX(qa.sumgrades) as highest_grade'), DB::raw("'Reprovado' as status"))
            ->where('qa.quiz', 12)
            ->whereNotIn('qa.userid', function ($query) {
                $query->select('qa2.userid')
                      ->from('mdl_quiz_attempts as qa2')
                      ->where('qa2.quiz', 12)
                      ->where('qa2.sumgrades', '>=', 70)
                      ->groupBy('qa2.userid');
            })
            ->groupBy('qa.userid')
            ->havingRaw('highest_grade < 70');

        return $users;
    }

    public function nAcessaramQ1Forpres(){

        $users = DB::connection('moodle')
            ->table('mdl_user as u')
            ->leftJoin('mdl_quiz_attempts as qa', function($join) {
                $join->on('u.id', '=', 'qa.userid')
                     ->where('qa.quiz', 12);
            })
            ->select('u.id as user_id', 'u.username', 'u.email', 'u.city', 'u.firstname', 'u.lastname', DB::raw("'--' as highest_grade"), DB::raw("'Não responderam o quiz' as status"))
            ->whereNull('qa.id');

        return $users;
    }

}