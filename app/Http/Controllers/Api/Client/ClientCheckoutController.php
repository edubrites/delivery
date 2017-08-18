<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use App\Http\Controllers\OrdersController;
use App\Repositories\OrderRepository;
use App\Repositories\UserRepository;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;


class ClientCheckoutController extends Controller
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

    public function __construct(
        OrderRepository $repository,
        UserRepository $userRepository,
        OrderService $orderService
    )
    {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
        $this->orderService = $orderService;
    }

    public function index(OrdersController $ordersController)
    {
        $status_list = $ordersController->getStatusOrder();

        $id = Authorizer::getResourceOwnerID();
        $clientId = $this->userRepository->find($id)->client->id;
        $orders = $this->repository->with(['items'])->scopeQuery(function ($query) use($clientId) {
            return $query->where('client_id', '=', $clientId);
        })->paginate();

        return $orders;
    }

    public function show($id)
    {

        $order = $this->repository->with(['client','items','cupom'])->find($id);

        $order->items->each( function($item){
            $item->product;
        });

        return $order;

    }

    public function store(Request $request)
    {
        $data = $request->all();

        $id = Authorizer::getResourceOwnerID();

        $clientId = $this->userRepository->find($id)->client->id;

        $data['client_id'] = $clientId;

        $order = $this->orderService->create($data);
        $order = $this->repository->with('items')->find($order->id);

        return $order;
    }
}
