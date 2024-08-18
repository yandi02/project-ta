<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['no'] = 1;
        if (auth()->user()) {
            if (auth()->user()->level == 1) {
                return view('admin.customers.index', $this->data);
            } else {
                return redirect()->route('home');
            }
        }

        return view('auth.login');
    }

    public function data()
    {
        $pelanggan = User::where('users.level', 0)->get();

        return datatables()
            ->of($pelanggan)
            ->addIndexColumn()
            ->addColumn('nohp', function ($pelanggan) {
                return $pelanggan->nohp;
            })
            ->addColumn('alamat', function ($pelanggan) {
                return $pelanggan->alamat;
            })
            ->addColumn('aksi', function ($pelanggan) {
                return '
                    <div class="btn-group">
                        <button type="button" onclick="deleteData(`' . route('pelanggan.destroy', $pelanggan->id) . '`)" class="btn btn-sm btn-outline-danger">Hapus</button>
                    </div>
                ';
            })
            ->rawColumns(['aksi'])
            ->make('true');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pelanggan = User::find($id);
        $pelanggan->delete();

        return response(null, 204);
    }
}
