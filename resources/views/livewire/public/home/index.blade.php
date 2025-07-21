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
                                    <a href="{{ route('public.regulations.index') }}">
                                        <i class="fal fa-book"></i>
                                        Buku <br> Administrasi Desa
                                    </a>
                                </div>
                            </div>
                            <div class="product__item clr-8 swiper-slide">
                                <div class="box-item items-pds">
                                    <a href="{{ route('public.news.index') }}">
                                        <i class="fal fa-newspaper"></i>
                                        Berita <br> Informasi Desa
                                    </a>
                                </div>
                            </div>
                            <div class="product__item clr-6 swiper-slide">
                                <div class="box-item items-pds">
                                    <a href="{{ route('public.sdgs') }}">
                                        <i class="fal fa-analytics"></i>
                                        Status <br> SDGs
                                    </a>
                                </div>
                            </div>
                            <div class="product__item clr-7 swiper-slide">
                                <div class="box-item items-pds">
                                    <a href="{{ route('public.idm.index') }}">
                                        <i class="fal fa-chart-line"></i>
                                        IDM
                                    </a>
                                </div>
                            </div>
                            <div class="product__item clr-8 swiper-slide">
                                <div class="box-item items-pds">
                                    <a href="{{ route('public.letters.tracking') }}">
                                        <i class="fal fa-file-search"></i>
                                        Tracking <br> Surat Desa
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
                            <h5 class="st-titile">Informasi Terkini</h5>
                        </div>
                        <div class="product__nav-tab">
                            <ul class="nav nav-tabs" id="flast-sell-tab" role="tablist">
                                <!-- Tab for All Information -->
                                <li class="nav-item" role="presentation">
                                    <button
                                        class="nav-link {{ $activeTab === 'all' ? 'active' : '' }}"
                                        id="all-tab"
                                        type="button"
                                        role="tab"
                                        aria-controls="all"
                                        aria-selected="{{ $activeTab === 'all' ? 'true' : 'false' }}"
                                        wire:click="setActiveTab('all')"
                                    >
                                        Semua Informasi
                                    </button>
                                </li>

                                <!-- Tabs for Each Category -->
                                @foreach($categories as $category)
                                    <li class="nav-item" role="presentation">
                                        <button
                                            class="nav-link {{ $activeTab === $category->slug ? 'active' : '' }}"
                                            id="{{ $category->slug }}-tab"
                                            type="button"
                                            role="tab"
                                            aria-controls="{{ $category->slug }}"
                                            aria-selected="{{ $activeTab === $category->slug ? 'true' : 'false' }}"
                                            wire:click="setActiveTab('{{ $category->slug }}')"
                                        >
                                            {{ $category->nama }}
                                        </button>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="tab-content" id="flast-sell-tabContent">
                        <!-- Single Tab Pane for All Content -->
                        <div class="tab-pane fade active show" id="news-content" role="tabpanel">
                            <div class="row pt-20">
                                @forelse($news as $item)
                                <div class="col-xl-3 col-lg-6">
                                    <div class="single-smblog mb-30" data-aos="fade-up" data-aos-delay="100">
                                        <div class="smblog-thum">
                                            <div class="blog-image w-img">
                                                <a href="{{ route('public.news.detail', $item->slug) }}">
                                                    <img src="{{ $item->thumbnail ? asset('storage/images/news/' . $item->thumbnail) : asset('frontend/img/default-news.jpg') }}" alt="{{ $item->title }}">
                                                </a>
                                            </div>
                                            <div class="blog-tag blog-tag-2">
                                                <a href="#">{{ $item->category->name ?? 'Berita Desa' }}</a>
                                            </div>
                                        </div>
                                        <div class="smblog-content smblog-content-3">
                                            <h6>
                                                <a href="{{ route('public.news.detail', $item->slug) }}">
                                                    {{ Str::limit($item->title, 60) }}
                                                </a>
                                            </h6>
                                            <span class="author mb-10 mr-20">
                                                <i class="fal fa-user-tag"></i>
                                                <a href="#">{{ $item->creator->name ?? 'Admin' }}</a>
                                            </span>
                                            <div class="smblog-foot pt-15">
                                                <div class="post-readmore">
                                                    <a href="{{ route('public.news.detail', $item->slug) }}">
                                                        <i class="fal fa-book-reader mr-10"></i>
                                                        Selengkapnya
                                                        <span class="icon"></span>
                                                    </a>
                                                </div>
                                                <div class="post-date">
                                                    <a href="#">
                                                        {{ $item->created_at ? $item->created_at->format('M d, Y') : 'Jan 01, 2024' }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="col-xl-12">
                                    <div class="text-center py-5">
                                        <i class="fal fa-newspaper fa-3x text-muted mb-3"></i>
                                        <h5 class="text-muted">Tidak ada berita tersedia</h5>
                                        <p class="text-muted">Belum ada berita yang dipublikasikan untuk kategori ini.</p>
                                    </div>
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- topsell__area-end -->

    <!-- cta-area-start -->
    <section class="cta-area d-ldark-bg pt-55 pb-10">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-12">
                    <div class="cta-item cta-item-d mb-30">
                        <h5 class="cta-title">Media Sosial Kami</h5>
                        <p>Dapatkan informasi terbaru dan berita terkini dari {{ $identity->name }} melalui media sosial kami. Kami aktif di berbagai platform untuk memastikan Anda selalu terhubung dengan kami.</p>
                        <div class="cta-social">
                            <div class="social-icon">
                                <a href="{{ $identity->facebook }}#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                <a href="{{ $identity->twitter }}" class="twitter"><i class="fab fa-tiktok"></i></a>
                                <a href="{{ $identity->youtube }}" class="youtube"><i class="fab fa-youtube"></i></a>
                                <a href="{{ $identity->instagram }}" class="instagram"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- cta-area-end -->

    <!-- Loading Indicator -->
    <div wire:loading class="text-center py-3">
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
</div>

@push('script')
<script>
document.addEventListener('livewire:initialized', () => {
    // Handle tab transitions
    Livewire.on('tabChanged', function() {
        // Add fade effect during tab change
        const tabContent = document.getElementById('news-content');
        tabContent.classList.add('fade');

        setTimeout(() => {
            tabContent.classList.remove('fade');
            tabContent.classList.add('show');
        }, 150);
    });
});
</script>
@endpush
