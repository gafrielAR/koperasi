<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nip',
        'gender',
    ];

    public function savings() {
        return $this->hasMany(Saving::class);
    }

    public function loans() {
        return $this->hasMany(Loan::class);
    }
}
