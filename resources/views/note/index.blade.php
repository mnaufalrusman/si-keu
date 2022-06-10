@extends('layouts/app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Catatan</h1>
            </div>

            <div class="section-body">
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
                    Catatan</button>

                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Catatan</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">NO</th>
                                                <th class="text-center">Catatan</th>
                                                <th class="text-center">Pengirim</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($notes as $note)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td class="">{{ $note->name }}</td>
                                                    <td class="text-center">{{ $note->author }}</td>
                                                    <td class="text-nowrap bd-highlight">
                                                        <a href="/note/{{ $note->id }}/edit" class="btn btn-warning"><i
                                                                class="fas fa-edit"></i></a>
                                                        <form action="/note/{{ $note->id }}" method="POST"
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
                </div>
            </div>
        </section>

        <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Catatan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/note" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Catatan</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" required autofocus>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="author">Pengirim</label>
                                <input type="text" class="form-control @error('author') is-invalid @enderror" id="author"
                                    name="author">
                                @error('author')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
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
