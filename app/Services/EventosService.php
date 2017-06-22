<?php
/**
 * Created by PhpStorm.
 * User: Raniere de Lima ( ranieredelima@gmail.com )
 * Date: 21/05/2017
 * Time: 11:09
 */

namespace Mentor\Services;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mentor\Repositories\EventosRepositoryEloquent;
use Mentor\Repositories\UserRepositoryEloquent;
use Mockery\Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Mail;

class EventosService
{

    private $eventosRepository;
    private $userRepository;

    public function __construct(EventosRepositoryEloquent $eventosRepository,
                                UserRepositoryEloquent $userRepository)
    {
        $this->eventosRepository = $eventosRepository;
        $this->userRepository = $userRepository;
    }

    public function listarEventos()
    {
        try {
            return DB::table('eventos')->where('status','aprovado')->orderBy('data_do_evento', 'desc')->paginate(10);
        } catch (QueryException $q) {
            $q->getMessage();
        }
    }

    public function listarEventosSemPaginate()
    {
        try {
            return DB::table('eventos')->where('status','aprovado')->orderBy('data_do_evento', 'desc')->get();
        } catch (QueryException $q) {
            $q->getMessage();
        }
    }

    public function eventosPendentes()
    {
        try {
            return DB::table('eventos')->where('status','pendente')->orderBy('data_do_evento', 'desc')->paginate(10);
        } catch (QueryException $q) {
            $q->getMessage();
        }
    }

    public function criarEvento(array $data){

        try {
            $this->eventosRepository->create([
                'nome' => $data['nome'],
                'local' => $data['local'],
                'data_do_evento' => $data['data_do_evento'],
                'telefone' => $data['telefone'],
                'status' => Auth::user()->roles > 1 ? 'aprovado' : 'pendente',
                'user_id' => Auth::user()->id
            ]);

        } catch(Exception $exception) {
            $exception->getMessage();
        }
    }

    public function findById($id){
        try{
            return $this->eventosRepository->find($id);
        }catch(Exception $exception) {
            $exception->getMessage();
        }
    }

    public function findByUser($id){
        try{
            return $this->eventosRepository->findByField('user_id',$id);
        }catch(Exception $exception) {
            $exception->getMessage();
        }
    }

    public function atualizarEvento(array $data)
    {
        try {
            $this->eventosRepository->update([
                'nome' => $data['nome'],
                'local' => $data['local'],
                'data_do_evento' => $data['data_do_evento'],
                'telefone' => $data['telefone'],
                'status' => 'aprovado'
            ], $data{'evento_id'});

        } catch(Exception $exception) {
            $exception->getMessage();
        }

    }

    public function deletarEvento(array $data)
    {
        try{
            $this->eventosRepository->delete($data['evento_id']);
        }catch(Exception $exception) {
            $exception->getMessage();
        }
    }

    public function deletarEventoById($idEvento)
    {
        try{
            $this->eventosRepository->delete($idEvento);
        }catch(Exception $exception) {
            $exception->getMessage();
        }
    }

    public function aprovarEvento(array $data)
    {
        try {
        $this->eventosRepository->update([
            'status' => 'aprovado'
        ], $data{'evento_id'});

        } catch(Exception $exception) {
            $exception->getMessage();
        }
    }

    public function rejeitarEvento(array $data)
    {
        try {
            $this->eventosRepository->update([
                'status' => 'reprovado'
            ], $data{'evento_id'});

        } catch(Exception $exception) {
            $exception->getMessage();
        }
    }

    public function enviarEmail(array $data)
    {
        $eventos = array();
        try{
            foreach ($data as  $idEvento){
                $evento = $this->eventosRepository->find($idEvento);
                array_push($eventos, $evento);
            }
            $alunos = DB::table('users')->where('roles','1')->orderBy('id', 'asc')->get();
            foreach ($alunos as  $aluno){

                Mail::send('email.notificacaoEvento', ['eventos' => $eventos, 'aluno' => $aluno], function ($message) use ($aluno) {
                    $message->from('joaomarcusjesus@gmail.com', 'MENTORING - UNIPÊ');
                    $message->to($aluno->email)->subject('Mentoring - Novos Eventos');
                });

            }
        }catch(Exception $exception) {
            $exception->getMessage();
        }

    }


}