<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;
    protected $fillable = [
        'status',
        'total',
        'ship',
        'customer_id',
        'customer_email',
        'customer_phone',
        'customer_address',
        'note',
    ];
}
