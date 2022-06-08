<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeDetail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function income()
    {
        return $this->hasOne(Income::class);
    }
}
