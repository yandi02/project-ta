<?php

namespace Modules\Shop\App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use UuidTrait;

    protected $table = 'shop_cart_items';

    protected $fillable = [
        'cart_id',
        'product_id',
        'qty',
    ];

    public function cart() {
        return $this->belongsTo(Cart::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function getSubTotalAttribute() {
        return 'Rp. ' . number_format($this->qty * $this->product->price, 2, ',', '.');
    }

    public function getDiscountSubTotalAttribute() {
        return 'Rp. ' . number_format($this->qty * $this->product->sale_price, 2, ',', '.');
    }
}
