@php
    $identity = \App\Models\Master\Identity::first();
@endphp

<div>
    <!-- header-start -->
    <header class="header d-blue-bg">
        <div class="header-top">
            <div class="container">
                <div class="header-inner">
                    <div class="row align-items-center">
                        <div class="col-xl-12 d-none d-lg-block">
                            <div class="header-inner-start">
                                <div class="ovic-menu-wrapper">
                                    <ul>
                                        <li><a href="{{ route('public.home') }}">Home</a></li>
                                        <li><a href="{{ route('public.about') }}">Profil Desa</a></li>
                                        <li><a href="{{ route('public.news.index') }}">Berita Desa</a></li>
                                        <li><a href="berita.html">Infografis</a></li>
                                        <li><a href="berita.html">IDM</a></li>
                                        <li><a href="{{ route('public.contact') }}">Kontak</a></li>
                                        {{-- <li><a href="galeri.html">Galeri</a></li>
                                        <li><a href="bumndes.html">BUMDes</a></li>
                                        <li><a href="tppkk.html">TP-PKK</a></li>
                                        <li><a href="kppdes.html">Kopdes Merah Putih</a></li>
                                        <li><a href="bpd.html">Badan Permusyawaratan Desa</a></li>
                                        <li><a href="peta-sebaran.html">Peta Sebaran</a></li> --}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-mid">
            <div class="container">
                <div class="heade-mid-inner">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-6 col-lg-3 col-md-4 col-sm-4">
                            <div class="header__info header__info-2">
                                <div class="logo d-flex align-items-center">
                                    <a href="{{ route('public.home') }}" class="logo-image mr-20"><img src="{{ asset('storage/images/identity/' . $identity->logo) }}" width="70" alt="logo"></a>
                                    <div class="teks-logo mr-20">
                                        <span class="text-white">
                                            {{ $identity->name }}
                                        </span>
                                    </div>
                                </div>
                                <div class="side-menu mr-20">
                                    <button type="button" class="side-menu-btn offcanvas-toggle-btn"><i
                                            class="fas fa-bars"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-4 d-none d-lg-block">
                            <div class="header__search">
                                <form action="#">
                                    <div class="header__search-box">
                                        <input class="search-input search-input-2" type="text"
                                            placeholder="Temukan yang anda cari...">
                                        <button class="button" type="submit"><i class="far fa-search"></i></button>
                                    </div>
                                    <div class="header__search-cat">
                                        <select>
                                            <option>Semua Menu</option>
                                            <option>Profil Desa</option>
                                            <option>Berita Desa</option>
                                            <option>Galeri</option>
                                            <option>BUMDes</option>
                                            <option>TP-PKK</option>
                                            <option>Kopdes Merah Putih</option>
                                            <option>Badan Permusyawaratan Desa</option>
                                            <option>Peta Sebaran</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-md-8 col-sm-8">
                            <div class="header-action">
                                <div class="block-userlink">
                                    <a class="icon-link" href="{{ route('admin.login') }}" type="button">
                                        <i class="fal fa-user-lock"></i>
                                        <span class="text">
                                            <span class="sub"> Login</span> Dashboard </span>
                                    </a>
                                </div>
                                <div class="block-wishlist action">
                                    <a class="icon-link" href="#">
                                        <i class="fal fa-globe-asia"></i>
                                        <span class="text">
                                            <span class="sub">Pengunjung</span>
                                            Website </span>
                                    </a>
                                </div>
                                <div class="block-userlink">
                                    <a class="icon-link" href="#" type="button" data-bs-toggle="modal"
                                        data-bs-target="#infoId">
                                        <i class="fal fa-bell-exclamation"></i>
                                        <span class="text">
                                            <span class="sub">Info:</span>
                                            Di Kantor </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header__bottom d-none d-lg-block">
            <div class="container">
                <div class="row">

                    <div class="col-3">
                        <div class="features__item d-flex ">
                            <div class="features__icon mr-20">
                                <i class="fal fa-kaaba"></i>
                            </div>
                            <div class="features__content">
                                <h6>Jadwal Sholat</h6>
                                <p>Hari Ini : 31 Desember 2025</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-9">
                        <div class="product-bs-slider">
                            <div class="product-slider2 swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="features__item d-flex  swiper-slide">
                                        <div class="features__icon mr-20">
                                            <i class="fal fa-cloud-rain"></i>
                                        </div>
                                        <div class="features__content">
                                            <h6>Imsak</h6>
                                            <p>04:56</p>
                                        </div>
                                    </div>
                                    <div class="features__item d-flex  swiper-slide">
                                        <div class="features__icon mr-20">
                                            <i class="fal fa-cloud-sun"></i>
                                        </div>
                                        <div class="features__content">
                                            <h6>Terbit</h6>
                                            <p>04:56</p>
                                        </div>
                                    </div>
                                    <div class="features__item d-flex  swiper-slide">
                                        <div class="features__icon mr-20">
                                            <i class="fal fa-cloud-meatball"></i>
                                        </div>
                                        <div class="features__content">
                                            <h6>Subuh</h6>
                                            <p>04:56</p>
                                        </div>
                                    </div>
                                    <div class="features__item d-flex  swiper-slide">
                                        <div class="features__icon mr-20">
                                            <i class="fal fa-eclipse-alt"></i>
                                        </div>
                                        <div class="features__content">
                                            <h6>Dzuhur</h6>
                                            <p>04:56</p>
                                        </div>
                                    </div>
                                    <div class="features__item d-flex  swiper-slide">
                                        <div class="features__icon mr-20">
                                            <i class="fal fa-sun-cloud"></i>
                                        </div>
                                        <div class="features__content">
                                            <h6>Ashar</h6>
                                            <p>04:56</p>
                                        </div>
                                    </div>
                                    <div class="features__item d-flex  swiper-slide">
                                        <div class="features__icon mr-20">
                                            <i class="fal fa-sun-haze"></i>
                                        </div>
                                        <div class="features__content">
                                            <h6>Maghrib</h6>
                                            <p>04:56</p>
                                        </div>
                                    </div>
                                    <div class="features__item d-flex  swiper-slide">
                                        <div class="features__icon mr-20">
                                            <i class="fal fa-cloud-moon"></i>
                                        </div>
                                        <div class="features__content">
                                            <h6>Isya</h6>
                                            <p>04:56</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="bs-button bs-button-prev2"><i class="fal fa-chevron-left"></i></div>
                            <div class="bs-button bs-button-next2"><i class="fal fa-chevron-right"></i></div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </header>
    <!-- header-end -->

    <div class="main-menu">
        <nav id="mobile-menu-2">
            <ul>
                <li><a href="{{ route('public.home') }}">Home</a></li>
                <li><a href="{{ route('public.about') }}">Profil Desa</a></li>
                <li><a href="{{ route('public.news.index') }}">Berita Desa</a></li>
                <li><a href="berita.html">Infografis</a></li>
                <li><a href="berita.html">IDM</a></li>
                <li><a href="{{ route('public.contact') }}">Kontak</a></li>
            </ul>
        </nav>
    </div>

    <!-- offcanvas area start -->
    <div class="offcanvas__area">
        <div class="offcanvas__wrapper">
            <div class="offcanvas__close">
                <button class="offcanvas__close-btn" id="offcanvas__close-btn">
                    <i class="fal fa-times"></i>
                </button>
            </div>
            <div class="offcanvas__content">
                <div class="offcanvas__logo mb-40">
                    <a href="{{ route('public.home') }}">
                        <img src="assets/img/Logo_pemkab_oi.png" width="200" alt="logo">
                    </a>
                </div>
                <div class="offcanvas__search mb-25">
                    <form action="#">
                        <input type="text" placeholder="Temukan yang anda cari ...">
                        <button type="submit"><i class="far fa-search"></i></button>
                    </form>
                </div>
                <div class="mobile-menu-2"></div>
                <div class="offcanvas__action">
                </div>
            </div>
        </div>
    </div>
</div>
