<?php

namespace Mentor\Http\Controllers\App;

use Illuminate\Http\Request;
use Mentor\Http\Controllers\Controller;
use Mentor\Models\User;
use Mentor\Repositories\ActRepositoryEloquent;
use Mentor\Repositories\PerfomanceRepositoryEloquent;
use Mentor\Repositories\UserRepositoryEloquent;
use Mentor\Services\DemandService;
use Mentor\Services\MentorService;

class MentorController extends Controller
{
    private $mentorService;
    /**
     * @var UserRepositoryEloquent
     */
    private $userRepositoryEloquent;
    /**
     * @var ActRepositoryEloquent
     */
    private $actRepositoryEloquent;


    private $demandService;

    /**
     * MentorController constructor.
     * @param MentorService $mentorService
     * @param UserRepositoryEloquent $userRepositoryEloquent
     * @param ActRepositoryEloquent $actRepositoryEloquent
     */
    public function __construct(MentorService $mentorService,
                                UserRepositoryEloquent $userRepositoryEloquent,
                                ActRepositoryEloquent $actRepositoryEloquent,
                                DemandService $demandService)
    {
        $this->mentorService = $mentorService;
        $this->userRepositoryEloquent = $userRepositoryEloquent;
        $this->actRepositoryEloquent = $actRepositoryEloquent;
        $this->demandService = $demandService;
    }

    public function index()
    {
        /** CRIAR NO REPOSITORIES */
        $mentors = User::where('roles', 2)->orderBy('name', 'ASC')->paginate(10);

        return view('mentor.index', compact('mentors'));
    }

    public function create()
    {
        return view('mentor.create');
    }

    public function store(Request $request)
    {
        $mentor = $this->mentorService->createMentor($request->all());
        if($mentor) {
            return redirect()->route('app.mentor.index');
        }else{
            $request->session()->flash('error', 'Mentor não foi cadastrado, pois já existe um usuário com o e-mail informado' );
            return redirect()->route('app.mentor.create');
        }
    }

    public function show($id)
    {
        $mentor = $this->userRepositoryEloquent->find($id);
        $act = $this->actRepositoryEloquent->findByField('user_id', $id);

        return view('mentor.show', compact('mentor', 'act'));
    }

    public function edit($id)
    {
        $mentor = $this->userRepositoryEloquent->find($id);

        return view('mentor.edit', compact('mentor'));
    }

    public function update(Request $request, $id)
    {
        $this->userRepositoryEloquent->update($request->all(), $id);

        return redirect()->route('app.mentor.index');
    }

    public function delete($id)
    {
        $act = $this->actRepositoryEloquent->findByField('user_id', $id);

        $demandas = $this->demandService->getListDemandForUserId(id);
       /* // Colocar no serviço
        foreach($act as $item):
            $this->actRepositoryEloquent->delete($item->id);
        endforeach;*/
        foreach($demandas as $demanda):
            $this->demandService->declinar($demanda->id);
        endforeach;

        $this->userRepositoryEloquent->delete($id);

        return redirect()->route('app.mentor.index');
    }

    public function area($id)
    {
        $mentor = $this->userRepositoryEloquent->find($id);

        return view('mentor.area', compact('mentor'));
    }

    public function areaStore(Request $request)
    {
        $this->actRepositoryEloquent->create($request->all());

        return redirect()->route('app.mentor.index');
    }
}
