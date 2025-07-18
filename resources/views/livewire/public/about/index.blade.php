<div>
    <div class="page-banner-area page-banner-height-2" data-background="{{ asset('frontend/img/banner/page-banner-3.jpg') }}" style="background-image: url(&quot;{{ asset('frontend/img/banner/page-banner-3.jpg') }}&quot;);">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-banner-content text-center">
                        <h4 class="breadcrumb-title">Profil Desa</h4>
                        <div class="breadcrumb-two">
                            <nav>
                                <nav class="breadcrumb-trail breadcrumbs">
                                    <ul class="breadcrumb-menu">
                                        <li class="breadcrumb-trail">
                                        <a href="{{ route('public.home') }}"><span>Home</span></a>
                                        </li>
                                        <li class="trail-item">
                                            <span>Profil Desa</span>
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
    <div class="technolgy-index mt-70 mb-70">
        <div class="container">
            <div class="row mb-15">
                <div class="col-xl-12">
                    <div class="abs-section-title text-center">
                        <span>
                            {{ $identity->name }}
                        </span>
                        <h4>
                            Visi dan Misi Desa
                        </h4>
                        <h6>
                            Visi
                        </h6>
                        <p>
                            {!! $identity->vision !!}
                        </p>
                        <h6>
                            Misi
                        </h6>
                        <p>
                            {!! $identity->mission !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
