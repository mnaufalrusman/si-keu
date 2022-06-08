<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Income extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function incomeDetail()
    {
        return $this->belongsTo(IncomeDetail::class);
    }

    public function countIncomeDetails()
    {
        // Menampilkan jumlah data sesuai kategori
        // return Income::select(DB::raw('income_detail_id, sum(count) as total'))
        //     ->groupby('income_detail_id')
        //     ->orderby('income_detail_id', 'asc')
        //     ->get();

        return Income::select(DB::raw('income_detail_id, count(id) as total, sum(count) as jumlah'))
            ->groupby('income_detail_id')
            ->orderby('income_detail_id', 'asc')
            ->get();
    }

    public function sumIncome()
    {
        return Income::sum('count');
    }

    public function dateIncome()
    {
        return Income::select(DB::raw('count(*) as jumlah, income_detail_id'))
            ->where('income_detail_id', '<>', 1)
            ->groupby('income_detail_id')
            ->get();
    }

    public function dailyIncome()
    {
        return Income::select(DB::raw('sum(count) as jumlah'),  DB::raw('DATE(created_at) as tanggal'))
            ->groupby('tanggal')
            ->orderby('tanggal', 'desc')
            ->get();
    }

    public function weeklyIncome()
    {
        return Income::select(DB::raw('sum(count) as jumlah'))
            ->groupby('created_at')
            ->whereRaw('DATE(created_at) >= ?', [date('Y-m-d', strtotime('-7 days'))])
            ->orderby('created_at', 'desc')
            ->get();
    }
}
