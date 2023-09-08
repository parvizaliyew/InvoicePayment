<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable=
    [
        'user_id',
        'service_id',
        'order_id'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class,'service_id');

    }
}
