<?php

namespace Modules\Shop\App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Shop\Database\factories\ProductFactory;

class Product extends Model
{
    use HasFactory, UuidTrait;

    protected $table = 'shop_products';

    protected $fillable = [
        'parent_id',
        'user_id',
        'sku',
        'type',
        'name',
        'slug',
        'price',
        'featured_image',
        'sale_price',
        'status',
        'stock_status',
        'manage_stock',
        'publish_date',
        'excerpt',
        'body',
        'metas',
        'weight',
    ];

    public const DRAFT = 'DRAFT';
	public const ACTIVE = 'ACTIVE';
	public const INACTIVE = 'INACTIVE';
    public const STATUSES = [
		self::DRAFT => 'Draft',
		self::ACTIVE => 'Active',
		self::INACTIVE => 'Inactive',
	];

    public const STATUS_IN_STOCK = 'IN_STOCK';
    public const STATUS_OUT_OF_STOCK = 'OUT_OF_STOCK';
    public const STOCK_STATUSES = [
        self::STATUS_IN_STOCK => 'Tersedia',
        self::STATUS_OUT_OF_STOCK => 'Kosong',
    ];

	public const SIMPLE = 'SIMPLE';
	public const CONFIGURABLE = 'CONFIGURABLE';
	public const TYPES = [
		self::SIMPLE => 'Simple',
		self::CONFIGURABLE => 'Configurable',
	];
    
    protected static function newFactory(): ProductFactory
    {
        return ProductFactory::new();
    }

    public function user() {
        return $this->belongsTo('App\Models\User', $this->data);
    }

    public function inventory() {
        return $this->hasOne('Modules\Shop\App\Models\ProductInventory');
    }

    public function reduceInventory($quantity)
    {
        $inventory = $this->inventory;
        if ($inventory) {
            $inventory->qty -= $quantity;
            $inventory->save();
        }
    }

    public function variants() {
        return $this->hasMany('Modules\Shop\App\Models\Product', 'parent_id')->orderBy('price', 'asc');
    }

    public function categories() {
        return $this->belongsToMany('Modules\Shop\App\Models\Category', 'shop_categories_products', 'product_id', 'category_id');
    }

    public function tags() {
        return $this->belongsToMany('Modules\Shop\App\Models\Tag', 'shop_products_tags', 'product_id', 'tag_id');
    }

    public function attributes() {
        return $this->hasMany(ProductAttributes::class, 'product_id');
    }

    public function images() {
        return $this->hasMany('Modules\Shop\App\Models\ProductImage', 'product_id');
    }

    public function getPriceLabelAttribute() {
        return 'Rp. ' . number_format($this->price, 2, ',', '.');
    }

    public function getHasSalePriceAttribute() {
        return $this->sale_price != null;
    }

    public function getSalePriceLabelAttribute() {
        return 'Rp. ' . number_format($this->sale_price, 2, ',', '.');
    }

    public function getDiscountPercentAttribute() {
        $discountPercent = (($this->price - $this->sale_price) / $this->price) * 100;

        return number_format($discountPercent);
    }

    public function getStockStatusLabelAttribute() {
        return self::STOCK_STATUSES[$this->stock_status];
    }

    public function getTypesLabelAttribute() {
        return self::TYPES[$this->type];
    }
    //_
    public function getStockAttribute() {
        if (!$this->inventory) {
            return 0;
        }

        return $this->inventory->qty;
    }

    public function getCategoryNameAttribute() {
        if ($this->categories->isNotEmpty()) {
            return $this->categories->first()->name;
        }
        
        return null;
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($product) {
            $product->cartItems()->where('product_id', $product->id)->delete();
        });
    }

    public function cartItems()
    {
        return $this->hasMany('Modules\Shop\App\Models\CartItem', 'product_id', 'id');
    }
}