@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Data Catatan</h1>
            </div>

            <div class="section-body">

                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data : {{ $note->name }}</h4>
                            </div>
                            <div class="card-body">
                                <form action="/note/{{ $note->id }}" method="POST">
                                    @method('put')
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ old('name', $note->name) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="author">Pengirim</label>
                                        <input type="text" class="form-control" id="author" name="author"
                                            value="{{ old('author', $note->author) }}">
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
