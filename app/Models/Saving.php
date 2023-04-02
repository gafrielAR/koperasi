<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saving extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_number',
        'date',
        'member_id',
        'principal_saving',
        'mandatory_saving',
        'voluntary_saving',
    ];

    public function member() {
        return $this->belongsTo(Member::class);
    }
}
