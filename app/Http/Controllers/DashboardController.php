<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Income;
use App\Models\Officer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Officer $officer, Income $income, Expense $expense)
    {
        $totalMasuk = $income->sumIncome();
        $totalKeluar = $expense->sumExpense();

        $money = $totalMasuk - $totalKeluar;

        $cities = $income->all();

        $towns = $expense->all();
        $merged = $cities->merge($towns);


        return view('dashboard', [
            'title' => 'Dashboard',
            'officer' => $officer,
            'incomes' => $income->all(),
            'sumIncome' => $income->sumIncome(),
            'dailyIncome' => $income->dailyIncome(),
            'weeklyIncome' => $income->weeklyIncome(),
            'sumExpense' => $expense->sumExpense(),
            'dailyExpense' => $expense->dailyExpense(),
            'weeklyExpense' => $expense->weeklyExpense(),
            'money' => $money,
            'merged' => $merged
        ]);
    }
}
