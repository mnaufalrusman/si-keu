@extends('layouts/app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Profil</h1>
            </div>

            <div class="section-body">
                <h2 class="section-title">Profil</h2>
                <p class="section-lead">Mari mengenal saya lebih dekat :)</p>

                <div class="row">
                    <div class="col-12 col-sm-12 col-lg-7">
                        <div class="card author-box card-primary">
                            <div class="card-body">
                                <div class="author-box-left">
                                    <img alt="image" src="{{ asset('images/profile.png') }}"
                                        class="rounded-circle author-box-picture">
                                    <div class="clearfix"></div>
                                    <a href="https://api.whatsapp.com/send?phone=6285971637720"
                                        class="btn btn-primary mt-3">WA Naufal</a>
                                </div>
                                <div class="author-box-details">
                                    <div class="author-box-name">
                                        <a href="#">Muhammad Naufal Rusman</a>
                                    </div>
                                    <div class="author-box-job">Junior Full-Stack Developer</div>
                                    <div class="author-box-description">
                                        <p class="text-justify">Saya tinggal di Banjarmasin, saya mempunyai cukup
                                            pengalaman dibidang Backend,
                                            Frontend dan UI design.</p>
                                        <p>Saya mampu membangun website hingga ke tahap
                                            deployment,
                                            bahasa yang saya gunakan adalah bahasa PHP dan terbiasa menggunakan framework
                                            Laravel.</p>
                                        <p>Saya mampu membangun aplikasi mobile sampai ketahap bundle-release dan
                                            apk-release hingga siap di upload ke playstore, framework yg saya gunakan adalah
                                            flutter.</p>
                                        <p>Saya juga pandai dalam bidang UI design dan graphic design.</p>
                                    </div>
                                    <div class="mb-2 mt-3">
                                        <div class="text-small font-weight-bold">Follow Naufal di</div>
                                    </div>
                                    <a href="https://github.com/mnaufalrusman" class="btn btn-social-icon mr-1 btn-github">
                                        <i class="fab fa-github"></i>
                                    </a>
                                    <a href="https://www.instagram.com/naufal.e__"
                                        class="btn btn-social-icon mr-1 btn-instagram">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                    <div class="w-100 d-sm-none"></div>
                                    <div class="float-right mt-sm-0 mt-3">
                                        <a href="https://naufalrusman.com" class="btn">Lihat Portfolio Saya <i
                                                class="fas fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
