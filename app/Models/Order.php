<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    protected $primaryKey = "order_id";
    protected $fillable = [
        'uuid',
        'total_amount',
        'email',
        'name',
        'surname',
        'phone',
        'status',
    ];

    public function items() : HasMany
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'order_id');
    }
}
