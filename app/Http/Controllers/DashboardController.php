<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Income;
use App\Models\Expense;
use App\Models\Officer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Officer $officer, Income $income, Expense $expense, Note $note)
    {
        $totalMasuk = $income->sumIncome();
        $totalKeluar = $expense->sumExpense();

        $money = $totalMasuk - $totalKeluar;


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
            'note' => $note,
            'orderNotes' => $note->orderNote(),
        ]);
    }
}
