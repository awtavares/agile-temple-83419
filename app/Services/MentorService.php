<?php
/**
 * Created by PhpStorm.
 * User: João Marcus
 * Date: 26/04/2017
 * Time: 11:42
 */
namespace Mentor\Services;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Mentor\Repositories\ActRepositoryEloquent;
use Mentor\Repositories\DemandRepositoryEloquent;
use Mentor\Repositories\PerfomanceRepositoryEloquent;
use Mentor\Repositories\UserRepositoryEloquent;
use Mockery\Exception;
class MentorService
{
    /**
     * @var UserRepositoryEloquent
     */
    private $userRepositoryEloquent;
    /**
     * MentorService constructor.
     * @param UserRepositoryEloquent $userRepositoryEloquent
     */
    public function __construct(UserRepositoryEloquent
                                $userRepositoryEloquent)
    {
        $this->userRepositoryEloquent = $userRepositoryEloquent;
    }
    public function getAllMentors()
    {
        try {
            $mentors = $this->_filterRoleMentor();
            if($mentors):
                return $mentors;
            endif;
        } catch(Exception $exception) {
            $exception->getMessage();
        }
    }
    public function emailJaCadastrado($email)
    {
        try {
            return (sizeof( DB::table('users')->where('email',$email)->get() ) >= 1 );
        } catch (QueryException $q) {
            $q->getMessage();
        }
    }
    public function createMentor(array $data)
    {
        try {
            $mentor = null;
            if( !$this->emailJaCadastrado( $data['email'] ) ){
                $mentor = $this->userRepositoryEloquent->create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    // Alteração feita por causa do envio de e-mail
                    'password' => bcrypt($data['password']),
                    'roles' => 2,
                    'remember_token' => str_random(10),
                ]);
            }
            if($mentor):
                // Criar um evento e jogar numa queue, se não vai dar lag
                Mail::send('email.welcome', ['mentor' => $mentor, 'senha' => $data['password']], function ($message) use ($mentor) {
                    $message->from('joaomarcusjesus@gmail.com', 'MENTORING - UNIPÊ');
                    $message->to($mentor->email)->subject('Cadastro feito com sucesso!');
                });
                return $mentor;
            endif;
        } catch(Exception $exception) {
            $exception->getMessage();
        }
    }
    protected function _filterRoleMentor()
    {
        return DB::table('users')->where('roles', '2')->orderBy('name', 'asc')->get();
    }


    public $rules = [

        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'password_confirm' => 'required',

    ];



}