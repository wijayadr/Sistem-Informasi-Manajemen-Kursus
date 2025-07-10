@props(['error', 'disabled' => false, 'time' => false])

@php
$classes = ($error ?? false)
            ? 'form-control is-invalid'
            : 'form-control';
@endphp

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => $classes]) !!}>

@push('script')
    <script>
        document.addEventListener("livewire:initialized", () => {
            let el = document.getElementById('{{ $attributes['id'] }}');

            @if ($time)
                console.log('Initializing flatpickr with date and time support');

                function initFlatpickr() {
                   flatpickr(el, {
                        altInput: true,
                        altFormat: "j F Y H:i",
                        enableTime: true,
                        dateFormat: "Y-m-d H:i",
                        time_24hr: true,
                        locale: {
                            firstDayOfWeek: 1,
                            weekdays: {
                                shorthand: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
                                longhand: [
                                    "Minggu",
                                    "Senin",
                                    "Selasa",
                                    "Rabu",
                                    "Kamis",
                                    "Jumat",
                                    "Sabtu",
                                ],
                            },
                            months: {
                                shorthand: [
                                    "Jan",
                                    "Feb",
                                    "Mar",
                                    "Apr",
                                    "Mei",
                                    "Jun",
                                    "Jul",
                                    "Agu",
                                    "Sep",
                                    "Okt",
                                    "Nov",
                                    "Des",
                                ],
                                longhand: [
                                    "Januari",
                                    "Februari",
                                    "Maret",
                                    "April",
                                    "Mei",
                                    "Juni",
                                    "Juli",
                                    "Agustus",
                                    "September",
                                    "Oktober",
                                    "November",
                                    "Desember",
                                ],
                            },
                        },
                    })
                }
            @else
                function initFlatpickr() {
                    flatpickr(el, {
                        altInput: true,
                        altFormat: "j F Y",
                        dateFormat: "Y-m-d",
                        locale: {
                            firstDayOfWeek: 1,
                            weekdays: {
                                shorthand: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
                                longhand: [
                                    "Minggu",
                                    "Senin",
                                    "Selasa",
                                    "Rabu",
                                    "Kamis",
                                    "Jumat",
                                    "Sabtu",
                                ],
                            },
                            months: {
                                shorthand: [
                                    "Jan",
                                    "Feb",
                                    "Mar",
                                    "Apr",
                                    "Mei",
                                    "Jun",
                                    "Jul",
                                    "Agu",
                                    "Sep",
                                    "Okt",
                                    "Nov",
                                    "Des",
                                ],
                                longhand: [
                                    "Januari",
                                    "Februari",
                                    "Maret",
                                    "April",
                                    "Mei",
                                    "Juni",
                                    "Juli",
                                    "Agustus",
                                    "September",
                                    "Oktober",
                                    "November",
                                    "Desember",
                                ],
                            },
                        },
                    })
                }
            @endif

            initFlatpickr()

            Livewire.hook('commit', ({ component, commit, respond, succeed, fail }) => {
                // Equivalent of 'message.sent'

                succeed(({ snapshot, effect }) => {
                    // Equivalent of 'message.received'

                    queueMicrotask(() => {
                        // Equivalent of 'message.processed'
                        initFlatpickr()
                    })
                })

                fail(() => {
                    // Equivalent of 'message.failed'
                })
            })
        })
    </script>
@endpush
