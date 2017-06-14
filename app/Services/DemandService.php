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
use Mentor\Repositories\ActRepositoryEloquent;
use Mentor\Repositories\DemandRepositoryEloquent;
use Mentor\Repositories\PerfomanceRepositoryEloquent;
use Mentor\Repositories\UserRepositoryEloquent;
use Illuminate\Support\Facades\Mail;
class DemandService
{
    /**
     * @var DemandRepository
     */
    private $demandRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var PerfomanceRepositoryEloquent
     */
    private $perfomanceRepositoryEloquent;
    /**
     * @var ActRepositoryEloquent
     */
    private $actRepositoryEloquent;
    public function __construct(DemandRepositoryEloquent $demandRepository,
                                UserRepositoryEloquent $userRepository, ActRepositoryEloquent $actRepositoryEloquent)
    {
        $this->demandRepository = $demandRepository;
        $this->userRepository = $userRepository;
        $this->actRepositoryEloquent = $actRepositoryEloquent;
    }
    public function myDemands()
    {
        //Quem tá logado?
        if ($this->getMyAuth()):
            $Who = Auth::user();
            try {
                //Pego as demandas usando o _id do cara logado
                if(Auth::user()->roles == 1):
                    $demand = $this->demandRepository->findByField('user_id', $Who->id);
                elseif(Auth::user()->roles == 2):
                    $demand = $this->demandRepository->findByField('mentor', $Who->id);
                // endif;
                else:
                    /** Fluxo atualizado 04/05/2017 by jm **/
                    //FIXME USAR PAGINAÇÃO POR USER? -- ?
                    $demand = $this->demandRepository->orderBy('status', 'ASC')->paginate(10);
                endif;
                return $demand;
            } catch (QueryException $q) {
                $q->getMessage();
            }
        endif;
    }
    public function myDemandsCreate(array $data)
    {
        try {
            $this->demandRepository->create([
                'title' => $data['title'],
                'subject' => $data['subject'],
                'doubt' => $data['doubt'],
                'email' => $this->getEmailUser(),
                'user_id' => $this->getMyUserById()
            ]);
            $admins = DB::table('users')->where('roles', 3)->get();
            foreach ($admins as $admin){
                Mail::send('email.createDemand', ['demanda' => $data, 'mediador'=>$admin], function ($message) use ($admin) {
                    $message->from('joaomarcusjesus@gmail.com', 'Mentoring - Unipê 2017');
                    $message->to($admin->email)->subject('Mentoring - Nova demanda cadastrada');
                });
            }
        } catch (QueryException $exception) {
            $exception->getMessage();
        }
    }
    public function myDemandsUpdate(array $data, $id)
    {
        try {
            $this->demandRepository->update([
                'title' => $data['title'],
                'subject' => $data['subject'],
                'doubt' => $data['doubt'],
                'email' => $data['email'],
                'user_id' => $this->getMyUserById()
            ], $id);
        } catch (QueryException $exception) {
            $exception->getMessage();
        }
    }
    public function declinar($id){
        try {
            $demanda =  $this->demandRepository->find($id);
            $mentor = $this->userRepository->find($demanda->mentor);
            $mentor->qtd = $mentor->qtd - 1;
            $mentor->save();
            $demanda->mentor = null;
            $demanda->status = 1;
            $demanda->save();
        } catch(QueryException $exception) {
            $exception->getMessage();
        }
    }
    private function getMyAuth()
    {
        return Auth::check();
    }
    private function getMyUserById()
    {
        if ($this->getMyAuth()):
            return Auth::user()->id;
        endif;
    }
    private function getEmailUser()
    {
        if ($this->getMyAuth()):
            return Auth::user()->email;
        endif;
    }
    protected function _filterJoinUserInDemands()
    {
        return $HasDemand = DB::table('users')
            ->join('demands', 'users.id', '=', 'demands.user_id')
            ->select('users.*', 'demands.*')
            ->get();
    }
    protected function _filterHasUserDemandsByQtd()
    {
        return $HasQtd = DB::table('users')
            ->select('*')
            ->where('qtd', '>=', 1)
            ->groupBy('id')
            ->get();
    }
    protected function _filterIsLowerUserDemands()
    {
        try {
            //FIXME E se não tiver o usuário com determiada qtd?
            $verifyUserQtd = $users = DB::table('users')->count();
            if($verifyUserQtd):
                return DB::table('users')
                    ->where('qtd', DB::raw("(select min(qtd) from users where roles = 2)"))
                    ->get();
            endif;
        } catch(QueryException $exception) {
            $exception->getMessage();
        }
    }
    private function formatMyBuildQuery(array $stdClass)
    {
        foreach ($stdClass as $myItems)
        {
            return $myItems->id;
        }
    }
}