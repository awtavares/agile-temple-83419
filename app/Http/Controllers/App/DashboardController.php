<?php

namespace Mentor\Http\Controllers\App;


use Illuminate\Support\Facades\Auth;
use Mentor\Http\Controllers\Controller;
use Mentor\Models\Demand;
use Mentor\Models\Eventos;
use Mentor\Models\Oportunidades;
use Mentor\Models\User;
use Mentor\Repositories\DemandRepositoryEloquent;


class DashboardController extends Controller
{
    /**
     * @var user
     */
    private $user;
    /**
     * @var Demand
     */
    private $demand;
    /**
     * @var Oportunidades
     */
    private $oportunidades;
    /**
     * @var Eventos
     */
    private $eventos;

    /**
     * @var DemandRepositoryEloquent
     */


    public function __construct(User $user, Demand $demand, Oportunidades $oportunidades, Eventos $eventos)
    {

        $this->user = $user;
        $this->demand = $demand;
        $this->oportunidades = $oportunidades;
        $this->eventos = $eventos;
    }

    public function index()
    {
        // FIX ME otimizar isso...
        if(Auth::user()->roles == 3):
            $alunos = $this->user->where('roles', 1)->count();
            $mentores = $this->user->where('roles', 2)->count();
            $demandas = $this->demand->all()->count();
            $oportunidades = $this->oportunidades->all()->count();
            $eventos = null;
        endif;

        if(Auth::user()->roles == 2):
            $demandas = $this->demand->where('mentor', Auth::user()->id)->count();
            $alunos = null;
            $mentores = null;
            $oportunidades = null;
            $eventos = null;
        endif;

        if(Auth::user()->roles == 1):
            $demandas = $this->demand->where('user_id', Auth::user()->id)->count();
            $eventos = $this->eventos->all()->count();
            $alunos = null;
            $mentores = null;
            $oportunidades = null;

        endif;

        return view('home', compact('alunos', 'demandas', 'oportunidades', 'mentores', 'eventos'));
    }


}
