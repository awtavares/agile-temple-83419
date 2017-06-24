<?php
/**
 * Created by PhpStorm.
 * User: Raniere de Lima ( ranieredelima@gmail.com )
 * Date: 21/05/2017
 * Time: 11:56
 */

namespace Mentor\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mentor\Repositories\OportunidadesRepositoryEloquent;
use Mentor\Repositories\UserRepositoryEloquent;
use Illuminate\Database\QueryException;
use Mockery\Exception;

class OportunidadesService
{
    private $oportunidadesRepository;
    private $userRepository;

    public function __construct(OportunidadesRepositoryEloquent $oportunidadesRepository,
                                UserRepositoryEloquent $userRepository)
    {

        $this->oportunidadesRepository = $oportunidadesRepository;
        $this->userRepository = $userRepository;
    }

    public function listarOportunidades()
    {
        try {
            return DB::table('oportunidades')->orderBy('id', 'desc')->paginate(10);
        } catch (QueryException $q) {
            $q->getMessage();
        }
    }

    public function criarOportunidade(array $data)
    {
        try{
            $this->oportunidadesRepository->create([
                'nome' => $data['nome'],
                'local' => $data['local'],
                'remuneracao' => $data['remuneracao'],
                'descricao' => $data['descricao'],
                'user_id' => Auth::user()->id
            ]);
        }catch (Exception $e){
            $e->getMessage();
        }
    }

    public function findById($id)
    {
        try{
            return $this->oportunidadesRepository->find($id);
        }catch(Exception $exception) {
            $exception->getMessage();
        }
    }

    public function findByUser($id)
    {
        try{
            return $this->oportunidadesRepository->findByField('user_id',$id);
        }catch(Exception $exception) {
            $exception->getMessage();
        }
    }

    public function atualizarOportunidade(array $data){
        try {
            $this->oportunidadesRepository->update([
                'nome' => $data['nome'],
                'local' => $data['local'],
                'remuneracao' => $data['remuneracao'],
                'descricao' => $data['descricao'],
            ], $data{'oportunidade_id'});

        } catch(Exception $exception) {
            $exception->getMessage();
        }
    }

    public function deletarOportunidade(array $data)
    {
        try{
            $this->oportunidadesRepository->delete($data['oportunidade_id']);
        }catch(Exception $exception) {
            $exception->getMessage();
        }
    }

    public function deletarOportunidadeById($idEvento)
    {
        try{
            $this->oportunidadesRepository->delete($idEvento);
        }catch(Exception $exception) {
            $exception->getMessage();
        }
    }

    public $rules = [

        'nome' => 'required',
        'remuneracao' => 'required',
        'descricao' => 'required',
        'local' => 'required',

    ];

}