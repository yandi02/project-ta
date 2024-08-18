<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Modules\Shop\App\Models\Cart;
use Modules\Shop\App\Models\Category;
use Modules\Shop\Repositories\Front\Interfaces\CategoryRepositoryInterface;
use Modules\Shop\Repositories\Front\Interfaces\ProductRepositoryInterface;

class CategoryController extends Controller
{
    protected $categoryRepository;
    protected $productRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository, ProductRepositoryInterface $productRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
        $this->data['no'] = 1;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()) {
            if (auth()->user()->level == 1) {
                return view('admin.category.index', $this->data);
            } else {
                return redirect()->route('home');
            }
        }

        return view('auth.login');
    }

    public function data()
    {
        $category = $this->categoryRepository->findAll();

        return datatables()
            ->of($category)
            ->addIndexColumn()
            ->addColumn('aksi', function ($category) {
                return '
                    <div class="btn-group">
                        <button type="button" onclick="editForm(`' . route('category.update', $category->id) . '`)" class="btn btn-sm btn-outline-info">Ubah</button>
                        <button type="button" onclick="deleteData(`' . route('category.destroy', $category->id) . '`)" class="btn btn-sm btn-outline-danger">Hapus</button>
                    </div>
                ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->categoryRepository->insertData($request);

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::find($id);

        return response()->json($category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $this->categoryRepository->updateData($request, $id);

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->categoryRepository->deleteData($id);

        return response(null, 204);
    }
}
