<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $fillable = [
        'customer_id',
        'customer_name',
        'customer_order',
        'quantity',
        'price',
        'payment_mode',
        'penalty',
        'due_date',
        'discount',
        'status',
        'id',
    ];

    public function customer()
    {
        $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function setDueDateAttribute($value)
    {
        $this->attributes['due_date'] = Carbon::createFromFormat('m/d/Y', $value)->format("Y-m-d");
    }

    public function getDueDateAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['due_date'])->format("m/d/Y");
    }
}
