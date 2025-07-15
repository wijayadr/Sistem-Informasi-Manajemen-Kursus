<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h5 class="card-title mb-0">Edit {{ $statistic->name }}</h5>
                        <p class="text-muted mb-0">{{ $statistic->description }}</p>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="{{ route('admin.statistics.index') }}" class="btn btn-secondary">
                            <i class="ri-arrow-left-line me-1"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="save">
                    <div class="row g-3">
                        <!-- Info Statistik -->
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>Tipe:</strong>
                                    <span class="badge bg-primary ms-2">{{ ucfirst($statistic->type) }}</span>
                                </div>
                                <div class="col-md-3">
                                    <strong>Tahun:</strong>
                                    <span class="ms-2">{{ $statistic->year ?? '-' }}</span>
                                </div>
                                <div class="col-md-3">
                                    <strong>Chart Type:</strong>
                                    <span class="badge bg-info ms-2">{{ ucfirst($statistic->chart_type) }}</span>
                                </div>
                                <div class="col-md-3">
                                    <strong>Total Data:</strong>
                                    <span class="ms-2">{{ array_sum(array_column($categories, 'value')) }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Kategori Data -->
                        <div class="col-12">
                            <h6 class="mb-3">Data Kategori</h6>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width: 40%">Kategori</th>
                                            <th style="width: 25%">Nilai</th>
                                            <th style="width: 20%">Warna</th>
                                            <th style="width: 15%">Persentase</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $index => $category)
                                            <tr>
                                                <td>
                                                    <input type="text"
                                                           class="form-control @error('categories.'.$index.'.category') is-invalid @enderror"
                                                           wire:model.live="categories.{{ $index }}.category"
                                                           placeholder="Nama kategori">
                                                    @error('categories.'.$index.'.category')
                                                        <span class="invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input type="number"
                                                           class="form-control @error('categories.'.$index.'.value') is-invalid @enderror"
                                                           wire:model.live="categories.{{ $index }}.value"
                                                           min="0" placeholder="0">
                                                    @error('categories.'.$index.'.value')
                                                        <span class="invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <input type="color"
                                                               class="form-control form-control-color me-2"
                                                               wire:model.live="categories.{{ $index }}.color"
                                                               style="width: 50px; height: 38px;">
                                                        <span class="small">{{ $categories[$index]['color'] ?? '#10B981' }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    @php
                                                        $total = array_sum(array_column($categories, 'value'));
                                                        $percentage = $total > 0 ? round(($category['value'] / $total) * 100, 2) : 0;
                                                    @endphp
                                                    <span class="badge bg-light text-dark">{{ $percentage }}%</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot class="table-light">
                                        <tr>
                                            <th>Total</th>
                                            <th>{{ array_sum(array_column($categories, 'value')) }}</th>
                                            <th>-</th>
                                            <th><span class="badge bg-success">100%</span></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        <!-- Preview Chart -->
                        <div class="col-12">
                            <h6 class="mb-3">Preview Chart</h6>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <canvas id="previewChart" width="400" height="200"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6 class="card-title mb-0">Legend</h6>
                                        </div>
                                        <div class="card-body">
                                            @foreach($categories as $category)
                                                <div class="d-flex align-items-center mb-2">
                                                    <div style="width: 20px; height: 20px; background-color: {{ $category['color'] ?? '#10B981' }}; margin-right: 10px; border-radius: 3px;"></div>
                                                    <span class="small">{{ $category['category'] }}</span>
                                                    <span class="ms-auto badge bg-light text-dark">{{ $category['value'] }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-12">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="ri-save-line me-1"></i> Perbarui Data
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('livewire:initialized', function() {
    let chart;

    function updateChart() {
        // Ambil data terbaru dari Livewire
        const categories = @this.categories;
        const chartType = '{{ $statistic->chart_type }}';

        console.log('Updating chart with categories:', categories);

        const ctx = document.getElementById('previewChart');
        if (!ctx) {
            console.error('Canvas element not found');
            return;
        }

        // Destroy existing chart
        if (chart) {
            chart.destroy();
            console.log('Previous chart destroyed');
        }

        // Filter out empty categories
        const validCategories = categories.filter(cat => cat.category && cat.value > 0);

        if (validCategories.length === 0) {
            console.log('No valid categories to display');
            return;
        }

        const labels = validCategories.map(cat => cat.category);
        const data = validCategories.map(cat => parseInt(cat.value) || 0);
        const colors = validCategories.map(cat => cat.color || '#10B981');

        // Create new chart
        chart = new Chart(ctx, {
            type: chartType,
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah',
                    data: data,
                    backgroundColor: colors,
                    borderColor: colors,
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: chartType === 'bar' || chartType === 'line' ? {
                    y: {
                        beginAtZero: true
                    }
                } : {}
            }
        });

        console.log('Chart created successfully');
    }

    // Initial chart render
    updateChart();

    // Listen for Livewire updates
    Livewire.on('refresh', () => {
        console.log('Refresh event received');
        setTimeout(updateChart, 100);
    });

    // Listen for any wire:model changes
    document.addEventListener('livewire:updated', function() {
        console.log('Livewire updated');
        setTimeout(updateChart, 100);
    });
});
</script>
@endpush
