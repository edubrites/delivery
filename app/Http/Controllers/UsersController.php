<?php
namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;
//use App\Http\Requests;
use App\Repositories\UserRepository;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class UsersController extends Controller
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function authenticated()
    {
        $id = Authorizer::getResourceOwnerId();
        $userId = $this->userRepository->with('client')->find($id);

        return $userId;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
}