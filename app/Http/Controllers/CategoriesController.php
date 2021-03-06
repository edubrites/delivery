<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminCategoryRequest;
use App\Http\Requests\Request;
use App\Repositories\CategoryRepository;
//use Illuminate\Http\Request;


class CategoriesController extends Controller
{

    /**
     * @var CategoryRepository
     */
    private $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $categories = $this->repository->paginate();

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(AdminCategoryRequest $request)
    {

        $data = $request->all();
        $this->repository->create($data);

        return redirect()->route('admin.categories.index');

    }

    public function edit($id)
    {
        $category = $this->repository->find($id);
        
        return view('admin.categories.edit', compact('category'));
    }

    public function update(AdminCategoryRequest $request, $id)
    {
        $data = $request->all();
        $this->repository->update($data,$id);

        return redirect()->route('admin.categories.index');
    }

    public function delete($id)
    {

        $this->repository->delete($id);

        return redirect()->route('admin.categories.index');
    }

}
