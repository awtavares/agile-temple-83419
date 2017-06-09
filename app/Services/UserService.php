<?php
/**
 * Created by PhpStorm.
 * User: Raniere de Lima ( ranieredelima@gmail.com )
 * Date: 02/06/2017
 * Time: 07:05
 */

namespace Mentor\Services;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mentor\Repositories\EventosRepositoryEloquent;
use Mentor\Repositories\UserRepositoryEloquent;
use Mockery\Exception;
use Illuminate\Database\QueryException;

class UserService
{

    private $userRepository;

    public function __construct(UserRepositoryEloquent $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function atualizarSenha(array $request)
    {
        $atualizou = false;
        try{
            $senhasIguais = ( $request['novaSenha'] === $request['confirmacaoSenha'] );
            if($senhasIguais):

                $user = array(
                    'id'=>$request['user_id'],
                    'name'=>Auth::user()->name,
                    'email'=>Auth::user()->email,
                    'perfil'=>Auth::user()->perfil,
                    'qtd'=>Auth::user()->qtd,
                    'password'=>bcrypt($request['novaSenha']),
                    'roles'=>Auth::user()->roles,
                    'remenber_token'=>Auth::user()->remenber_token
                );


                $this->userRepository->update($user, $request['user_id']);
                $atualizou = true;
            else:

                $atualizou = false;
            endif;
        } catch (QueryException $q) {
            $atualizou = false;
            $q->getMessage();
        }
        return $atualizou;
    }


    public function atualizarDados(array $request)
    {
        try{
            $this->userRepository->update($request, $request['user_id']);
        } catch (QueryException $q) {
            $q->getMessage();
        }

    }

    public function emailJaCadastrado($email)
    {
        try {
            return DB::table('users')->where('email',$email)->get();
        } catch (QueryException $q) {
            $q->getMessage();
        }

    }

    public function listarAlunos()
    {
        try {
            return DB::table('users')->where('roles','1')->paginate(10);
        } catch (QueryException $q) {
            $q->getMessage();
        }
    }

}