<?php

namespace Modules\Shop\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Shop\Database\factories\ProvincesFactory;

class Provinces extends Model
{
    use HasFactory;

    protected $table = 'shop_provinces';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    
    protected static function newFactory(): ProvincesFactory
    {
        return ProvincesFactory::new();
    }
}
