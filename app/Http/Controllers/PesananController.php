<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Shop\App\Models\Order;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pesanan.index');
    }

    public function data()
    {
        $pesanan = Order::select(
            'customer_first_name',
            'customer_last_name',
            DB::raw("CONCAT(customer_first_name, ' ', customer_last_name) as full_name"),
            'customer_address1',
            'customer_phone',
            'grand_total',
            'status'
        )->get();

        return datatables()
            ->of($pesanan)
            ->addIndexColumn()
            ->addColumn('status', function ($pesanan) {
                if ($pesanan->status == Order::STATUS_PENDING) {
                    return '<span class="badge bg-warning text-white">' . $pesanan->status . '</span>';
                }elseif ($pesanan->status == Order::STATUS_CONFIRMED) {
                    return '<span class="badge bg-success text-white">' . $pesanan->status . '</span>';
                }elseif ($pesanan->status == Order::STATUS_CANCELLED) {
                    return '<span class="badge bg-danger text-white">' . $pesanan->status . '</span>';
                }
            })            
            ->addColumn('grand_total', function ($pesanan) {
                return 'Rp. ' . number_format($pesanan->grand_total, 2, ',', '.');
            })
            ->rawColumns(['status'])
            ->make(true);
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
