<?php

namespace App\Http\Controllers\Api\Deliveryman;

use App\Http\Controllers\Controller;
use App\Http\Controllers\OrdersController;
use App\Repositories\OrderRepository;
use App\Repositories\UserRepository;
use App\Services\OrderService;
use Illuminate\Http\Request;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;


class DeliverymanCheckoutController extends Controller
{


    private $orderService;
    /**
     * @var OrderRepository
     */
    private $repository;
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(OrderRepository $repository, UserRepository $userRepository, OrderService $orderService){
        $this->repository = $repository;
        $this->userRepository = $userRepository;
        $this->orderService = $orderService;
    }

    public function index(OrdersController $ordersController){
        $id = Authorizer::getResourceOwnerID();
        $orders = $this->repository->with(['items'])->scopeQuery(function($query) use ($id){
            return $query->where('user_deliveryman_id', '=', $id);
        })->paginate();

        return $orders;
    }

    public function show($id){

        $idDeliveryman = Authorizer::getResourceOwnerId();

        return $this->repository->getByIdAndDeliveryman($id, $idDeliveryman);

    }

    public function updateStatus(Request $request, $id)
    {
        $idDeliveryman = Authorizer::getResourceOwnerId();
        $order = $this->orderService->updateStatus($id, $idDeliveryman, $request->get('status'));

        if($order){
            return $order;
        }

        abort(400, "Order não encontrado.");

    }

}
