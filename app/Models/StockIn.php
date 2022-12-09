<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockIn extends Model
{
    use HasFactory;
    protected $table = 'stock_ins';
    protected $fillable = ['name', 'quantity', 'product_id'];

    public function product()
    {
        $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
