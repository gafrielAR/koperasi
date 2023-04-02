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
        'number_of_loan',
        'ammount',
    ];

    // protected $dates = 'date';

    public function Loan() {
        return $this->belongsTo(Loan::class, 'number_of_loan', 'id');
    }
}
