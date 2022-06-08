<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExpenseRequest;
use App\Models\Expense;
use App\Models\ExpenseDetail;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Expense $expense)
    {
        return view('expense.index', [
            'title' => 'Pengeluaran',
            'expenses' => $expense->all(),
            'expenseDetails' => ExpenseDetail::all(),
            'countExpenseDetails' => $expense->countExpenseDetails(),
            'sumExpense' => $expense->sumExpense()
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
    public function store(ExpenseRequest $request)
    {
        $validated = $request->validated();

        Expense::create($validated);

        return redirect('/expense')->with('success', 'Data Pengeluaran berhasil ditamabahkan!');
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
    public function edit(Expense $expense)
    {
        return view('expense.edit', [
            'expense' => $expense,
            'title' => 'Pengeluaran',
            'expenseDetails' => ExpenseDetail::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExpenseRequest $request, Expense $expense)
    {
        $validated = $request->validated();

        Expense::where('id', $expense->id)
            ->update($validated);

        return redirect('/expense')->with('updated', 'Data Pengeluaran berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        Expense::destroy($expense->id);

        return redirect('/expense')->with('deleted', 'Data Pengeluaran berhasil dihapus!');
    }
}
