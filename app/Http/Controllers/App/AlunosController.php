<?php
/**
 * Created by PhpStorm.
 * User: Raniere de Lima ( ranieredelima@gmail.com )
 * Date: 03/06/2017
 * Time: 01:08
 */

namespace Mentor\Http\Controllers\App;

use Mentor\Http\Controllers\Controller;
use Mentor\Repositories\UserRepositoryEloquent;
use Mentor\Services\UserService;

class AlunosController extends Controller
{
    /**
     * @var UserRepositoryEloquent
     */
    private $repositoryEloquent;

    private $userService;

    public function __construct( UserRepositoryEloquent $repositoryEloquent , UserService $userService)
    {

        $this->repositoryEloquent = $repositoryEloquent;
        $this->userService = $userService;
    }


    public function index()
    {
        $alunos = $this->userService->listarAlunos();

        return view('alunos.index', compact('alunos'));
    }

    public function show($id)
    {
        $aluno = $this->repositoryEloquent->find($id);
        return view('alunos.show', compact('aluno'));
    }
}