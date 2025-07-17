<div>
    <div class="row">
        <div class="mb-4">
            <h4>Skor SDGs: <span class="text-primary">{{ number_format($average, 2) }}%</span></h4>
        </div>
        @foreach($goals as $goal)
            <div class="col-md-6">
                <div class="card border">
                    <div class="card-body">
                        <div class="row gy-3 align-items-center">
                            <div class="col-sm-auto">
                                <div class="avatar-lg bg-light rounded p-1">
                                    <img src="{{ $goal->image_url ?? 'https://via.placeholder.com/100' }}" alt="{{ $goal->title }}" class="img-fluid d-block">
                                </div>
                            </div>
                            <div class="col-sm">
                                <h5 class="fs-15 text-truncate">
                                    <span class="text-dark">{{ $goal->title }}</span>
                                </h5>

                                <div class="d-flex align-items-center gap-2 mt-2">
                                    <x-text-input
                                        type="number"
                                        value="{{ $goal->progress->achievement_value }}"
                                        wire:change="updateProgress({{ $goal->id }}, $event.target.value)"
                                        id="goal_{{ $goal->id }}"
                                        :error="$errors->get('goals.' . $loop->index . '.progress.achievement_value')"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
