<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Note extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function orderNote()
    {
        return Note::orderBy('created_at', 'desc')->paginate(3);
    }
}
