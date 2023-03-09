<?php

namespace App\Models\Contas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $connection = 'contas';
    protected $table = 'orders';
    protected $primaryKey = 'ord_id';
    protected $fillable = [
        'ord_cst_id',
        'ord_prd_id',
        'ord_price',
        'ord_discount',
        'ord_total_payment',
        'ord_method_payment',
        'ord_payload',
        'ord_status',
        'ord_integrated',
        'ord_data_integration'
    ];
    protected $casts = [
        'ord_price' => 'float',
        'ord_discount' => 'float',
        'ord_total_payment' => 'float',
        'ord_payload' => 'json',
        'ord_data_integration' => 'json',
    ];

    public function customer()
    {
        return $this->hasOne(Customer::class, 'cst_id', 'ord_cst_id');
    }
    
    public function product() {
        return $this->hasOne(Product::class, 'prd_id', 'ord_prd_id');
    }

}
