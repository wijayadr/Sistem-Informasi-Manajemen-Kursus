<div>
    <div class="page-banner-area page-banner-height-2" data-background="{{ asset('frontend/img/banner/page-banner-3.jpg') }}" style="background-image: url(&quot;{{ asset('frontend/img/banner/page-banner-3.jpg') }}&quot;);">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-banner-content text-center">
                        <h4 class="breadcrumb-title">Informasi</h4>
                        <div class="breadcrumb-two">
                            <nav>
                                <nav class="breadcrumb-trail breadcrumbs">
                                    <ul class="breadcrumb-menu">
                                        <li class="breadcrumb-trail">
                                            <a href="{{ route('public.home') }}"><span>Home</span></a>
                                        </li>
                                        <li class="trail-item">
                                            <span>Informasi</span>
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

    <section class="topsell__area-2 pt-60 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section__head d-flex justify-content-between mb-10">
                        <div class="section__title">
                            <h5 class="st-titile">Informasi</h5>
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
                        <div class="tab-pane fade active show" role="tabpanel">
                            <div class="row pt-20">
                                @forelse($filteredNews as $newsItem)
                                    <div class="col-xl-3 col-lg-6">
                                        <div class="single-smblog mb-30" data-aos="fade-up" data-aos-delay="100">
                                            <div class="smblog-thum">
                                                <div class="blog-image w-img">
                                                    <a href="{{ route('public.news.detail', $newsItem->slug) }}">
                                                        <img src="{{ asset('storage/images/news/' . $newsItem->thumbnail) }}" alt="{{ $newsItem->judul }}">
                                                    </a>
                                                </div>
                                                <div class="blog-tag blog-tag-2">
                                                    <a href="#">{{ $newsItem->category->nama ?? 'Berita Desa' }}</a>
                                                </div>
                                            </div>
                                            <div class="smblog-content smblog-content-3">
                                                <h6>
                                                    <a href="{{ route('public.news.detail', $newsItem->slug) }}">
                                                        {{ Str::limit($newsItem->judul, 60) }}
                                                    </a>
                                                </h6>
                                                <span class="author mb-10 mr-20">
                                                    <i class="fal fa-user-tag"></i>
                                                    <a href="#"> {{ $newsItem->creator->name ?? 'Admin' }}</a>
                                                </span>
                                                {{-- <span class="author mb-10">
                                                    <i class="fal fa-eye"></i>
                                                    <a href="#">{{ $newsItem->views ?? 0 }} kali</a>
                                                </span> --}}
                                                <div class="smblog-foot pt-15">
                                                    <div class="post-readmore">
                                                        <a href="{{ route('public.news.detail', $newsItem->slug) }}">
                                                            <i class="fal fa-book-reader mr-10"></i>
                                                            Selengkapnya
                                                            <span class="icon"></span>
                                                        </a>
                                                    </div>
                                                    <div class="post-date">
                                                        <a href="#">{{ $newsItem->created_at->format('M d, Y') }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-12">
                                        <div class="text-center py-5">
                                            <h6>Tidak ada berita untuk kategori ini.</h6>
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
</div>
