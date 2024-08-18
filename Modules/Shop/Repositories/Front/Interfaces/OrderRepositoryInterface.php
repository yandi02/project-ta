<?php

namespace Modules\Shop\Repositories\Front\Interfaces;

use App\Models\User;
use Modules\Shop\App\Models\Address;
use Modules\Shop\App\Models\Cart;
use Modules\Shop\App\Models\Order;

interface OrderRepositoryInterface{
    public function create(User $user, Cart $cart, Address $address, $shipping = []) : Order;
}