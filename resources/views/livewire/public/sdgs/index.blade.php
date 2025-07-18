<div>
    <div class="page-banner-area page-banner-height-2" data-background="{{ asset('frontend/img/banner/page-banner-3.jpg') }}" style="background-image: url(&quot;{{ asset('frontend/img/banner/page-banner-3.jpg') }}&quot;);">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-banner-content text-center">
                        <h4 class="breadcrumb-title">SDGs</h4>
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
                                            <span>SDGs</span>
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

    <section class="banner__area pt-20 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="banner__item p-relative mb-30 w-img">
                        <div class="banner__img">
                            <a href="javascript:void(0);"><img src="{{ asset('frontend/img/banner/page-banner-5.jpg') }}" alt=""></a>
                        </div>
                        <div class="banner__content">
                            <h6><a href="javascript:void(0);">Skor SDGs <br> {{ $identity->name }} </a></h6>
                            <p>
                                {{ number_format($average, 2) }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="featured light-bg-s pt-50 pb-40">
        <div class="container 0">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="row">
                        @foreach($goals as $goal)
                            <div class="col-md-3">
                                <div class="single-features-item b-radius-2 mb-20">
                                    <div class="row  g-0 align-items-center">
                                        <div class="col-6">
                                            <div class="features-thum">
                                                <div class="features-product-image w-img mr-10">
                                                    <a href="javascript:void(0);">
                                                        <img src="{{ $goal->image_url ?? 'https://via.placeholder.com/100' }}" alt="{{ $goal->title }}">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="product__content product__content-d product__content-d-2">
                                                <h6><a href="javascript:void(0);">{{ $goal->title }}</a></h6>
                                                <div class="price d-price">
                                                    <span>
                                                        {{ number_format($goal->progress->achievement_value, 2) }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
