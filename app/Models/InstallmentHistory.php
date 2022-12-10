<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstallmentHistory extends Model
{
    use HasFactory;
    protected $table = 'installment_histories';
    protected $fillable = [
        'customer_name',
        'customer_order',
        'price',
        'quantity',
        'total_month',
        'total_pay',
        'balance',
        'break_pay',
        'cash_pay',
        'penalty',
        'due_date',
    ];
}
