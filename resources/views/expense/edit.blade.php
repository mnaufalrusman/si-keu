@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Data Pengeluaran</h1>
            </div>

            <div class="section-body">

                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data : {{ $expense->name }}</h4>
                            </div>
                            <div class="card-body">
                                <form action="/expense/{{ $expense->id }}" method="POST">
                                    @method('put')
                                    @csrf
                                    <div class="form-group">
                                        <label for="count">Jumlah</label>
                                        <input type="text" class="form-control" id="count" name="count"
                                            value="{{ old('count', $expense->count) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="expense_detail_id">Sumber</label>
                                        <select class="form-control select2" name="expense_detail_id">
                                            @foreach ($expenseDetails as $expenseDetail)
                                                <option value="{{ $expenseDetail->id }}"
                                                    {{ old('expense_detail_id', $expense->expense_detail_id) == $expenseDetail->id ? 'selected' : '' }}>
                                                    {{ $expenseDetail->name }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="created_at">Tanggal</label>
                                        <input type="text" class="form-control datepicker" id="created_at" name="created_at"
                                            value="{{ old('created_at', $expense->created_at) }}">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
