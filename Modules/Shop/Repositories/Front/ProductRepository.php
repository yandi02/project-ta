<?php

namespace Modules\Shop\Repositories\Front;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Shop\Repositories\Front\Interfaces\ProductRepositoryInterface;
use Illuminate\Support\Str;
use Modules\Shop\App\Models\CategoryProduct;
use Modules\Shop\App\Models\{
    Category,
    Product,
    Tag,
    ProductInventory,
};

class ProductRepository implements ProductRepositoryInterface
{
    public function findAll($options = [])
    {
        $perPage = $options['per_page'] ?? null;
        $categorySlug = $options['filter']['category'] ?? null;
        $tagSlug = $options['filter']['tag'] ?? null;
        $priceFilter = $options['filter']['price'] ?? null;
        $sort = $options['sort'] ?? null;

        $products = Product::with(['categories', 'tags', 'inventory'])->orderBy('price', 'desc');

        if ($categorySlug) {
            $category = Category::where('slug', $categorySlug)->firstOrFail();

            $childCategoryIDs = Category::childIDs($category->id);

            $categoryIDs = array_merge([$category->id], $childCategoryIDs);

            $products = $products->whereHas('categories', function ($query) use ($categoryIDs) {
                $query->whereIn('shop_categories.id', $categoryIDs);
            });
        }

        if ($tagSlug) {
            $tag = Tag::where('slug', $tagSlug)->firstOrFail();

            $products = $products->whereHas('tags', function ($query) use ($tag) {
                $query->where('shop_tags.id', $tag->id);
            });
        }

        if ($priceFilter) {
            $products = $products->where('price', '>=', $priceFilter['min'])
                ->where('price', '<=', $priceFilter['max']);
        }

        if ($sort) {
            $products = $products->orderBy($sort['sort'], $sort['order']);
        }

        if ($perPage) {
            return $products->paginate($perPage);
        }

        return $products->get();
    }

    public function findBySKU($sku)
    {
        return Product::where('sku', $sku)->firstOrFail();
    }

    public function findByID($id)
    {
        return Product::where('id', $id)->with('inventory', 'categories')->firstOrFail();
    }

    public function findUser()
    {
        return User::where('level', 1)->pluck('name', 'id');
    }

    public function findCategory()
    {
        return Category::all()->pluck('name', 'id');
    }

    public function insertData(Request $request)
    {
        // dd($request->all());
        $product = new Product();
        $inventory = new ProductInventory();

        $product->id = (string) Str::uuid();
        $product->user_id = Auth::user()->id;
        $product->sku = $request->sku;
        $product->type = "SIMPLE";
        $product->name = ucwords($request->name);
        $product->slug = Str::slug($request->name);
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->status = "ACTIVE";
        $product->weight = $request->weight;
        // $product->stock_status = $request->stock_status;
        if ($request->stock > 0) {
            $product->stock_status = "IN_STOCK";
        } else {
            $product->stock_status = "OUT_OF_STOCK";
        }
        $product->manage_stock = ($product->stock_status == 'IN_STOCK') ? 1 : 0;
        $product->publish_date = now();
        $product->excerpt = $request->description;

        if ($request->hasFile('foto_produk')) {
            $foto_produk = $request->file('foto_produk');
            
            $nama_file = 'foto-produk-' . $request->sku . '.' . $foto_produk->getClientOriginalExtension();

            $path_foto = $foto_produk->storeAs('public/img', $nama_file);

            $product->featured_image = basename($path_foto);
        } else {
            $product->featured_image = null;
        }
        // dd($product);
        $product->save();

        if ($request->has('category')) {
            $product->categories()->attach($request->category);
        }

        if (empty($request->stock)) {
            $inventory->qty = 0;
        } else {
            $inventory->qty = $request->stock;
        }
        $inventory->product_id = $product->id;
        $inventory->save();
    }

    public function updateData($request, $id)
    {
        $product = Product::find($id);
        $inventory = ProductInventory::where('product_id', $product->id)->first();

        $product->id = $product->id;
        $product->user_id = Auth::user()->id;
        $product->sku = $request->sku;
        $product->type = "SIMPLE";
        $product->name = ucwords($request->name);
        $product->slug = Str::slug($request->name);
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->status = "ACTIVE";
        $product->weight = $request->weight;
        if ($request->stock > 0) {
            $product->stock_status = "IN_STOCK";
        } else {
            $product->stock_status = "OUT_OF_STOCK";
        }
        $product->manage_stock = ($product->stock_status == 'IN_STOCK') ? 1 : 0;

        if ($request->hasFile('foto_produk')) {
            $foto_lama = $product->getOriginal('featured_image');
            if ($foto_lama) {
                $path_foto_lama = public_path('storage/img/' . $foto_lama);
                if (file_exists($path_foto_lama)) {
                    unlink($path_foto_lama);
                }
            }

            $foto_produk = $request->file('foto_produk');

            $nama_file = 'foto-produk-' . $request->sku . '.' . $foto_produk->getClientOriginalExtension();

            $path_foto = $foto_produk->storeAs('public/img', $nama_file);

            $product->featured_image = basename($path_foto);
        } else {
            $product->featured_image = $product->getOriginal('featured_image');
        }

        $product->publish_date = now();
        $product->excerpt = $request->description;

        // dd($product);
        $product->update();

        $product->categories()->sync([$request->category]);

        if (empty($request->stock)) {
            $inventory->qty = 0;
        } else {
            $inventory->qty = $request->stock;
        }
        $inventory->update();
    }

    public function deleteData($id)
    {
        $product = Product::find($id);

        if ($product) {
            $imagePath = public_path('storage/img/' . $product->featured_image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            $product->categories()->detach();
            $product->tags()->detach();
            $product->delete();
        }
    }
}
