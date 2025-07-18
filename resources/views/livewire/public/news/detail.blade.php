<div>
    <div class="page-banner-area page-banner-height-2" data-background="{{ asset('frontend/img/banner/page-banner-3.jpg') }}" style="background-image: url(&quot;{{ asset('frontend/img/banner/page-banner-3.jpg') }}&quot;);">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-banner-content text-center">
                        <h4 class="breadcrumb-title">Detail Informasi</h4>
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
                                            <span>Detail Informasi</span>
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

    <!-- news-detalis-area-start -->
    <div class="news-detalis-area mt-120 mb-70">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="news-detalis-content mb-50">
                        <h4 class="news-title mb-20">{{ $news->judul }}</h4>
                        <ul class="blog-meta mb-20">
                            <li><a href="javascript:void(0)"><i class="fal fa-tag"></i>{{ $news->category->nama ?? 'Informasi Desa' }}</a></li>
                            <li><a href="javascript:void(0)"><i class="fal fa-calendar-alt"></i>{{ $news->created_at->format('d M Y') }}</a></li>
                            <li><a href="javascript:void(0)"><i class="fal fa-user"></i>{{ $news->creator->name ?? 'Admin' }}</a></li>
                            {{-- <li><a href="javascript:void(0)"><i class="fal fa-eye"></i>{{ $news->views ?? 0 }} kali dilihat</a></li> --}}
                        </ul>

                        @if($news->thumbnail)
                        <div class="news-thumb mt-40">
                            <img src="{{ asset('storage/images/news/' . $news->thumbnail) }}" alt="{{ $news->judul }}" class="img-fluid">
                        </div>
                        @endif

                        <div class="news-content mt-25 mb-50">
                            {!! $news->isi !!}
                        </div>

                        @if($otherNews->count() > 0)
                        <div class="news-navigation pt-50 pb-40">
                            @if($otherNews->count() >= 2)
                            <div class="changes-info">
                                <span><a href="{{ route('public.news.detail', $otherNews->first()->slug) }}">Informasi Lainnya</a></span>
                                <h6 class="changes-info-title">
                                    <a href="{{ route('public.news.detail', $otherNews->first()->slug) }}">
                                        {{ Str::limit($otherNews->first()->judul, 30) }}
                                    </a>
                                </h6>
                            </div>
                            @endif

                            @if($otherNews->count() >= 2)
                            <div class="changes-info text-md-right">
                                <span><a href="{{ route('public.news.detail', $otherNews->get(1)->slug) }}">Informasi Lainnya</a></span>
                                <h6 class="changes-info-title">
                                    <a href="{{ route('public.news.detail', $otherNews->get(1)->slug) }}">
                                        {{ Str::limit($otherNews->get(1)->judul, 30) }}
                                    </a>
                                </h6>
                            </div>
                            @endif
                        </div>
                        @endif
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4">
                    <div class="news-sidebar pl-10">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="widget">
                                    <h6 class="sidebar-title">Informasi Terbaru</h6>
                                    <div class="n-sidebar-feed">
                                        <ul>
                                            @forelse($otherNews as $item)
                                            <li>
                                                <div class="feed-number">
                                                    <a href="{{ route('public.news.detail', $item->slug) }}">
                                                        @if($item->thumbnail)
                                                        <img src="{{ asset('storage/images/news/' . $item->thumbnail) }}" alt="{{ $item->judul }}">
                                                        @else
                                                        <img src="{{ asset('frontend/img/blog/sm-b-1.jpg') }}" alt="{{ $item->judul }}">
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="feed-content">
                                                    <h6>
                                                        <a href="{{ route('public.news.detail', $item->slug) }}">
                                                            {{ Str::limit($item->judul, 50) }}
                                                        </a>
                                                    </h6>
                                                    <span class="feed-date">
                                                        <i class="fal fa-calendar-alt"></i> {{ $item->created_at->format('d M Y') }}
                                                    </span>
                                                </div>
                                            </li>
                                            @empty
                                            <li>
                                                <div class="feed-content">
                                                    <p>Tidak ada berita lainnya.</p>
                                                </div>
                                            </li>
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- news-detalis-area-end  -->
</div>
