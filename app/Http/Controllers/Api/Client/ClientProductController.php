<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;

class ClientProductController extends Controller
{

    /**
     * @var ProductRepository
     */
    private $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;

    }

    public function index()
    {
        $products = $this->repository->skipPresenter(false)->all();

        return $products;
    }
}
