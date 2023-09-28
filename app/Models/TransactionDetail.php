<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $table = 'transaction_details';

    protected $fillable = [
        'document_code',
        'document_number',
        'product_id',
        'product_code',
        'price',
        'quantity',
        'unit',
        'sub_total',
        'currency',
    ];
}
