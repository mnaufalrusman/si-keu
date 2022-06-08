<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Officer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Officer $officer, Income $income)
    {
        return view('dashboard', [
            'title' => 'Dashboard',
            'officer' => $officer,
            'sumIncome' => $income->sumIncome(),
            'dailyIncome' => $income->dailyIncome(),
            'weeklyIncome' => $income->weeklyIncome()
        ]);
    }
}
