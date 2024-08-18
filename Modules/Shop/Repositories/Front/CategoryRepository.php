<?php
namespace Modules\Shop\Repositories\Front;

use Modules\Shop\App\Models\Category;
use Modules\Shop\App\Models\Product;
use Modules\Shop\Repositories\Front\Interfaces\CategoryRepositoryInterface;
use Illuminate\Support\Str;

class CategoryRepository implements CategoryRepositoryInterface{
    public function findAll($options = [])
    {
        $sort = $options['sort'] ?? null;
        
        return Category::orderBy('name', 'desc')->get();

        $products = Product::with(['categories', 'tags']);

        if ($sort) {
            $products = $products->orderBy($sort['sort'], $sort['order']);
        }
    }

    public function findBySlug($slug)
    {
        return Category::where('slug', $slug)->firstOrFail();
    }
    
    public function insertData($request) {
        $category = new Category();
        $category->name = ucwords($request->name);
        $category->slug = Str::slug($request->name);
        $category->save();
    }

    public function updateData($request, $id) {
        $category = Category::find($id);
        $category->name = ucwords($request->name);
        $category->slug = Str::slug($request->name);
        $category->update();
    }

    public function deleteData($id) {
        $kategori = Category::find($id);
        $kategori->delete();
    }
}
?>