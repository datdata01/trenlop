<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'orders_dentail';
    protected $primaryKey = 'order_dentail_id';
    public $timestamps = true;

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];
}
