<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\Traits\UuidTrait;

class User extends Authenticatable
{
    public const JENIS_KELAMIN = [
        'Laki-laki' => 'Laki-laki',
        'Perempuan' => 'Perempuan',
    ];

    public const AGAMA = [
        'Islam' => 'Islam',
        'Katolik' => 'Katolik',
        'Protestan' => 'Protestan',
        'Hindu' => 'Hindu',
        'Buddha' => 'Buddha',
        'Konghucu' => 'Konghucu',
    ];

    use HasApiTokens, HasFactory, Notifiable, UuidTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'level',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($user) {
            // Hapus item dalam cart jika cart ada
            if ($user->shopCart) {
                $user->shopCart->items()->delete();  // Hapus semua item dalam cart
                $user->shopCart()->delete();         // Hapus cart itu sendiri
            }

            // Hapus alamat terkait jika ada
            $user->shopAddresses()->delete();
        });
    }

    public function shopAddresses()
    {
        return $this->hasMany('Modules\Shop\App\Models\Address', 'user_id', 'id');
    }

    public function shopCart()
    {
        return $this->hasOne('Modules\Shop\App\Models\Cart', 'user_id', 'id');
    }

    public function shopCartItem()
    {
        return $this->hasManyThrough(
            'Modules\Shop\App\Models\CartItem',
            'Modules\Shop\App\Models\Cart',
            'user_id',
            'cart_id',
            'id',
            'id'
        );
    }

    public function shopOrder()
    {
        return $this->hasOne('Modules\Shop\App\Models\Order', 'user_id', 'id');
    }

    public function shopOrderItem()
    {
        return $this->hasManyThrough(
            'Modules\Shop\App\Models\OrderItem',
            'Modules\Shop\App\Models\Order',
            'user_id',
            'cart_id',
            'id',
            'id'
        );
    }
}
