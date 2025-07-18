<div>
    <div class="page-banner-area page-banner-height-2" data-background="{{ asset('frontend/img/banner/page-banner-3.jpg') }}" style="background-image: url(&quot;{{ asset('frontend/img/banner/page-banner-3.jpg') }}&quot;);">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-banner-content text-center">
                        <h4 class="breadcrumb-title">IDM</h4>
                        <div class="breadcrumb-two">
                            <nav>
                                <nav class="breadcrumb-trail breadcrumbs">
                                    <ul class="breadcrumb-menu">
                                        <li class="breadcrumb-trail">
                                            <a href="{{ route('public.home') }}"><span>Home</span></a>
                                        </li>
                                        <li class="trail-item">
                                            <span>IDM</span>
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

    <section class="categories__area light-bg-s pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section__head d-flex justify-content-between mb-30">
                        <div class="section__title section__title-2">
                            <h5 class="st-titile">
                                <span class="main-color">IDM</span> Desa
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($idm_scores as $idm_score)
                <div class="col-xl-2 col-lg-3 col-md-4">
                    <div class="categories__item p-relative w-img mb-30">
                        <div class="categories__img b-radius-2">
                            <a href="{{ route('public.idm.detail', ['idm_score' => $idm_score->year]) }}"><img src="{{ asset('frontend/img/categorie/cat-7.jpg') }}" alt=""></a>
                        </div>
                        <div class="categories__content">
                            <h6>
                                <a href="{{ route('public.idm.detail', ['idm_score' => $idm_score->year]) }}">
                                    Tahun {{ $idm_score->year }}
                                </a>
                            </h6>
                            <p>
                                <span class="main-color">{{ $idm_score->idm_score }}</span> - {{ $idm_score->idm_status }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>

@push('style')
<style>
    .categories__img::after {
        content: "";
        position: absolute;
        inset: 0;
        background: none;
        z-index: 1;
    }
</style>
@endpush
