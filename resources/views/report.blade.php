@extends('layouts/app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>maintenance</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="empty-state" data-height="400">
                                    <div class="empty-state-icon bg-danger">
                                        <i class="fas fa-times"></i>
                                    </div>
                                    <h2>Halaman ini sedang dalam perbaikan</h2>
                                    <p class="lead">
                                        Saya mohon maaf halaman ini sedang dalam tahap perbaikan, jika ingin bicara dengan
                                        saya bisa klik tombol dibawah :)
                                    </p>
                                    <a href="https://api.whatsapp.com/send?phone=6285971637720"
                                        class="btn btn-warning mt-4">Hubungi Naufal</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
