@extends('layouts/app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pendapatan</h1>
            </div>

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @elseif (session()->has('deleted'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('deleted') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @elseif (session()->has('updated'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('updated') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal"><i
                    class="fa fa-plus"></i> Tambah Data
                Pendapatan</button>
            <div class="row">
                <div class="col-7">
                    <div class="card">
                        <div class="card-header">
                            <h4>Transaksi Masuk</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">NO</th>
                                            <th class="text-center">Jumlah</th>
                                            <th class="text-center">Sumber</th>
                                            <th class="text-center">Tanggal</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($incomes as $income)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">Rp.
                                                    {{ number_format($income->count, 2, ',', '.') }}</td>
                                                <td class="text-center">{{ $income->incomeDetail->name }}</td>
                                                <td class="text-center">{{ $income->created_at->format('M d Y') }}</td>
                                                <td class="text-center">
                                                    <a href="/income/{{ $income->id }}/edit" class="btn btn-warning"><i
                                                            class="fas fa-edit"></i></a>
                                                    <form action="/income/{{ $income->id }}" method="POST"
                                                        class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-danger border-0"
                                                            onclick="return confirm('Are you sure?')"><i
                                                                class="fas fa-times"></i></button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-12">
                    <div class="card">
                        <div class="mx-3 my-3 float-left">
                            <div class="">
                                <h6>Total Pendapatan</h6>
                            </div>
                            <h3>
                                <div class="float-right font-weight-bold badge badge-info">
                                    Rp. {{ number_format($sumIncome, 2, ',', '.') }}
                                </div>
                            </h3>

                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Sumber Pendapatan</h4>
                        </div>
                        {{-- <div class="card-body">
                            @foreach ($incomeDetails as $incomeDetail)
                                <div class="mb-4">
                                    <div class="text-small float-right font-weight-bold text-muted">2,100</div>
                                    <div class="btn btn-primary font-weight-bold mb-2">{{ $incomeDetail->name }}
                                        @foreach ($getIncomeDetails as $getIncomeDetail)
                                            <span class="badge badge-transparent">{{ $getIncomeDetail->total }}</span>
                                        @endforeach

                                    </div>
                                    <div class="progress" data-height="3">
                                        <div class="progress-bar" role="progressbar" data-width="80%" aria-valuenow="80"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            @endforeach

                        </div> --}}
                        <div class="card-body">
                            @foreach ($countIncomeDetails as $countIncomeDetail)
                                <div class="mb-4">
                                    <div class="float-right font-weight-bold">
                                        <h5>Rp. {{ number_format($countIncomeDetail->jumlah, 2, ',', '.') }}</h5>
                                    </div>
                                    <div class="btn btn-info font-weight-bold mb-2">
                                        {{ $countIncomeDetail->incomeDetail->name }}
                                        <span class="badge badge-transparent">{{ $countIncomeDetail->total }} Kali</span>

                                    </div>
                                    <div class="progress" data-height="6">
                                        <div class="progress-bar bg-info" role="progressbar"
                                            data-width="{{ $countIncomeDetail->total }}.%" aria-valuenow="80"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
        </section>

        <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Pendapatan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/income" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="count">Jumlah</label>
                                <input type="text" class="form-control @error('count') is-invalid @enderror" id="count"
                                    name="count" required autofocus>
                                @error('count')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="income_detail">Sumber</label>
                                <select class="form-control select2" name="income_detail_id">
                                    @foreach ($incomeDetails as $incomeDetail)
                                        <option value="{{ $incomeDetail->id }}"
                                            {{ old('income_detail_id') == $incomeDetail->id ? 'selected' : '' }}>
                                            {{ $incomeDetail->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="created_at">Tanggal</label>
                                <input type="text" class="form-control datepicker" id="created_at" name="created_at">
                            </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
