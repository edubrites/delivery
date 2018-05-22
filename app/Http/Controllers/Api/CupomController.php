<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cupom;
use App\Repositories\CupomRepository;

class CupomController extends Controller
{

    /**
     * @var CupomRepository
     */
    private $repository;

    public function __construct(CupomRepository $repository)
    {
        $this->repository = $repository;

    }

    public function show($code)
    {
        return $this->repository->skipPresenter(false)->findByCode($code);
    }
}
