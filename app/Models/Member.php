<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nip',
        'gender',
    ];

    public function savings() {
        return $this->hasMany(Saving::class, 'member', 'id');
    }

    public function loans() {
        return $this->hasMany(Loan::class, 'member', 'id');
    }

    public function installments() {
        return $this->hasMany(Installment::class, 'member', 'id');
    }
}
