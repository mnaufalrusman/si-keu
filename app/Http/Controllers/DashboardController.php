<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Expense;
use App\Models\Officer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Officer $officer, Income $income, Expense $expense)
    {
        $totalMasuk = $income->sumIncome();
        $totalKeluar = $expense->sumExpense();

        $money = $totalMasuk - $totalKeluar;

        $sumWeeklyIncome = Income::select(DB::raw('sum(count) as jumlah'),  DB::raw('DATE(created_at) as tanggal'))
            ->groupby('created_at')
            ->whereRaw('DATE(created_at) >= ?', [date('Y-m-d', strtotime('-7 days'))])
            ->orderby('created_at', 'desc')
            ->get();


        return view('dashboard', [
            'title' => 'Dashboard',
            'officer' => $officer,
            'incomes' => $income->all(),
            'sumIncome' => $income->sumIncome(),
            'dailyIncome' => $income->dailyIncome(),
            'weeklyIncome' => $income->weeklyIncome(),
            'sumWeeklyIncomes' => $sumWeeklyIncome,
            'sumExpense' => $expense->sumExpense(),
            'dailyExpense' => $expense->dailyExpense(),
            'weeklyExpense' => $expense->weeklyExpense(),
            'money' => $money,
        ]);
    }
}
