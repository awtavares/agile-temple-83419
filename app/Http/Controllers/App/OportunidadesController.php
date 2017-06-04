<?php

namespace Mentor\Http\Controllers\App;

use Illuminate\Http\Request;
use Mentor\Http\Controllers\Controller;
use Mentor\Repositories\OportunidadesRepositoryEloquent;
use Mentor\Services\OportunidadesService;

class OportunidadesController extends Controller
{
    private $oportunidadesService;
    /**
     * @var OportunidadesRepositoryEloquent
     */
    private $repositoryEloquent;


    public function __construct(OportunidadesService $oportunidadesService, OportunidadesRepositoryEloquent $repositoryEloquent)
    {

        $this->oportunidadesService = $oportunidadesService;
        $this->repositoryEloquent = $repositoryEloquent;
    }

    public function index()
    {
        $oportunidades = $this->repositoryEloquent->paginate(5);
        return view('oportunidades.index', compact('oportunidades'));
    }

    public function create()
    {
        return view('oportunidades.cadastrar');
    }

    public function store(Request $request)
    {
        // faz sentido, qualquer persistência é sempre uma boa jogar pro service tratar, boa!
        $this->oportunidadesService->criarOportunidade($request->all());

        return redirect()->route('app.oportunidades.index');
    }

    public function show($id)
    {
        // normalmente o eloquent que faz a parte de integração de dados
        // não é o service, pois, você fez method que já existem!
        // vou comentar o que voce fez, e mostrar o certo

        // $oportunidade = $this->oportunidadesService->findById($id);
        $oportunidade = $this->repositoryEloquent->find($id);
        return view('oportunidades.show', compact('oportunidade'));
    }

    public function edit($id)
    {
        $oportunidade = $this->repositoryEloquent->find($id);
        return view('oportunidades.edit', compact('oportunidade'));
    }

    public function update(Request $request)
    {
        // correto
        $this->oportunidadesService->atualizarOportunidade($request->all());
        return redirect()->route('app.oportunidades.index');
    }

    public function delete($id)
    {
        // Eu mudei aqui, normalmente eu trato os methods CRUDS, como se fosse um rest mesmo
        // o ideal é o delete, apenas passar o $id da entidade que tem que ser excluída
        // novamente, você não fez uso do eloquent, vou comentar e mostrar como é

        //$this->oportunidadesService->deletarOportunidade($id);
        $this->repositoryEloquent->delete($id);
        return redirect()->route('app.oportunidades.index');
    }
}
