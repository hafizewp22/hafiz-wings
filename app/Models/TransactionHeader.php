<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHeader extends Model
{
    use HasFactory;

    protected $table = 'transaction_headers';

    protected $fillable = [
        'document_code',
        'document_number',
        'user_id',
        'user',
        'total',
        'date',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
