<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\IncomeDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\IncomeRequest;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Income $income)
    {
        // $sumIncome = Income::sum('count');
        // $countIncomeDetails = Income::select(DB::raw('income_detail_id, count(id) as total, sum(count) as jumlah'))
        //     ->groupby('income_detail_id')
        //     ->orderby('income_detail_id', 'asc')
        //     ->get();

        return view('income.index', [
            'title' => 'Pendapatan',
            'incomes' => $income->all(),
            'incomeDetails' => IncomeDetail::all(),
            'countIncomeDetails' => $income->countIncomeDetails(),
            'sumIncome' => $income->sumIncome()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncomeRequest $request)
    {
        $validated = $request->validated();

        Income::create($validated);

        return redirect('/income')->with('success', 'Data Pendapatan berhasil ditamabahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Income $income)
    {
        return view('income.edit', [
            'income' => $income,
            'title' => 'Pendapatan',
            'incomeDetails' => IncomeDetail::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(IncomeRequest $request, Income $income)
    {
        $validated = $request->validated();

        Income::where('id', $income->id)
            ->update($validated);

        return redirect('/income')->with('updated', 'Data Pendapatan berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Income $income)
    {
        Income::destroy($income->id);

        return redirect('/income')->with('deleted', 'Data Pendapatan berhasil dihapus!');
    }
}
