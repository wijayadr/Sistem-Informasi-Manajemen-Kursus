<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ route('admin.dashboard') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <h3 style="line-height: 65px; color: white; font-family: 'IBM Plex Sans', sans-serif;">SID</h3>
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ route('admin.dashboard') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <h3 style="line-height: 65px; color: white; font-family: 'IBM Plex Sans', sans-serif;">SID</h3>
            </span>
        </a>
        <button type="button" class="btn btn-sm fs-20 header-item float-end btn-vertical-sm-hover p-0" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>

                @if (in_array(auth()->user()->role_id, [1, 2, 3]))
                    <x-nav-link :href="route('admin.dashboard')" :active="Request::routeIs('admin.dashboard')" icon="las la-tachometer-alt">Dashboard</x-nav-link>

                    <x-nav-link dropdown="informasiDesaMenu" icon="las la-book-reader" :active="Request::routeIs('admin.identity.index') || Request::routeIs('admin.identity.vision-mission') || Request::routeIs('admin.sdgs.progress') || Request::routeIs('admin.idm-scores.index')">
                        Informasi Desa
                        <x-slot name="content">
                            <x-dropdown id="informasiDesaMenu" :active="Request::routeIs('admin.identity.index') || Request::routeIs('admin.identity.vision-mission') || Request::routeIs('admin.sdgs.progress') || Request::routeIs('admin.idm-scores.index')">
                                <x-nav-link :href="route('admin.identity.index')" :active="Request::routeIs('admin.identity.index')">Identitas Desa</x-nav-link>
                                <x-nav-link :href="route('admin.identity.vision-mission')" :active="Request::routeIs('admin.identity.vision-mission')">Visi Misi</x-nav-link>
                                <x-nav-link :href="route('admin.sdgs.progress')" :active="Request::routeIs('admin.sdgs.progress')">SDGs</x-nav-link>
                                <x-nav-link :href="route('admin.idm-scores.index')" :active="Request::routeIs('admin.idm-scores.index')">IDM</x-nav-link>
                                {{-- <x-nav-link :href="route('admin.categories.index')">Struktur Desa</x-nav-link> --}}
                            </x-dropdown>
                        </x-slot>
                    </x-nav-link>

                    <x-nav-link :href="route('admin.statistics.index')" :active="Request::routeIs('admin.statistics.index')" icon="las la-chart-pie">Statistik</x-nav-link>

                    <x-nav-link dropdown="suratDesaMenu" icon="las la-envelope" :active="Request::routeIs('admin.statistics.population') || Request::routeIs('admin.statistics.education') ||  Request::routeIs('admin.statistics.religion')">
                        Surat Desa
                        <x-slot name="content">
                            <x-dropdown id="suratDesaMenu" :active="Request::routeIs('admin.letters.index') || Request::routeIs('admin.letters.detail') || Request::routeIs('admin.letters.secretary.index') || Request::routeIs('admin.letters.head-village.index') || Request::routeIs('admin.letters.secretary.detail') || Request::routeIs('admin.letters.head-village.detail')">
                                <x-nav-link :href="route('admin.letters.index')" :active="Request::routeIs('admin.letters.index') || Request::routeIs('admin.letters.detail')">Daftar Surat Desa</x-nav-link>
                                @if (auth()->user()->role_id == 2)
                                    <x-nav-link :href="route('admin.letters.head-village.index')" :active="Request::routeIs('admin.letters.head-village.index') || Request::routeIs('admin.letters.head-village.detail')">Tanda Tangan Surat</x-nav-link>
                                @elseif (auth()->user()->role_id == 3)
                                    <x-nav-link :href="route('admin.letters.secretary.index')" :active="Request::routeIs('admin.letters.secretary.index') || Request::routeIs('admin.letters.secretary.detail')">Daftar Pengajuan Surat</x-nav-link>
                                @endif
                            </x-dropdown>
                        </x-slot>
                    </x-nav-link>

                    <x-nav-link :href="route('admin.administrations.regulations.index')" :active="Request::routeIs('admin.administrations.regulations.index')" icon="las la-book">Buku Administrasi Desa</x-nav-link>

                    <x-nav-link dropdown="adminWebMenu" icon="las la-desktop" :active="Request::routeIs('admin.categories.index') || Request::routeIs('admin.news.index') || Request::routeIs('admin.news.create') || Request::routeIs('admin.news.edit') || Request::routeIs('admin.events.index') || Request::routeIs('admin.events.create') || Request::routeIs('admin.events.edit') || Request::routeIs('admin.identity.display-message')">
                        Admin Web
                        <x-slot name="content">
                            <x-dropdown id="adminWebMenu" :active="Request::routeIs('admin.categories.index') || Request::routeIs('admin.news.index') || Request::routeIs('admin.news.create') || Request::routeIs('admin.news.edit') || Request::routeIs('admin.events.index') || Request::routeIs('admin.events.create') || Request::routeIs('admin.events.edit') || Request::routeIs('admin.sliders.index') || Request::routeIs('admin.identity.display-message')">
                                <x-nav-link :href="route('admin.news.index')" :active="Request::routeIs('admin.news.index') || Request::routeIs('admin.news.create') || Request::routeIs('admin.news.edit')">Artikel</x-nav-link>
                                <x-nav-link :href="route('admin.categories.index')" :active="Request::routeIs('admin.categories.index')">Kategori</x-nav-link>
                                <x-nav-link :href="route('admin.events.index')" :active="Request::routeIs('admin.events.index') || Request::routeIs('admin.events.create') || Request::routeIs('admin.events.edit')">Agenda</x-nav-link>
                                <x-nav-link :href="route('admin.sliders.index')" :active="Request::routeIs('admin.sliders.index')">Slider</x-nav-link>
                                <x-nav-link :href="route('admin.identity.display-message')" :active="Request::routeIs('admin.identity.display-message')">Teks Berjalan</x-nav-link>
                            </x-dropdown>
                        </x-slot>
                    </x-nav-link>

                    @if (auth()->user()->role_id == 1)
                        <x-nav-link dropdown="penggunaMenu" icon="lar la-user-circle">
                            Users
                            <x-slot name="content">
                                <x-dropdown id="penggunaMenu">
                                    {{-- <x-nav-link :href="route('admin.roles.index')">Role</x-nav-link> --}}
                                    <x-nav-link :href="route('admin.users.index')">Pengguna</x-nav-link>
                                </x-dropdown>
                            </x-slot>
                        </x-nav-link>
                    @endif
                @endif
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
