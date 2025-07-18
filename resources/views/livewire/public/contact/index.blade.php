<div>
    <div class="page-banner-area page-banner-height-2" data-background="{{ asset('frontend/img/banner/page-banner-3.jpg') }}" style="background-image: url(&quot;{{ asset('frontend/img/banner/page-banner-3.jpg') }}&quot;);">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-banner-content text-center">
                        <h4 class="breadcrumb-title">Kontak Kami</h4>
                        <div class="breadcrumb-two">
                            <nav>
                                <nav class="breadcrumb-trail breadcrumbs">
                                    <ul class="breadcrumb-menu">
                                        <li class="breadcrumb-trail">
                                            <a href="{{ route('public.home') }}"><span>Home</span></a>
                                        </li>
                                        <li class="breadcrumb-trail">
                                            <a href="{{ route('public.news.index') }}"><span>Informasi</span></a>
                                        </li>
                                        <li class="trail-item">
                                            <span>Kontak Kami</span>
                                        </li>
                                    </ul>
                                </nav>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- location-area-start -->
    <div class="location-area pt-70 pb-25">
        <div class="container">
            <div class="row mb-25">
                <div class="col-xl-12">
                    <div class="abs-section-title text-center">
                        <span>INFORMASI</span>
                        <h4>
                            {{ $identity->name }}
                        </h4>
                        <p>
                            {{ $identity->description }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="location-item mb-30">
                        <div class="w-img mb-20 text-center">
                            <img src="{{ asset('storage/images/identity/' . $identity->logo) }}" alt="" style="width: 200px;">
                        </div>
                        <h6>
                            Detail Kontak
                        </h6>
                        <div class="sm-item-loc sm-item-border mb-20">
                            <div class="sml-icon mr-20">
                                <i class="fal fa-map-marker-alt"></i>
                            </div>
                            <div class="sm-content">
                                <span>Alamat</span>
                                <p>
                                    {{ $identity->address }}
                                </p>
                            </div>
                        </div>
                        <div class="sm-item-loc sm-item-border mb-20">
                            <div class="sml-icon mr-20">
                                <i class="fal fa-phone-alt"></i>
                            </div>
                            <div class="sm-content">
                                <span>Telepon</span>
                                <p><a href="tel:{{ $identity->phone }}">{{ $identity->phone }}</a></p>
                            </div>
                        </div>
                        <div class="sm-item-loc mb-20">
                            <div class="sml-icon mr-20">
                                <i class="fal fa-envelope"></i>
                            </div>
                            <div class="sm-content">
                                <span>Email</span>
                                <p><a href="mailto:{{ $identity->email }}">{{ $identity->email }}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- location-area-end -->

    <!-- cmamps-area-start -->
    <div class="cmamps-area">
        {!! $identity->google_maps !!}
    </div>
    <!-- cmamps-area-end -->

    <!-- cta-area-start -->
    <section class="cta-area d-ldark-bg pt-55 pb-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="cta-item cta-item-d mb-30">
                        <h5 class="cta-title">Ikuti Kami</h5>
                        <p>
                            Dapatkan informasi terbaru dan berita terkini dari {{ $identity->name }} melalui media sosial kami. Kami aktif di berbagai platform untuk memastikan Anda selalu terhubung dengan kami.
                        </p>
                        <div class="cta-social">
                            <div class="social-icon">
                                <a href="{{ $identity->facebook }}" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                <a href="{{ $identity->twitter }}" class="twitter"><i class="fab fa-twitter"></i></a>
                                <a href="{{ $identity->youtube }}" class="youtube"><i class="fab fa-youtube"></i></a>
                                <a href="{{ $identity->instagram }}" class="dribbble"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- cta-area-end -->
</div>
