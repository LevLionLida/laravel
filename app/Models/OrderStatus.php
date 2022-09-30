<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\Enums\OrderEnum;

class OrderStatus extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }


    public function scopeCompleted($query)
    {
        return $this->getOrderStatus($query, 'completed');
    }

    public function scopePaid($query)
    {
        return $this->getOrderStatus($query, 'Paid');
    }


    public function scopeCanceled($query)
    {
        return $this->getOrderStatus($query, 'Canceled');
    }

    public function scopeInProcess($query)
    {
        return $this->getOrderStatus($query);
    }

    protected function getOrderStatus($query, $status = 'InProcess')
    {
        return $query->where(
            'name',
            '=',
            OrderEnum::findByKey(ucfirst($status))->value
        );
    }
}
