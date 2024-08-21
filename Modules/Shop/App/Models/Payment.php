<?php

namespace Modules\Shop\App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Modules\Shop\Database\factories\PaymentFactory;

class Payment extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'shop_payments';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'order_id',
        'code',
        'payment_type',
        'status',
        'approved_by',
        'approved_at',
        'note',
        'rejected_by',
        'rejected_at',
        'rejection_note',
        'amount',
        'payloads',
    ];

    public const EXPIRY_DURATION = 1;
    public const EXPIRY_UNIT = 'days';
    public const PAYMENT_CHANNELS = [
        'mandiri_clickpay',
        'cimb_clicks',
        'bca_klikbca',
        'bca_klikpay',
        'bri_epay',
        'echannel',
        'permata_va',
        'bca_va',
        'bni_va',
        'other_va',
        'gopay',
        'indomaret',
        'danamon_online',
    ];

    public const PAYMENT_CODE = 'PAY';
    
    protected static function newFactory(): PaymentFactory
    {
        return PaymentFactory::new();
    }

    public static function generateCode() {
        $dateCode = self::PAYMENT_CODE . '/' . date('Y') . '/' . date('m') . '/' . date('d') . '/';

        $lastOrder = self::select([DB::raw('MAX(shop_payments.code) AS last_code ')])
                ->where('code', 'like', $dateCode . '%')
                ->first();

        $lastOrderCode = !empty($lastOrder) ? $lastOrder['last_code'] : null;

        $orderCode = $dateCode . '00001';
        if ($lastOrderCode) {
            $lastOrderNumber = str_replace($dateCode, '', $lastOrderCode);
            $nextOrderNumber = sprintf('%05d', (int)$lastOrderNumber + 1);

            $orderCode = $dateCode . $nextOrderNumber;
        }

        if (self::isCodeExists($orderCode)) {
            return self::generateCode();
        }

        return $orderCode;
    }

    private static function isCodeExists($orderCode){
        return Order::where('code', '=', $orderCode)->exists();
    }
}
