@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Data karyawan</h1>
            </div>

            <div class="section-body">

                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Karyawan</h4>
                            </div>
                            <div class="card-body">
                                <form action="/officer" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="position">Posisi</label>
                                        <input type="text" class="form-control" id="position" name="position">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Alamat</label>
                                        <input type="text" class="form-control" id="address" name="address">
                                    </div>
                                    <div class="form-group">
                                        <label for="age">Umur</label>
                                        <input type="text" class="form-control" id="age" name="age">
                                    </div>
                                    <div class="form-group">
                                        <label for="contact">Kontak</label>
                                        <input type="text" class="form-control" id="contact" name="contact">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
