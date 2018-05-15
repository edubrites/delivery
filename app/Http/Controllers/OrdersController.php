<?php
namespace App\Http\Controllers;

use App\Http\Requests\AdminOrderRequest;
use App\Repositories\OrderRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * @var OrderRepository
     */
    private $repository;



    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $list_status = $this->getStatusOrder();

        $orders = $this->repository->paginate();

        return view('admin.orders.index', compact('orders','list_status'));
    }

    public function edit(UserRepository $userRepository, $id)
    {
        $list_status = $this->getStatusOrder();

        $order = $this->repository->find($id);
        $deliveryman = $userRepository->getDeliverymen();

        return view('admin.orders.edit', compact('order', 'list_status', 'deliveryman'));
    }

    public function update(Request $request, $id)
    {
        $all = $request->all();
        $this->repository->update($all, $id);
        return redirect()->route('admin.orders.index');
    }

    public function getStatusOrder($status=false)
    {
        $list_status = [0 => 'Pendente', 1 => 'A Caminho', 2 => 'Entregue', 3 => 'Cancelado'];

        if(isset($status)){
            return $list_status[$status];
        }else{
            return $list_status;
        }
    }

}