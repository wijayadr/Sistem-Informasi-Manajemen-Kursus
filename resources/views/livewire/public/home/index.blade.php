<div>
    <!-- moveing-text-area-start -->
    <section class="moveing-text-area">
        <div class="container d-flex align-items-center">
            <div class="d-flex gap-2 text-white pr-20">
                <span><i class="fa fa-megaphone"></i></span> Info
            </div>
            <div class="ovic-running">
                <div class="wrap">
                    <div class="inner">
                        <p class="item">
                            {{ $identity->display_message }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- moveing-text-area-end -->

    <!-- slider-area-start -->
    <div class="slider-area light-bg-s pt-60">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="swiper-container slider__active pb-30">
                        <div class="slider-wrapper swiper-wrapper">
                            @foreach ($sliders as $slider)
                            <div class="single-slider swiper-slide slider-height d-flex align-items-center" data-background="{{ asset('storage/images/sliders/' . $slider->image_path) }}">
                                <div class="slider-content slider-content-2">
                                    <h2 data-animation="fadeInLeft" data-delay="1.7s"
                                        class="pt-15 slider-title pb-5">
                                        {{ $slider->title }}
                                    </h2>
                                    <p class="pr-20 slider_text" data-animation="fadeInLeft" data-delay="1.9s">
                                        {{ $slider->subtitle }}
                                    </p>
                                    @if ($slider->link_url)
                                    <div class="slider-bottom-btn mt-65">
                                        <a data-animation="fadeInUp" data-delay="1.15s" href="{{ $slider->link_url }}" class="st-btn-border">Selengkapnya</a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                            <div class="main-slider-paginations"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="location-item mb-30">
                        <div class="location-image w-img mb-20">
                            {!! $identity->google_maps !!}
                        </div>
                        <h6>
                            {{ $identity->name }}
                        </h6>
                        <div class="sm-item-loc sm-item-border mb-20">
                            <div class="sml-icon mr-20">
                                <i class="fal fa-map-marker-alt"></i>
                            </div>
                            <div class="sm-content">
                                <span>Alamat:</span>
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
                                <span>Telepon :</span>
                                <p>
                                    <a href="tel:{{ $identity->phone }}">
                                        {{ $identity->phone }}
                                    </a>
                                </p>
                            </div>
                        </div>
                        <div class="sm-item-loc mb-20">
                            <div class="sml-icon mr-20">
                                <i class="fal fa-envelope"></i>
                            </div>
                            <div class="sm-content">
                                <span>Email Resmi :</span>
                                <p>
                                    <a href="mailto:{{ $identity->email }}">
                                        {{ $identity->email }}
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider-area-end -->

    <!-- features__area-start -->
    <section class="header__bottom pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="product-bs-slider">
                    <div class="product-slider swiper-container">
                        <div class="swiper-wrapper">
                            <div class="product__item clr-1 swiper-slide">
                                <div class="box-item items-pds">
                                    <a href="data-wilayah.html">
                                        <i class="fal fa-book"></i>
                                        Buku <br> Administrasi Desa
                                    </a>
                                </div>
                            </div>
                            <div class="product__item clr-8 swiper-slide">
                                <div class="box-item items-pds">
                                    <a href="berita.html">
                                        <i class="fal fa-newspaper"></i>
                                        Berita <br> Informasi Desa
                                    </a>
                                </div>
                            </div>
                            <div class="product__item clr-6 swiper-slide">
                                <div class="box-item items-pds">
                                    <a href="#">
                                        <i class="fal fa-analytics"></i>
                                        Status <br> SDGs
                                    </a>
                                </div>
                            </div>
                            <div class="product__item clr-7 swiper-slide">
                                <div class="box-item items-pds">
                                    <a href="gol-darah.html">
                                        <i class="fal fa-chart-line"></i>
                                        IDM
                                    </a>
                                </div>
                            </div>
                            <div class="product__item clr-2 swiper-slide">
                                <div class="box-item items-pds">
                                    <a href="{{ route('public.about') }}">
                                        <i class="fal fa-city"></i>
                                        Profil <br> Desa
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- If we need navigation buttons -->
                    <div class="bs-button bs-button-prev"><i class="fal fa-chevron-left"></i></div>
                    <div class="bs-button bs-button-next"><i class="fal fa-chevron-right"></i></div>
                </div>
            </div>

        </div>
    </section>
    <!-- features__area-end -->

    <!-- topsell__area-start -->
    <section class="topsell__area-2 pt-15 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section__head d-flex justify-content-between mb-10">
                        <div class="section__title">
                            <h5 class="st-titile">Artikel Terkini</h5>
                        </div>
                        <div class="product__nav-tab">
                            <ul class="nav nav-tabs" id="flast-sell-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="computer-tab" data-bs-toggle="tab"
                                        data-bs-target="#computer" type="button" role="tab" aria-controls="computer"
                                        aria-selected="false">Berita Desa</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="samsung-tab" data-bs-toggle="tab"
                                        data-bs-target="#samsung" type="button" role="tab"
                                        aria-selected="false">Usaha Warga</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="htc-tab" data-bs-toggle="tab" data-bs-target="#htc"
                                        type="button" role="tab" aria-selected="false">Kegiatan Desa</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="nokia-tab" data-bs-toggle="tab"
                                        data-bs-target="#nokia" type="button" role="tab" aria-selected="false">Olah
                                        Raga</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="cell-tab" data-bs-toggle="tab"
                                        data-bs-target="#cell" type="button" role="tab"
                                        aria-selected="true">Pengumuman</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="tab-content" id="flast-sell-tabContent">
                        <div class="tab-pane fade active show" id="computer" role="tabpanel"
                            aria-labelledby="computer-tab">
                            <div class="row pt-20">
                                <div class="col-xl-3 col-lg-6">
                                    <div class="single-smblog mb-30" data-aos="fade-up" data-aos-delay="100">
                                        <div class="smblog-thum">
                                            <div class="blog-image w-img">
                                                <a href="#"><img src="{{ asset('frontend/img/ts-img/1.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="blog-tag blog-tag-2">
                                                <a href="#">Berita Desa</a>
                                            </div>
                                        </div>
                                        <div class="smblog-content smblog-content-3">
                                            <h6><a href="detail-berita.html">Delicious Mixed Grilled Food For The
                                                    Weekend With The Family And Friends</a></h6>
                                            <span class="author mb-10 mr-20"><i class="fal fa-user-tag"></i> <a
                                                    href="#">Admin</a></span>
                                            <span class="author mb-10"><i class="fal fa-eye"></i> <a href="#">123
                                                    kali</a></span>
                                            <div class="smblog-foot pt-15">
                                                <div class="post-readmore">
                                                    <a href="detail-berita.html"><i
                                                            class="fal fa-book-reader mr-10"></i> Selengkapnya <span
                                                            class="icon"></span></a>
                                                </div>
                                                <div class="post-date">
                                                    <a href="#">Jan 24, 2022</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6">
                                    <div class="single-smblog mb-30" data-aos="fade-up" data-aos-delay="100">
                                        <div class="smblog-thum">
                                            <div class="blog-image w-img">
                                                <a href="#"><img src="{{ asset('frontend/img/ts-img/4.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="blog-tag blog-tag-2">
                                                <a href="#">Berita Desa</a>
                                            </div>
                                        </div>
                                        <div class="smblog-content smblog-content-3">
                                            <h6><a href="detail-berita.html">Delicious Mixed Grilled Food For The
                                                    Weekend With The Family And Friends</a></h6>
                                            <span class="author mb-10 mr-20"><i class="fal fa-user-tag"></i> <a
                                                    href="#">Admin</a></span>
                                            <span class="author mb-10"><i class="fal fa-eye"></i> <a href="#">123
                                                    kali</a></span>
                                            <div class="smblog-foot pt-15">
                                                <div class="post-readmore">
                                                    <a href="detail-berita.html"><i
                                                            class="fal fa-book-reader mr-10"></i> Selengkapnya <span
                                                            class="icon"></span></a>
                                                </div>
                                                <div class="post-date">
                                                    <a href="#">Jan 24, 2022</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6">
                                    <div class="single-smblog mb-30" data-aos="fade-up" data-aos-delay="100">
                                        <div class="smblog-thum">
                                            <div class="blog-image w-img">
                                                <a href="#"><img src="{{ asset('frontend/img/ts-img/3.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="blog-tag blog-tag-2">
                                                <a href="#">Berita Desa</a>
                                            </div>
                                        </div>
                                        <div class="smblog-content smblog-content-3">
                                            <h6><a href="detail-berita.html">Delicious Mixed Grilled Food For The
                                                    Weekend With The Family And Friends</a></h6>
                                            <span class="author mb-10 mr-20"><i class="fal fa-user-tag"></i> <a
                                                    href="#">Admin</a></span>
                                            <span class="author mb-10"><i class="fal fa-eye"></i> <a href="#">123
                                                    kali</a></span>
                                            <div class="smblog-foot pt-15">
                                                <div class="post-readmore">
                                                    <a href="detail-berita.html"><i
                                                            class="fal fa-book-reader mr-10"></i> Selengkapnya <span
                                                            class="icon"></span></a>
                                                </div>
                                                <div class="post-date">
                                                    <a href="#">Jan 24, 2022</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6">
                                    <div class="single-smblog mb-30" data-aos="fade-up" data-aos-delay="100">
                                        <div class="smblog-thum">
                                            <div class="blog-image w-img">
                                                <a href="#"><img src="{{ asset('frontend/img/ts-img/4.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="blog-tag blog-tag-2">
                                                <a href="#">Berita Desa</a>
                                            </div>
                                        </div>
                                        <div class="smblog-content smblog-content-3">
                                            <h6><a href="detail-berita.html">Delicious Mixed Grilled Food For The
                                                    Weekend With The Family And Friends</a></h6>
                                            <span class="author mb-10 mr-20"><i class="fal fa-user-tag"></i> <a
                                                    href="#">Admin</a></span>
                                            <span class="author mb-10"><i class="fal fa-eye"></i> <a href="#">123
                                                    kali</a></span>
                                            <div class="smblog-foot pt-15">
                                                <div class="post-readmore">
                                                    <a href="detail-berita.html"><i
                                                            class="fal fa-book-reader mr-10"></i> Selengkapnya <span
                                                            class="icon"></span></a>
                                                </div>
                                                <div class="post-date">
                                                    <a href="#">Jan 24, 2022</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6">
                                    <div class="single-smblog mb-30" data-aos="fade-up" data-aos-delay="100">
                                        <div class="smblog-thum">
                                            <div class="blog-image w-img">
                                                <a href="#"><img src="{{ asset('frontend/img/ts-img/4.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="blog-tag blog-tag-2">
                                                <a href="#">Berita Desa</a>
                                            </div>
                                        </div>
                                        <div class="smblog-content smblog-content-3">
                                            <h6><a href="detail-berita.html">Delicious Mixed Grilled Food For The
                                                    Weekend With The Family And Friends</a></h6>
                                            <span class="author mb-10 mr-20"><i class="fal fa-user-tag"></i> <a
                                                    href="#">Admin</a></span>
                                            <span class="author mb-10"><i class="fal fa-eye"></i> <a href="#">123
                                                    kali</a></span>
                                            <div class="smblog-foot pt-15">
                                                <div class="post-readmore">
                                                    <a href="detail-berita.html"><i
                                                            class="fal fa-book-reader mr-10"></i> Selengkapnya <span
                                                            class="icon"></span></a>
                                                </div>
                                                <div class="post-date">
                                                    <a href="#">Jan 24, 2022</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6">
                                    <div class="single-smblog mb-30" data-aos="fade-up" data-aos-delay="100">
                                        <div class="smblog-thum">
                                            <div class="blog-image w-img">
                                                <a href="#"><img src="{{ asset('frontend/img/ts-img/1.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="blog-tag blog-tag-2">
                                                <a href="#">Berita Desa</a>
                                            </div>
                                        </div>
                                        <div class="smblog-content smblog-content-3">
                                            <h6><a href="detail-berita.html">Delicious Mixed Grilled Food For The
                                                    Weekend With The Family And Friends</a></h6>
                                            <span class="author mb-10 mr-20"><i class="fal fa-user-tag"></i> <a
                                                    href="#">Admin</a></span>
                                            <span class="author mb-10"><i class="fal fa-eye"></i> <a href="#">123
                                                    kali</a></span>
                                            <div class="smblog-foot pt-15">
                                                <div class="post-readmore">
                                                    <a href="detail-berita.html"><i
                                                            class="fal fa-book-reader mr-10"></i> Selengkapnya <span
                                                            class="icon"></span></a>
                                                </div>
                                                <div class="post-date">
                                                    <a href="#">Jan 24, 2022</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6">
                                    <div class="single-smblog mb-30" data-aos="fade-up" data-aos-delay="100">
                                        <div class="smblog-thum">
                                            <div class="blog-image w-img">
                                                <a href="#"><img src="{{ asset('frontend/img/ts-img/4.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="blog-tag blog-tag-2">
                                                <a href="#">Berita Desa</a>
                                            </div>
                                        </div>
                                        <div class="smblog-content smblog-content-3">
                                            <h6><a href="detail-berita.html">Delicious Mixed Grilled Food For The
                                                    Weekend With The Family And Friends</a></h6>
                                            <span class="author mb-10 mr-20"><i class="fal fa-user-tag"></i> <a
                                                    href="#">Admin</a></span>
                                            <span class="author mb-10"><i class="fal fa-eye"></i> <a href="#">123
                                                    kali</a></span>
                                            <div class="smblog-foot pt-15">
                                                <div class="post-readmore">
                                                    <a href="detail-berita.html"><i
                                                            class="fal fa-book-reader mr-10"></i> Selengkapnya <span
                                                            class="icon"></span></a>
                                                </div>
                                                <div class="post-date">
                                                    <a href="#">Jan 24, 2022</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6">
                                    <div class="single-smblog mb-30" data-aos="fade-up" data-aos-delay="100">
                                        <div class="smblog-thum">
                                            <div class="blog-image w-img">
                                                <a href="#"><img src="{{ asset('frontend/img/ts-img/3.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="blog-tag blog-tag-2">
                                                <a href="#">Berita Desa</a>
                                            </div>
                                        </div>
                                        <div class="smblog-content smblog-content-3">
                                            <h6><a href="detail-berita.html">Delicious Mixed Grilled Food For The
                                                    Weekend With The Family And Friends</a></h6>
                                            <span class="author mb-10 mr-20"><i class="fal fa-user-tag"></i> <a
                                                    href="#">Admin</a></span>
                                            <span class="author mb-10"><i class="fal fa-eye"></i> <a href="#">123
                                                    kali</a></span>
                                            <div class="smblog-foot pt-15">
                                                <div class="post-readmore">
                                                    <a href="detail-berita.html"><i
                                                            class="fal fa-book-reader mr-10"></i> Selengkapnya <span
                                                            class="icon"></span></a>
                                                </div>
                                                <div class="post-date">
                                                    <a href="#">Jan 24, 2022</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="samsung" role="tabpanel" aria-labelledby="samsung-tab">
                            <div class="row pt-20">
                                <div class="col-xl-3 col-lg-6">
                                    <div class="single-smblog mb-30" data-aos="fade-up" data-aos-delay="100">
                                        <div class="smblog-thum">
                                            <div class="blog-image w-img">
                                                <a href="#"><img src="{{ asset('frontend/img/ts-img/1.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="blog-tag blog-tag-2">
                                                <a href="#">Berita Desa</a>
                                            </div>
                                        </div>
                                        <div class="smblog-content smblog-content-3">
                                            <h6><a href="detail-berita.html">Delicious Mixed Grilled Food For The
                                                    Weekend With The Family And Friends</a></h6>
                                            <span class="author mb-10 mr-20"><i class="fal fa-user-tag"></i> <a
                                                    href="#">Admin</a></span>
                                            <span class="author mb-10"><i class="fal fa-eye"></i> <a href="#">123
                                                    kali</a></span>
                                            <div class="smblog-foot pt-15">
                                                <div class="post-readmore">
                                                    <a href="detail-berita.html"><i
                                                            class="fal fa-book-reader mr-10"></i> Selengkapnya <span
                                                            class="icon"></span></a>
                                                </div>
                                                <div class="post-date">
                                                    <a href="#">Jan 24, 2022</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6">
                                    <div class="single-smblog mb-30" data-aos="fade-up" data-aos-delay="100">
                                        <div class="smblog-thum">
                                            <div class="blog-image w-img">
                                                <a href="#"><img src="{{ asset('frontend/img/ts-img/4.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="blog-tag blog-tag-2">
                                                <a href="#">Berita Desa</a>
                                            </div>
                                        </div>
                                        <div class="smblog-content smblog-content-3">
                                            <h6><a href="detail-berita.html">Delicious Mixed Grilled Food For The
                                                    Weekend With The Family And Friends</a></h6>
                                            <span class="author mb-10 mr-20"><i class="fal fa-user-tag"></i> <a
                                                    href="#">Admin</a></span>
                                            <span class="author mb-10"><i class="fal fa-eye"></i> <a href="#">123
                                                    kali</a></span>
                                            <div class="smblog-foot pt-15">
                                                <div class="post-readmore">
                                                    <a href="detail-berita.html"><i
                                                            class="fal fa-book-reader mr-10"></i> Selengkapnya <span
                                                            class="icon"></span></a>
                                                </div>
                                                <div class="post-date">
                                                    <a href="#">Jan 24, 2022</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6">
                                    <div class="single-smblog mb-30" data-aos="fade-up" data-aos-delay="100">
                                        <div class="smblog-thum">
                                            <div class="blog-image w-img">
                                                <a href="#"><img src="{{ asset('frontend/img/ts-img/3.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="blog-tag blog-tag-2">
                                                <a href="#">Berita Desa</a>
                                            </div>
                                        </div>
                                        <div class="smblog-content smblog-content-3">
                                            <h6><a href="detail-berita.html">Delicious Mixed Grilled Food For The
                                                    Weekend With The Family And Friends</a></h6>
                                            <span class="author mb-10 mr-20"><i class="fal fa-user-tag"></i> <a
                                                    href="#">Admin</a></span>
                                            <span class="author mb-10"><i class="fal fa-eye"></i> <a href="#">123
                                                    kali</a></span>
                                            <div class="smblog-foot pt-15">
                                                <div class="post-readmore">
                                                    <a href="detail-berita.html"><i
                                                            class="fal fa-book-reader mr-10"></i> Selengkapnya <span
                                                            class="icon"></span></a>
                                                </div>
                                                <div class="post-date">
                                                    <a href="#">Jan 24, 2022</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="htc" role="tabpanel" aria-labelledby="htc-tab">
                            <div class="row pt-20">
                                <div class="col-xl-3 col-lg-6">
                                    <div class="single-smblog mb-30" data-aos="fade-up" data-aos-delay="100">
                                        <div class="smblog-thum">
                                            <div class="blog-image w-img">
                                                <a href="#"><img src="{{ asset('frontend/img/ts-img/1.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="blog-tag blog-tag-2">
                                                <a href="#">Berita Desa</a>
                                            </div>
                                        </div>
                                        <div class="smblog-content smblog-content-3">
                                            <h6><a href="detail-berita.html">Delicious Mixed Grilled Food For The
                                                    Weekend With The Family And Friends</a></h6>
                                            <span class="author mb-10 mr-20"><i class="fal fa-user-tag"></i> <a
                                                    href="#">Admin</a></span>
                                            <span class="author mb-10"><i class="fal fa-eye"></i> <a href="#">123
                                                    kali</a></span>
                                            <div class="smblog-foot pt-15">
                                                <div class="post-readmore">
                                                    <a href="detail-berita.html"><i
                                                            class="fal fa-book-reader mr-10"></i> Selengkapnya <span
                                                            class="icon"></span></a>
                                                </div>
                                                <div class="post-date">
                                                    <a href="#">Jan 24, 2022</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6">
                                    <div class="single-smblog mb-30" data-aos="fade-up" data-aos-delay="100">
                                        <div class="smblog-thum">
                                            <div class="blog-image w-img">
                                                <a href="#"><img src="{{ asset('frontend/img/ts-img/3.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="blog-tag blog-tag-2">
                                                <a href="#">Berita Desa</a>
                                            </div>
                                        </div>
                                        <div class="smblog-content smblog-content-3">
                                            <h6><a href="detail-berita.html">Delicious Mixed Grilled Food For The
                                                    Weekend With The Family And Friends</a></h6>
                                            <span class="author mb-10 mr-20"><i class="fal fa-user-tag"></i> <a
                                                    href="#">Admin</a></span>
                                            <span class="author mb-10"><i class="fal fa-eye"></i> <a href="#">123
                                                    kali</a></span>
                                            <div class="smblog-foot pt-15">
                                                <div class="post-readmore">
                                                    <a href="detail-berita.html"><i
                                                            class="fal fa-book-reader mr-10"></i> Selengkapnya <span
                                                            class="icon"></span></a>
                                                </div>
                                                <div class="post-date">
                                                    <a href="#">Jan 24, 2022</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nokia" role="tabpanel" aria-labelledby="nokia-tab">
                            <div class="row pt-20">
                                <div class="col-xl-3 col-lg-6">
                                    <div class="single-smblog mb-30" data-aos="fade-up" data-aos-delay="100">
                                        <div class="smblog-thum">
                                            <div class="blog-image w-img">
                                                <a href="#"><img src="{{ asset('frontend/img/ts-img/1.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="blog-tag blog-tag-2">
                                                <a href="#">Berita Desa</a>
                                            </div>
                                        </div>
                                        <div class="smblog-content smblog-content-3">
                                            <h6><a href="detail-berita.html">Delicious Mixed Grilled Food For The
                                                    Weekend With The Family And Friends</a></h6>
                                            <span class="author mb-10 mr-20"><i class="fal fa-user-tag"></i> <a
                                                    href="#">Admin</a></span>
                                            <span class="author mb-10"><i class="fal fa-eye"></i> <a href="#">123
                                                    kali</a></span>
                                            <div class="smblog-foot pt-15">
                                                <div class="post-readmore">
                                                    <a href="detail-berita.html"><i
                                                            class="fal fa-book-reader mr-10"></i> Selengkapnya <span
                                                            class="icon"></span></a>
                                                </div>
                                                <div class="post-date">
                                                    <a href="#">Jan 24, 2022</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6">
                                    <div class="single-smblog mb-30" data-aos="fade-up" data-aos-delay="100">
                                        <div class="smblog-thum">
                                            <div class="blog-image w-img">
                                                <a href="#"><img src="{{ asset('frontend/img/ts-img/4.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="blog-tag blog-tag-2">
                                                <a href="#">Berita Desa</a>
                                            </div>
                                        </div>
                                        <div class="smblog-content smblog-content-3">
                                            <h6><a href="detail-berita.html">Delicious Mixed Grilled Food For The
                                                    Weekend With The Family And Friends</a></h6>
                                            <span class="author mb-10 mr-20"><i class="fal fa-user-tag"></i> <a
                                                    href="#">Admin</a></span>
                                            <span class="author mb-10"><i class="fal fa-eye"></i> <a href="#">123
                                                    kali</a></span>
                                            <div class="smblog-foot pt-15">
                                                <div class="post-readmore">
                                                    <a href="detail-berita.html"><i
                                                            class="fal fa-book-reader mr-10"></i> Selengkapnya <span
                                                            class="icon"></span></a>
                                                </div>
                                                <div class="post-date">
                                                    <a href="#">Jan 24, 2022</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6">
                                    <div class="single-smblog mb-30" data-aos="fade-up" data-aos-delay="100">
                                        <div class="smblog-thum">
                                            <div class="blog-image w-img">
                                                <a href="#"><img src="{{ asset('frontend/img/ts-img/3.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="blog-tag blog-tag-2">
                                                <a href="#">Berita Desa</a>
                                            </div>
                                        </div>
                                        <div class="smblog-content smblog-content-3">
                                            <h6><a href="detail-berita.html">Delicious Mixed Grilled Food For The
                                                    Weekend With The Family And Friends</a></h6>
                                            <span class="author mb-10 mr-20"><i class="fal fa-user-tag"></i> <a
                                                    href="#">Admin</a></span>
                                            <span class="author mb-10"><i class="fal fa-eye"></i> <a href="#">123
                                                    kali</a></span>
                                            <div class="smblog-foot pt-15">
                                                <div class="post-readmore">
                                                    <a href="detail-berita.html"><i
                                                            class="fal fa-book-reader mr-10"></i> Selengkapnya <span
                                                            class="icon"></span></a>
                                                </div>
                                                <div class="post-date">
                                                    <a href="#">Jan 24, 2022</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="cell" role="tabpanel" aria-labelledby="cell-tab">
                            <div class="row pt-20">
                                <div class="col-xl-3 col-lg-6">
                                    <div class="single-smblog mb-30" data-aos="fade-up" data-aos-delay="100">
                                        <div class="smblog-thum">
                                            <div class="blog-image w-img">
                                                <a href="#"><img src="{{ asset('frontend/img/ts-img/1.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="blog-tag blog-tag-2">
                                                <a href="#">Berita Desa</a>
                                            </div>
                                        </div>
                                        <div class="smblog-content smblog-content-3">
                                            <h6><a href="detail-berita.html">Delicious Mixed Grilled Food For The
                                                    Weekend With The Family And Friends</a></h6>
                                            <span class="author mb-10 mr-20"><i class="fal fa-user-tag"></i> <a
                                                    href="#">Admin</a></span>
                                            <span class="author mb-10"><i class="fal fa-eye"></i> <a href="#">123
                                                    kali</a></span>
                                            <div class="smblog-foot pt-15">
                                                <div class="post-readmore">
                                                    <a href="detail-berita.html"><i
                                                            class="fal fa-book-reader mr-10"></i> Selengkapnya <span
                                                            class="icon"></span></a>
                                                </div>
                                                <div class="post-date">
                                                    <a href="#">Jan 24, 2022</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6">
                                    <div class="single-smblog mb-30" data-aos="fade-up" data-aos-delay="100">
                                        <div class="smblog-thum">
                                            <div class="blog-image w-img">
                                                <a href="#"><img src="{{ asset('frontend/img/ts-img/3.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="blog-tag blog-tag-2">
                                                <a href="#">Berita Desa</a>
                                            </div>
                                        </div>
                                        <div class="smblog-content smblog-content-3">
                                            <h6><a href="detail-berita.html">Delicious Mixed Grilled Food For The
                                                    Weekend With The Family And Friends</a></h6>
                                            <span class="author mb-10 mr-20"><i class="fal fa-user-tag"></i> <a
                                                    href="#">Admin</a></span>
                                            <span class="author mb-10"><i class="fal fa-eye"></i> <a href="#">123
                                                    kali</a></span>
                                            <div class="smblog-foot pt-15">
                                                <div class="post-readmore">
                                                    <a href="detail-berita.html"><i
                                                            class="fal fa-book-reader mr-10"></i> Selengkapnya <span
                                                            class="icon"></span></a>
                                                </div>
                                                <div class="post-date">
                                                    <a href="#">Jan 24, 2022</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- topsell__area-end -->

    <!-- topsell__area-start -->
    <section class="topsell__area-1 pt-30 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section__head d-flex justify-content-center mb-10">
                        <div class="section__title">
                            <h5 class="st-titile">Aparatur Desa</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="product-bs-slider">
                    <div class="product-slider swiper-container">
                        <div class="swiper-wrapper">
                            <div class="categories__item p-relative w-img mb-30 swiper-slide m-2" data-aos="fade-up"
                                data-aos-delay="100">
                                <div class="categories__img b-radius-2">
                                    <a href="#">
                                        <img src="{{ asset('frontend/img/ts-img/user1.avif') }}" alt="">
                                    </a>
                                </div>
                                <div class="categories__content">
                                    <h6><a href="#">Nama Aparatur Desa</a></h6>
                                    <p>Jabatan</p>
                                    <a href="#" class="cart-btn-6 mt-20">Hadir di Kantor</a>
                                </div>
                            </div>
                            <div class="categories__item p-relative w-img mb-30 swiper-slide m-2" data-aos="fade-up"
                                data-aos-delay="100">
                                <div class="categories__img b-radius-2">
                                    <a href="#">
                                        <img src="{{ asset('frontend/img/ts-img/user2.avif') }}" alt="">
                                    </a>
                                </div>
                                <div class="categories__content">
                                    <h6><a href="#">Nama Aparatur Desa</a></h6>
                                    <p>Jabatan</p>
                                    <a href="#" class="cart-btn-5 mt-20">Tidak ada di Kantor</a>
                                </div>
                            </div>

                            <div class="categories__item p-relative w-img mb-30 swiper-slide m-2" data-aos="fade-up"
                                data-aos-delay="100">
                                <div class="categories__img b-radius-2">
                                    <a href="#">
                                        <img src="{{ asset('frontend/img/ts-img/user3.avif') }}" alt="">
                                    </a>
                                </div>
                                <div class="categories__content">
                                    <h6><a href="#">Nama Aparatur Desa</a></h6>
                                    <p>Jabatan</p>
                                    <a href="#" class="cart-btn-5 mt-20">Tidak ada di Kantor</a>
                                </div>
                            </div>

                            <div class="categories__item p-relative w-img mb-30 swiper-slide m-2" data-aos="fade-up"
                                data-aos-delay="100">
                                <div class="categories__img b-radius-2">
                                    <a href="#">
                                        <img src="{{ asset('frontend/img/ts-img/user4.avif') }}" alt="">
                                    </a>
                                </div>
                                <div class="categories__content">
                                    <h6><a href="#">Nama Aparatur Desa</a></h6>
                                    <p>Jabatan</p>
                                    <a href="#" class="cart-btn-5 mt-20">Tidak ada di Kantor</a>
                                </div>
                            </div>

                            <div class="categories__item p-relative w-img mb-30 swiper-slide m-2" data-aos="fade-up"
                                data-aos-delay="100">
                                <div class="categories__img b-radius-2">
                                    <a href="#">
                                        <img src="{{ asset('frontend/img/ts-img/user5.avif') }}" alt="">
                                    </a>
                                </div>
                                <div class="categories__content">
                                    <h6><a href="#">Nama Aparatur Desa</a></h6>
                                    <p>Jabatan</p>
                                    <a href="#" class="cart-btn-5 mt-20">Tidak ada di Kantor</a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- If we need navigation buttons -->
                    <div class="bs-button bs-button-prev"><i class="fal fa-chevron-left"></i></div>
                    <div class="bs-button bs-button-next"><i class="fal fa-chevron-right"></i></div>
                </div>
            </div>
        </div>
    </section>
    <!-- topsell__area-end -->

    <!-- recomand-product-area-start -->
    <section class="recomand-product-area pt-60">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section__head d-flex justify-content-center mb-10">
                        <div class="section__title">
                            <h5 class="st-titile">Transparasi Anggaran</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 pb-50 pt-20">
                    <div class="coupon-accordion">
                        <!-- ACCORDION START -->
                        <h3>APBDesa 2024 Pelaksanaan</h3>
                        <div class="item mb-10" data-aos="fade-up" data-aos-delay="100">
                            <h5>Pendapatan Desa</h5>
                            <div class="d-flex justify-content-between" style="margin-bottom: 0 !important;">
                                <span>Realisasi</span>
                                <span>Anggaran</span>
                            </div>
                            <div class="d-flex justify-content-between" style="margin-bottom: 0 !important;">
                                <span>Rp. 887.000.029</span>
                                <span>Rp. 1.887.000.029</span>
                            </div>
                            <div class="progress mt-3">
                                <div class="progress-bar progress-bar-gradient" role="progressbar"
                                    style="width: 0%;" id="realisasiBar">
                                    0%
                                </div>
                            </div>
                        </div>
                        <div class="item mb-10" data-aos="fade-up" data-aos-delay="100">
                            <h5>Pembiayaan Desa</h5>
                            <div class="d-flex justify-content-between" style="margin-bottom: 0 !important;">
                                <span>Realisasi</span>
                                <span>Anggaran</span>
                            </div>
                            <div class="d-flex justify-content-between" style="margin-bottom: 0 !important;">
                                <span>Rp. 887.000.029</span>
                                <span>Rp. 1.887.000.029</span>
                            </div>
                            <div class="progress mt-3">
                                <div class="progress-bar progress-bar-gradient" role="progressbar"
                                    style="width: 0%;" id="realisasiBar2">
                                    0%
                                </div>
                            </div>
                        </div>
                        <div class="item mb-10" data-aos="fade-up" data-aos-delay="100">
                            <h5>Belanja Desa</h5>
                            <div class="d-flex justify-content-between" style="margin-bottom: 0 !important;">
                                <span>Realisasi</span>
                                <span>Anggaran</span>
                            </div>
                            <div class="d-flex justify-content-between" style="margin-bottom: 0 !important;">
                                <span>Rp. 887.000.029</span>
                                <span>Rp. 1.887.000.029</span>
                            </div>
                            <div class="progress mt-3">
                                <div class="progress-bar progress-bar-gradient" role="progressbar"
                                    style="width: 0%;" id="realisasiBar3">
                                    0%
                                </div>
                            </div>
                        </div>
                        <!-- ACCORDION END -->
                    </div>
                </div>
                <div class="col-xl-4 pb-50 pt-20">
                    <div class="coupon-accordion">
                        <!-- ACCORDION START -->
                        <h3>APBDesa 2024 Pendapatan</h3>
                        <div class="item mb-10" data-aos="fade-up" data-aos-delay="100">
                            <h5>Hasil Usaha Desa</h5>
                            <div class="d-flex justify-content-between" style="margin-bottom: 0 !important;">
                                <span>Realisasi</span>
                                <span>Anggaran</span>
                            </div>
                            <div class="d-flex justify-content-between" style="margin-bottom: 0 !important;">
                                <span>Rp. 887.000.029</span>
                                <span>Rp. 1.887.000.029</span>
                            </div>
                            <div class="progress mt-3">
                                <div class="progress-bar progress-bar-gradient" role="progressbar"
                                    style="width: 0%;" id="realisasiBar4">
                                    0%
                                </div>
                            </div>
                        </div>
                        <div class="item mb-10" data-aos="fade-up" data-aos-delay="100">
                            <h5>Dana Desa</h5>
                            <div class="d-flex justify-content-between" style="margin-bottom: 0 !important;">
                                <span>Realisasi</span>
                                <span>Anggaran</span>
                            </div>
                            <div class="d-flex justify-content-between" style="margin-bottom: 0 !important;">
                                <span>Rp. 887.000.029</span>
                                <span>Rp. 1.887.000.029</span>
                            </div>
                            <div class="progress mt-3">
                                <div class="progress-bar progress-bar-gradient" role="progressbar"
                                    style="width: 0%;" id="realisasiBar5">
                                    0%
                                </div>
                            </div>
                        </div>
                        <div class="item mb-10" data-aos="fade-up" data-aos-delay="100">
                            <h5>Alokasi Dana Desa</h5>
                            <div class="d-flex justify-content-between" style="margin-bottom: 0 !important;">
                                <span>Realisasi</span>
                                <span>Anggaran</span>
                            </div>
                            <div class="d-flex justify-content-between" style="margin-bottom: 0 !important;">
                                <span>Rp. 887.000.029</span>
                                <span>Rp. 1.887.000.029</span>
                            </div>
                            <div class="progress mt-3">
                                <div class="progress-bar progress-bar-gradient" role="progressbar"
                                    style="width: 0%;" id="realisasiBar6">
                                    0%
                                </div>
                            </div>
                        </div>
                        <!-- ACCORDION END -->
                    </div>
                </div>
                <div class="col-xl-4 pb-50 pt-20">
                    <div class="coupon-accordion">
                        <!-- ACCORDION START -->
                        <h3>APBDesa 2024 Pembelanjaan</h3>
                        <div class="item mb-10" data-aos="fade-up" data-aos-delay="100">
                            <h5>Bid. Penyelenggaraan Pemerintah Desa</h5>
                            <div class="d-flex justify-content-between" style="margin-bottom: 0 !important;">
                                <span>Realisasi</span>
                                <span>Anggaran</span>
                            </div>
                            <div class="d-flex justify-content-between" style="margin-bottom: 0 !important;">
                                <span>Rp. 887.000.029</span>
                                <span>Rp. 1.887.000.029</span>
                            </div>
                            <div class="progress mt-3">
                                <div class="progress-bar progress-bar-gradient" role="progressbar"
                                    style="width: 0%;" id="realisasiBar7">
                                    0%
                                </div>
                            </div>
                        </div>
                        <div class="item mb-10" data-aos="fade-up" data-aos-delay="100">
                            <h5>Bid. Pelaksanaan Pembangunan Desa</h5>
                            <div class="d-flex justify-content-between" style="margin-bottom: 0 !important;">
                                <span>Realisasi</span>
                                <span>Anggaran</span>
                            </div>
                            <div class="d-flex justify-content-between" style="margin-bottom: 0 !important;">
                                <span>Rp. 887.000.029</span>
                                <span>Rp. 1.887.000.029</span>
                            </div>
                            <div class="progress mt-3">
                                <div class="progress-bar progress-bar-gradient" role="progressbar"
                                    style="width: 0%;" id="realisasiBar8">
                                    0%
                                </div>
                            </div>
                        </div>
                        <div class="item mb-10" data-aos="fade-up" data-aos-delay="100">
                            <h5>Bid. Pembinaan Kemasyarakatan Desa</h5>
                            <div class="d-flex justify-content-between" style="margin-bottom: 0 !important;">
                                <span>Realisasi</span>
                                <span>Anggaran</span>
                            </div>
                            <div class="d-flex justify-content-between" style="margin-bottom: 0 !important;">
                                <span>Rp. 887.000.029</span>
                                <span>Rp. 1.887.000.029</span>
                            </div>
                            <div class="progress mt-3">
                                <div class="progress-bar progress-bar-gradient" role="progressbar"
                                    style="width: 0%;" id="realisasiBar9">
                                    0%
                                </div>
                            </div>
                        </div>
                        <!-- ACCORDION END -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- recomand-product-area-end -->

    <!-- featured-start -->
    <section class="featured light-bg pt-50 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section__head d-flex justify-content-center mb-10">
                        <div class="section__title">
                            <h5 class="st-titile">Statistik Desa</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-40">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="services-item mb-30" data-aos="fade-up" data-aos-delay="100">
                        <div class="services-icon mb-25">
                            <i class="fal fa-users"></i>
                        </div>
                        <h6>Total Penduduk Desa</h6>
                        <div class="s-count-number">
                            <span class="count" data-target="809765">0</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="services-item mb-30" data-aos="fade-up" data-aos-delay="100">
                        <div class="services-icon mb-25">
                            <i class="fal fa-male"></i>
                        </div>
                        <h6>Penduduk Laki-Laki</h6>
                        <div class="s-count-number">
                            <span class="count" data-target="406755">0</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="services-item mb-30" data-aos="fade-up" data-aos-delay="100">
                        <div class="services-icon mb-25">
                            <i class="fal fa-female"></i>
                        </div>
                        <h6>Penduduk Perempuan</h6>
                        <div class="s-count-number">
                            <span class="count" data-target="403010">0</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-20">
                <div class="col-xl-6 col-lg-12">
                    <div id="pendudukChart" style="height: 525px;" data-aos="fade-up" data-aos-delay="100"></div>
                </div>
                <div class="col-xl-6 col-lg-12">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="banner__item p-relative w-img mb-30" data-aos="fade-up"
                                data-aos-delay="100">
                                <div class="banner__img">
                                    <a href="data-wilayah.html"><img src="{{ asset('frontend/img/ts-img/wilayah.jpg') }}" alt=""></a>
                                </div>
                                <a href="data-wilayah.html" type="button"
                                    class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                    Data Wilayah
                                </a>

                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="banner__item p-relative w-img mb-30" data-aos="fade-up"
                                data-aos-delay="100">
                                <div class="banner__img">
                                    <a href="pendidikan.html"><img src="{{ asset('frontend/img/ts-img/OIP.jpg') }}" alt=""></a>
                                </div>
                                <a href="pendidikan.html" type="button"
                                    class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                    Data Pendidikan
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="banner__item p-relative w-img mb-30" data-aos="fade-up"
                                data-aos-delay="100">
                                <div class="banner__img">
                                    <a href="pekerjaan.html"><img src="{{ asset('frontend/img/ts-img/pekerjaan.jpg') }}" alt=""></a>
                                </div>
                                <a href="pekerjaan.html" type="button"
                                    class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                    Data Pekerjaan
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="banner__item p-relative w-img mb-30" data-aos="fade-up"
                                data-aos-delay="100">
                                <div class="banner__img">
                                    <a href="usia.html"><img src="{{ asset('frontend/img/ts-img/usia.webp') }}" alt=""></a>
                                </div>
                                <a href="usia.html" type="button"
                                    class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                    Data Usia
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- featured-end -->
</div>
