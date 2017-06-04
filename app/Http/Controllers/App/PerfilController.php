<?php
/**
 * Created by PhpStorm.
 * User: Raniere de Lima ( ranieredelima@gmail.com )
 * Date: 01/06/2017
 * Time: 22:11
 */


namespace Mentor\Http\Controllers\App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Mentor\Http\Controllers\Controller;
use Mentor\Repositories\UserRepositoryEloquent;
use Mentor\Services\UserService;

class PerfilController extends Controller
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

        $user = Auth::user();
        return view('perfil.perfil', compact('user'));
    }

    public function atualizarDados(Request $request)
    {

        $retorno = array();
        if(  Auth::user()->email !== $request['email'] ) :
            $retorno = $this->userService->emailJaCadastrado($request['email']);
        endif;

        if( sizeof($retorno) === 0  ):
            $this->userService->atualizarDados($request->all());
            $request->session()->flash('success', 'Dados atualizados com sucesso' );
        else:
            $request->session()->flash('error', 'Não atualizado, e-mail informado já está sendo utilizado' );
        endif;

        return redirect()->route('app.perfil.index');
    }

    public function atualizarSenha(Request $request)
    {
//        if(Auth::user()->password === bcrypt($request['senhaAtual'])):

        $atualizou = $this->userService->atualizarSenha($request->all());

        if ($atualizou):
            $request->session()->flash('success', 'Senha atualizada com sucesso');
        else:
            $request->session()->flash('error', 'Nova senha não confere com a confirmação');
        endif;


//        else:
//            $request->session()->flash('error', 'Senha informada não é igual a senha do usuário');
//
//        endif;

        return redirect()->route('app.perfil.index');
    }
}