<div>
    <div class="page-banner-area page-banner-height-2" data-background="{{ asset('frontend/img/banner/page-banner-3.jpg') }}" style="background-image: url(&quot;{{ asset('frontend/img/banner/page-banner-3.jpg') }}&quot;);">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-banner-content text-center">
                        <h4 class="breadcrumb-title">Regulasi & Peraturan</h4>
                        <div class="breadcrumb-two">
                            <nav>
                                <nav class="breadcrumb-trail breadcrumbs">
                                    <ul class="breadcrumb-menu">
                                        <li class="breadcrumb-trail">
                                            <a href="{{ route('public.home') }}"><span>Home</span></a>
                                        </li>
                                        <li class="trail-item">
                                            <span>Regulasi & Peraturan</span>
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

    <!-- Main Content -->
    <section class="regulations-section py-5">
        <div class="container">
            <div class="row">
                <!-- Sidebar Filter -->
                <div class="col-lg-3 col-md-4 mb-4">
                    <div class="filter-sidebar">
                        <!-- Search Filter -->
                        <div class="filter-widget mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <i class="bi bi-search me-2"></i>Pencarian
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="search-box">
                                        <input type="text"
                                               class="form-control"
                                               placeholder="Cari regulasi..."
                                               wire:model.live.debounce.300ms="searchTerm">
                                        <div class="search-icon">
                                            <i class="bi bi-search"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Category Filter -->
                        <div class="filter-widget mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <i class="bi bi-tags me-2"></i>Kategori
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="category-list">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input"
                                                   type="radio"
                                                   name="categoryFilter"
                                                   id="allCategories"
                                                   wire:click="selectCategory()"
                                                   {{ is_null($selectedCategory) ? 'checked' : '' }}>
                                            <label class="form-check-label d-flex justify-content-between align-items-center" for="allCategories">
                                                <span>Semua Kategori</span>
                                                <span class="badge bg-primary rounded-pill">{{ $regulations->total() }}</span>
                                            </label>
                                        </div>
                                        @foreach($categories as $category)
                                        <div class="form-check mb-2">
                                            <input class="form-check-input"
                                                   type="radio"
                                                   name="categoryFilter"
                                                   id="category{{ $category->id }}"
                                                   wire:click="selectCategory({{ $category->id }})"
                                                   {{ $selectedCategory == $category->id ? 'checked' : '' }}>
                                            <label class="form-check-label d-flex justify-content-between align-items-center" for="category{{ $category->id }}">
                                                <span>{{ $category->name }}</span>
                                                <span class="badge bg-secondary rounded-pill">{{ $category->regulations_count }}</span>
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Clear Filters -->
                        @if($selectedCategory || $searchTerm)
                        <div class="filter-widget">
                            <button class="btn btn-outline-secondary w-100" wire:click="clearFilters">
                                <i class="bi bi-arrow-clockwise me-2"></i>Reset Filter
                            </button>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Main Content Area -->
                <div class="col-lg-9 col-md-8">
                    <!-- Header -->
                    <div class="content-header mb-4">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <h2 class="section-title mb-0">
                                    Regulasi & Peraturan
                                    @if($selectedCategoryName)
                                        <small class="text-muted">- {{ $selectedCategoryName }}</small>
                                    @endif
                                </h2>
                                <p class="text-muted mb-0">
                                    Menampilkan {{ $regulations->count() }} dari {{ $regulations->total() }} regulasi
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Loading Indicator -->
                    <div wire:loading class="text-center py-4">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2 text-muted">Memuat data...</p>
                    </div>

                    <!-- Regulations Grid -->
                    <div wire:loading.remove>
                        @if($regulations->count() > 0)
                        <div class="row">
                            @foreach($regulations as $regulation)
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="regulation-card card h-100 shadow-sm">
                                    <div class="card-header bg-primary text-white">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="badge bg-light text-primary">
                                                {{ $regulation->category->name }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title">{{ $regulation->title }}</h5>
                                        <p class="card-text flex-grow-1">
                                            {{ Str::limit($regulation->description, 120) }}
                                        </p>
                                        <div class="regulation-meta mb-3">
                                            <small class="text-muted">
                                                <i class="bi bi-calendar-event me-1"></i>
                                                {{ $regulation->created_at->format('d M Y') }}
                                            </small>
                                        </div>
                                        <div class="card-actions d-flex gap-2">
                                            @if ($regulation->document_type === 'file')
                                                <a href="{{ asset('storage/files/regulations/' . $regulation->document_value) }}" class="btn btn-outline-info btn-sm flex-fill">
                                                    <i class="fal fa-download"></i> Download
                                                </a>
                                            @elseif ($regulation->document_type === 'url')
                                                <a href="{{ $regulation->document_value }}" class="btn btn-outline-info btn-sm flex-fill">
                                                    <i class="fal fa-eye"></i> Lihat Detail
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-center mt-4">
                            {{ $regulations->links() }}
                        </div>
                        @else
                        <!-- Empty State -->
                        <div class="empty-state text-center py-5">
                            <div class="empty-icon mb-3">
                                <i class="bi bi-file-earmark-text" style="font-size: 4rem; color: #dee2e6;"></i>
                            </div>
                            <h4 class="text-muted">Tidak Ada Regulasi Ditemukan</h4>
                            <p class="text-muted">
                                @if($searchTerm || $selectedCategory)
                                    Coba ubah filter pencarian atau pilih kategori lain.
                                @else
                                    Belum ada regulasi yang tersedia saat ini.
                                @endif
                            </p>
                            @if($searchTerm || $selectedCategory)
                            <button class="btn btn-primary" wire:click="clearFilters">
                                <i class="bi bi-arrow-clockwise me-2"></i>Reset Filter
                            </button>
                            @endif
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@push('style')
    <style>
        .filter-sidebar .card {
            border: 1px solid #e3e6f0;
            border-radius: 0.5rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        }

        .filter-sidebar .card-header {
            background: #f8f9fc;
            border-bottom: 1px solid #e3e6f0;
            font-weight: 600;
        }

        .search-box {
            position: relative;
        }

        .search-box .form-control {
            padding-right: 40px;
            border: 1px solid #d1d3e2;
            border-radius: 0.35rem;
        }

        .search-box .search-icon {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #858796;
        }

        .form-check-label {
            cursor: pointer;
            width: 100%;
            font-size: 0.9rem;
        }

        .form-check-input:checked {
            background-color: #5a5c69;
            border-color: #5a5c69;
        }

        .regulation-card {
            transition: all 0.3s ease;
            border: 1px solid #e3e6f0;
        }

        .regulation-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 2rem 0 rgba(58, 59, 69, 0.2) !important;
        }

        .regulation-card .card-header {
            border-bottom: none;
            border-radius: 0.35rem 0.35rem 0 0;
        }

        .regulation-card .card-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #5a5c69;
            line-height: 1.4;
        }

        .regulation-card .card-text {
            color: #858796;
            font-size: 0.9rem;
            line-height: 1.5;
        }

        .regulation-meta {
            border-top: 1px solid #e3e6f0;
            padding-top: 0.75rem;
        }

        .section-title {
            color: #5a5c69;
            font-weight: 700;
        }

        .view-options .btn {
            border-color: #d1d3e2;
            color: #858796;
        }

        .view-options .btn.active,
        .view-options .btn:hover {
            background-color: #5a5c69;
            border-color: #5a5c69;
            color: white;
        }

        .empty-state {
            min-height: 400px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .btn-primary {
            background-color: #5a5c69;
            border-color: #5a5c69;
        }

        .btn-primary:hover {
            background-color: #484e5a;
            border-color: #484e5a;
        }

        .badge.bg-primary {
            background-color: #5a5c69 !important;
        }

        @media (max-width: 768px) {
            .filter-sidebar {
                margin-bottom: 2rem;
            }

            .regulation-card {
                margin-bottom: 1.5rem;
            }

            .content-header .row {
                text-align: center;
            }

            .view-options {
                margin-top: 1rem;
            }
        }
    </style>
@endpush
