<div>
    <div class="page-banner-area page-banner-height-2" data-background="{{ asset('frontend/img/banner/page-banner-3.jpg') }}" style="background-image: url(&quot;{{ asset('frontend/img/banner/page-banner-3.jpg') }}&quot;);">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-banner-content text-center">
                        <h4 class="breadcrumb-title">Surat Desa</h4>
                        <div class="breadcrumb-two">
                            <nav>
                                <nav class="breadcrumb-trail breadcrumbs">
                                    <ul class="breadcrumb-menu">
                                        <li class="breadcrumb-trail">
                                            <a href="{{ route('public.home') }}"><span>Home</span></a>
                                        </li>
                                        <li class="trail-item">
                                            <span>Surat Desa</span>
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

    <!-- Letter Types Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="fw-bold mb-3">Pilih Jenis Surat</h2>
                    <p class="text-muted">Klik pada jenis surat yang ingin Anda ajukan</p>
                </div>
            </div>

            <div class="row g-4">
                @forelse($letterTypes as $letterType)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 shadow-sm border-0 letter-card">
                        <div class="card-body p-4">
                            <div class="text-center mb-3">
                                <div class="bg-primary bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                     style="width: 80px; height: 80px;">
                                     <i class="fal fa-envelope-square text-white fa-2x"></i>
                                </div>
                            </div>

                            <h5 class="card-title text-center mb-3 fw-bold">{{ $letterType->letter_name }}</h5>
                            <p class="card-text text-muted text-center mb-4">{{ $letterType->description }}</p>

                            <div class="mb-3">
                                <h6 class="small fw-bold text-primary mb-2">
                                    <i class="fas fa-paperclip me-1"></i>
                                    Dokumen yang diperlukan:
                                </h6>
                                <ul class="list-unstyled small text-muted">
                                    @foreach($letterType->requiredDocumentTypes->take(3) as $doc)
                                    <li class="mb-1">
                                        <i class="fas fa-check text-success me-1"></i>
                                        {{ $doc->document_name }}
                                    </li>
                                    @endforeach
                                    @if($letterType->requiredDocumentTypes->count() > 3)
                                    <li class="text-primary">
                                        <i class="fas fa-plus me-1"></i>
                                        +{{ $letterType->requiredDocumentTypes->count() - 3 }} dokumen lainnya
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>

                        <div class="card-footer bg-transparent border-0 p-4 pt-0">
                            <div class="d-grid">
                                <a href="{{ route('public.letters.detail', $letterType->id) }}"
                                   class="btn btn-primary btn-lg">
                                    <i class="fas fa-arrow-right me-2"></i>
                                    Ajukan Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                        <h4 class="text-muted">Belum Ada Jenis Surat</h4>
                        <p class="text-muted">Saat ini belum ada jenis surat yang tersedia.</p>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="fw-bold mb-3">Cara Mengajukan Surat</h2>
                    <p class="text-muted">Proses pengajuan surat dalam 4 langkah mudah</p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="text-center">
                        <div class="bg-primary bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                             style="width: 80px; height: 80px;">
                            <span class="text-white fw-bold fs-3">1</span>
                        </div>
                        <h5 class="fw-bold mb-3">Pilih Jenis Surat</h5>
                        <p class="text-muted">Pilih jenis surat yang ingin Anda ajukan dari daftar yang tersedia</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="text-center">
                        <div class="bg-success bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                             style="width: 80px; height: 80px;">
                            <span class="text-white fw-bold fs-3">2</span>
                        </div>
                        <h5 class="fw-bold mb-3">Isi Formulir</h5>
                        <p class="text-muted">Lengkapi data diri dan informasi yang diperlukan dalam formulir</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="text-center">
                        <div class="bg-warning bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                             style="width: 80px; height: 80px;">
                            <span class="text-white fw-bold fs-3">3</span>
                        </div>
                        <h5 class="fw-bold mb-3">Upload Dokumen</h5>
                        <p class="text-muted">Upload dokumen persyaratan sesuai dengan jenis surat yang dipilih</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="text-center">
                        <div class="bg-info bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                             style="width: 80px; height: 80px;">
                            <span class="text-white fw-bold fs-3">4</span>
                        </div>
                        <h5 class="fw-bold mb-3">Ambil Surat</h5>
                        <p class="text-muted">Pantau status dan unduh surat setelah proses selesai</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="faq-area mt-70 mb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-faqs mb-40">
                        <div class="faq-title">
                            <h5>
                                Pertanyaan Umum
                            </h5>
                        </div>
                        <div class="faq-content mt-10">
                            <div class="accordion" id="accordionExample1">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                            Berapa lama waktu pemrosesan surat?
                                        </button>
                                        </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>Waktu pemrosesan surat adalah 1-3 hari kerja tergantung jenis surat dan kelengkapan dokumen yang diajukan.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Bagaimana cara melacak status permohonan?
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>Setelah mengajukan permohonan, Anda akan mendapat nomor tracking yang dapat digunakan untuk memantau status permohonan.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Apakah ada biaya untuk layanan ini?
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>Layanan pengajuan surat desa ini gratis. Anda hanya perlu menyediakan dokumen persyaratan yang diperlukan.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFour">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            Format dokumen apa saja yang diterima?
                                        </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>Format dokumen yang diterima adalah PDF, JPG, JPEG, PNG, dan untuk dokumen tertentu juga DOC/DOCX. Ukuran maksimal file adalah 5MB.</p>
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

@push('style')
<style>
    .letter-card {
        transition: all 0.3s ease;
        border-radius: 1rem;
        overflow: hidden;
    }

    .letter-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.15) !important;
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        border-radius: 0.5rem;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
    }

    .bg-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
    }

    .card {
        border: none;
        border-radius: 1rem;
    }

    .shadow-sm {
        box-shadow: 0 .125rem .25rem rgba(0,0,0,.075) !important;
    }

    @media (max-width: 768px) {
        .display-4 {
            font-size: 2rem;
        }

        .card-body {
            padding: 1.5rem;
        }

        .letter-card:hover {
            transform: none;
        }
    }
</style>
@endpush

@push('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    });
</script>
@endpush
