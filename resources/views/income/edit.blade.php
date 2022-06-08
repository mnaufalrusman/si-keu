@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Data Pendapatan</h1>
            </div>

            <div class="section-body">

                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data : {{ $income->name }}</h4>
                            </div>
                            <div class="card-body">
                                <form action="/income/{{ $income->id }}" method="POST">
                                    @method('put')
                                    @csrf
                                    <div class="form-group">
                                        <label for="count">Jumlah</label>
                                        <input type="text" class="form-control" id="count" name="count"
                                            value="{{ old('count', $income->count) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="income_detail">Sumber</label>
                                        <select class="form-control select2" name="income_detail_id">
                                            @foreach ($incomeDetails as $incomeDetail)
                                                <option value="{{ $incomeDetail->id }}"
                                                    {{ old('income_detail_id', $income->income_detail_id) == $incomeDetail->id ? 'selected' : '' }}>
                                                    {{ $incomeDetail->name }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="created_at">Tanggal</label>
                                        <input type="text" class="form-control datepicker" id="created_at" name="created_at"
                                            value="{{ old('created_at', $income->created_at) }}">
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
