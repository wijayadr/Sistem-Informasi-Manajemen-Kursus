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
                                        <li><a href="{{ route('public.letters.index') }}">Surat Desa</a></li>
                                        <li><a href="{{ route('public.statistics') }}">Statistik</a></li>
                                        <li><a href="{{ route('public.sdgs') }}">SDGs</a></li>
                                        <li><a href="{{ route('public.idm.index') }}">IDM</a></li>
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
                        <div class="col-xl-3 col-lg-6 col-md-4 col-sm-4">
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
                        <div class="col-xl-7 col-lg-4 d-none d-lg-block">
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-8 col-sm-8">
                            <div class="header-action">
                                <div class="block-userlink">
                                    <a class="icon-link" href="{{ route('admin.login') }}" type="button">
                                        <i class="fal fa-user-lock"></i>
                                        <span class="text">
                                            <span class="sub"> Login</span> Dashboard </span>
                                    </a>
                                </div>
                            </div>
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
                <li><a href="{{ route('public.letters.index') }}">Surat Desa</a></li>
                <li><a href="{{ route('public.statistics') }}">Statistik</a></li>
                <li><a href="{{ route('public.sdgs') }}">SDGs</a></li>
                <li><a href="{{ route('public.idm.index') }}">IDM</a></li>
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
                        <img src="{{ asset('storage/images/identity/' . $identity->logo) }}" width="200" alt="logo">
                    </a>
                </div>
                <div class="mobile-menu-2"></div>
                <div class="offcanvas__action">
                </div>
            </div>
        </div>
    </div>
</div>
