<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Expense extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function expenseDetail()
    {
        return $this->belongsTo(ExpenseDetail::class);
    }

    public function countExpenseDetails()
    {
        return Expense::select(DB::raw('expense_detail_id, count(id) as total, sum(count) as jumlah'))
            ->groupby('expense_detail_id')
            ->orderby('expense_detail_id', 'asc')
            ->get();
    }

    public function sumExpense()
    {
        return Expense::sum('count');
    }

    public function dateExpense()
    {
        return Expense::select(DB::raw('count(*) as jumlah, expense_detail_id'))
            ->where('expense_detail_id', '<>', 1)
            ->groupby('expense_detail_id')
            ->get();
    }

    public function dailyExpense()
    {
        return Expense::select(DB::raw('sum(count) as jumlah'),  DB::raw('DATE(created_at) as tanggal'))
            ->groupby('tanggal')
            ->orderby('tanggal', 'desc')
            ->get();
    }

    public function weeklyExpense()
    {
        return Expense::select(DB::raw('sum(count) as jumlah'))
            ->groupby('created_at')
            ->whereRaw('DATE(created_at) >= ?', [date('Y-m-d', strtotime('-7 days'))])
            ->orderby('created_at', 'desc')
            ->get();
    }
}
