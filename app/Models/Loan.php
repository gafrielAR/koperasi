<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'prefix',
        'date',
        'member_id',
        'loan',
        'interest',
        'term',
        'installment',
    ];

    // protected $dates = 'date';

    public function member() {
        return $this->belongsTo(Member::class);
    }

    public function installments() {
        return $this->hasMany(Installment::class, 'number_of_loan', 'id');
    }
}
