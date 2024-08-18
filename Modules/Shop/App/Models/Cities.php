<?php

namespace Modules\Shop\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Shop\Database\factories\CitiesFactory;

class Cities extends Model
{
    use HasFactory;

    protected $table = 'shop_cities';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    
    protected static function newFactory(): CitiesFactory
    {
        return CitiesFactory::new();
    }
}
