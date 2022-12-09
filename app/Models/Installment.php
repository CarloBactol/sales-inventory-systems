<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    use HasFactory;
    protected $table = 'installments';
    protected $fillable = ['customer_name', 'penalty', 'status', 'customer_order', 'price', 'quantity', 'total_pay', 'cash_pay', 'balance'];
}
