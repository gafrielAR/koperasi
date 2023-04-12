<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_number',
        'date',
        'loan_id',
        'ammount',
    ];

    // protected $dates = 'date';

    public function loan() {
        return $this->belongsTo(Loan::class, 'loan_id', 'id');
    }
}
