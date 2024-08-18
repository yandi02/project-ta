<?php

namespace Modules\Shop\App\Models;

use App\Models\User;
use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Shop\Database\factories\CategoryFactory;

class Cart extends Model
{
    use UuidTrait;

    protected $table = 'shop_carts';

    protected $fillable = [
        'user_id',
        'expired_at',
        'base_total_price',
        'discount_percent',
        'discount_amount',
        'tax_percent',
        'tax_amount',
        'grand_total',
        'total_weight',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, $this->data);
    }

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }

    public function scopeForUser(Builder $query, User $user): void
    {
        $query->where('user_id', $user->id);
    }

    public function getBaseTotalPriceLabelAttribute()
    {
        return 'Rp. ' . number_format($this->base_total_price, 2, ',', '.');
    }

    public function getDiscountAmountLabelAttribute()
    {
        return 'Rp. ' . number_format($this->discount_amount, 2, ',', '.');
    }

    public function getSubTotalPriceLabelAttribute()
    {
        return 'Rp. ' . number_format($this->base_total_price - $this->discount_amount, 2, ',', '.');
    }

    public function getTaxAmountLabelAttribute()
    {
        return 'Rp. ' . number_format($this->tax_amount, 2, ',', '.');
    }

    public function getGrandTotalLabelAttribute()
    {
        return 'Rp. ' . number_format($this->grand_total, 2, ',', '.');
    }
}
