<?php

namespace App\Http\Middleware;

use App\Repositories\UserRepository;
use Closure;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;


class OAuthCheckRole
{

    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {

        $this->userRepository = $userRepository;
    }


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role) //aqui adicionamos um parametro para o middleware
    {

        $id = Authorizer::getResourceOwnerID();

        $user = $this->userRepository->find($id);

        if($user->role != $role){
            abort(403, 'Access Forbidden');
        }


        return $next($request);
    }
}