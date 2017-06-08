<?php

namespace Mentor\Http\Controllers\App;

use Illuminate\Http\Request;
use Mentor\Http\Controllers\Controller;
use Mentor\Repositories\PerfomanceRepositoryEloquent;

class AreaController extends Controller
{

    /**
     * @var PerfomanceRepositoryEloquent
     */
    private $perfomanceRepositoryEloquent;

    public function __construct(PerfomanceRepositoryEloquent
     $perfomanceRepositoryEloquent)
    {
        $this->perfomanceRepositoryEloquent = $perfomanceRepositoryEloquent;
    }

    public function index()
    {
        $perfomances = $this->perfomanceRepositoryEloquent->paginate(10);

        return view('atuacao.index', compact('perfomances'));
    }

    public function show()
    {
        return view('atuacao.show');
    }

    public function create()
    {
        return view('atuacao.create');
    }

    public function store(Request $request)
    {
        $area = $request->all();
        $this->perfomanceRepositoryEloquent->create($area);

        return redirect()->route('app.area.index');
    }

}
