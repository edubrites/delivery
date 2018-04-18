<?php
namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Authorizer;

class HomeController extends Controller
{
    private $userRepository;
    function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function index()
    {
        $userId = Authorizer::getResourceOwnerId();
        return $this->userRepository->skipPresenter(false)->find($userId);
    }
}