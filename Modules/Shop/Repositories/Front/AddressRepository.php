<?php

namespace Modules\Shop\Repositories\Front;

use App\Models\User;
use Modules\Shop\App\Models\Address;
use Modules\Shop\Repositories\Front\Interfaces\AddressRepositoryInterface;

class AddressRepository implements AddressRepositoryInterface
{
    public function findByUser(User $user)
    {
        return Address::where('user_id', $user->id)->orderBy('is_primary', 'desc')->get();
    }

    public function findByID(string $id)
    {
        return Address::findOrFail($id);
    }

    public function addAddress($request)
    {
        $address = new Address();

        $address->user_id = $request->user_id;
        if (Address::where('user_id', $address->user_id)->count() <= 0) {
            $address->is_primary = 1;
        } else {
            $address->is_primary = 0;
        }        
        $address->label =  $request->label;
        $address->first_name = $request->first_name;
        $address->last_name = $request->last_name;
        $address->address1 = $request->address1;
        $address->address2 = $request->address2;
        $address->phone = $request->phone;
        $address->email = $request->email;
        $address->city = $request->city;
        $address->province = $request->province;
        $address->postcode = $request->postcode;
        $address->save();
    }

    public function removeAddress($id): bool
    {
        return Address::where('id', $id)->delete();
    }
}
