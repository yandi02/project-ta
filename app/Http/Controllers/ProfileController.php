<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\Shop\App\Models\Address;
use Modules\Shop\App\Models\Cart;
use Modules\Shop\App\Models\Cities;
use Modules\Shop\App\Models\Provinces;

use function PHPUnit\Framework\returnSelf;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function profile_user()
    {
        $this->data['user'] = auth()->user();
        $this->data['province'] = Provinces::all()->pluck('province_name', 'province_id');
        $this->data['city'] = Cities::all()->pluck('city_name', 'city_id');

        //ambil data cart item berdasarkan user yang sedang login
        $cart = Cart::where('user_id', auth()->id())->first();

        //hitung data cart item jika ada cart dari masing-masing user
        if ($cart) {
            $totalItems = $cart->items()->count();
        } else {
            $totalItems = 0;
        }
        $this->data['totalItems'] = $totalItems;

        return $this->loadTheme('profile.index', $this->data);
    }

    public function profile_admin()
    {
        $this->data['user'] = auth()->user();
        $this->data['province'] = Provinces::all()->pluck('province_name', 'province_id');
        $this->data['city'] = Cities::all()->pluck('city_name', 'city_id');

        return view('admin.profile.index', $this->data);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = auth()->user();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->nohp = $request->nohp;
        $user->alamat = $request->alamat;
        if ($request->has('password') && $request->password != "") {
            if (Hash::check($request->old_password, $user->password)) {
                if ($request->password == $request->password_confirmation) {
                    if (strlen($request->password) >= 8) {
                        $user->password = bcrypt($request->password);
                    } else {
                        return response()->json(['error' => 'Password kurang dari 8 karakter'], 422);
                    }
                } else {
                    return response()->json(['error' => 'Konfirmasi password tidak sesuai'], 422);
                }
            } else {
                return response()->json(['error' => 'Password lama tidak sesuai'], 422);
            }
        }

        if ($request->hasFile('foto-user')) {
            $foto_lama = $user->foto;
            if ($foto_lama) {
                $path_foto_lama = public_path('storage/img/' . $foto_lama);
                if (file_exists($path_foto_lama)) {
                    unlink($path_foto_lama);
                }
            }

            $foto_user = $request->file('foto-user');

            $angka_acak = rand(1000, 9999);
            $nama_file = 'foto-user-' . $angka_acak . '.' . $foto_user->getClientOriginalExtension();

            $path = $foto_user->storeAs('public/img', $nama_file);

            $user->foto = basename($path);
        } else {
            $user->foto = null;
        }
        // dd($user);
        $user->update();

        return response()->json($user, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
