<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminClientRequest;
use App\Http\Requests\Request;
use App\Repositories\ClientRepository;
use App\Services\ClientService;


class ClientsController extends Controller
{

    /**
     * @var ClientRepository
     */
    private $repository;
    /**
     * @var ClientService
     */
    private $clientService;

    public function __construct(ClientRepository $repository, ClientService $clientService)
    {
        $this->repository = $repository;
        $this->clientService = $clientService;
    }

    public function index()
    {
        $clients = $this->repository->paginate();

        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(AdminClientRequest $request)
    {

        $data = $request->all();
        $this->clientService->create($data);

        return redirect()->route('admin.clients.index');

    }

    public function edit($id)
    {
        $client = $this->repository->find($id);
        
        return view('admin.clients.edit', compact('client'));
    }

    public function update(AdminClientRequest $request, $id)
    {
        $data = $request->all();

        $this->clientService->update($data,$id);

        return redirect()->route('admin.clients.index');
    }

    public function delete($id)
    {

        $this->repository->delete($id);

        return redirect()->route('admin.clients.index');
    }

}
