<nav class="hk-nav hk-nav-light">
    <a href="javascript:void(0);" id="hk_nav_close" class="hk-nav-close"><span class="feather-icon"><i
                data-feather="x"></i></span></a>
    <div class="nicescroll-bar">
        <div class="navbar-nav-wrap">
            <div class="nav-header">
                <span>Data Siswa</span>
                <span>UI</span>
            </div>
            <ul class="navbar-nav flex-column">
                <li class="nav-item {{ request()->is('petugas/siswa*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('siswa.index') }}">
                        <i class="material-icons">card_membership</i>
                        <span class="nav-link-text">Anggota</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('petugas/sekolah*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('sekolah.index') }}">
                        <i class="material-icons">business</i>
                        <span class="nav-link-text">Instansi</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('petugas/kelas*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('kelas.index') }}">
                        <i class="material-icons">class</i>
                        <span class="nav-link-text">Tipe Keanggotaan</span>
                    </a>
                </li>
            </ul>
            <hr class="nav-separator">
            <div class="nav-header">
                <span>Buku</span>
                <span>UI</span>
            </div>
            <ul class="navbar-nav flex-column">
                <li class="nav-item {{ request()->is('petugas/buku*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('buku.index') }}">
                        <i class="material-icons">menu_book</i>
                        <span class="nav-link-text">Buku</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('petugas/rak*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('rak.index') }}">
                        <i class="material-icons">shelves</i>
                        <span class="nav-link-text">Rak Buku</span>
                    </a>
                </li>
            </ul>
            <hr class="nav-separator">
            <div class="nav-header">
                <span>Media</span>
                <span>UI</span>
            </div>
            <ul class="navbar-nav flex-column">
                <li class="nav-item {{ request()->is('petugas/artikel*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('artikel.index') }}">
                        <i class="material-icons">article</i>
                        <span class="nav-link-text">Artikel</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('petugas/request-buku*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('request_buku') }}">
                        <i class="material-icons">book</i>
                        <span class="nav-link-text">Request Buku</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('petugas/request-anggota*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('request_anggota') }}">
                        <i class="material-icons">loyalty</i>
                        <span class="nav-link-text">Request Anggota</span>
                    </a>
                </li>
            </ul>
            <hr class="nav-separator">
            <div class="nav-header">
                <span>Petugas</span>
                <span>UI</span>
            </div>
            <ul class="navbar-nav flex-column">
                <li class="nav-item {{ request()->is('petugas/petugas*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('petugas.index') }}">
                        <i class="material-icons">groups</i>
                        <span class="nav-link-text">Petugas</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('petugas/kepsek*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('kepsek.index') }}">
                        <i class="material-icons">school</i>
                        <span class="nav-link-text">Supervisor</span>
                    </a>
                </li>
            </ul>
            <hr class="nav-separator">
            <div class="nav-header">
                <span>Pengaturan</span>
                <span>UI</span>
            </div>
            <ul class="navbar-nav flex-column">
                <li class="nav-item {{ request()->is('petugas/iklan*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('iklan.index') }}">
                        <i class="material-icons">view_carousel</i>
                        <span class="nav-link-text">Banner</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('petugas/denda*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('denda.index') }}">
                        <i class="material-icons">monetization_on</i>
                        <span class="nav-link-text">Denda</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('petugas/layanan*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('layanan.index') }}">
                        <i class="material-icons">info</i>
                        <span class="nav-link-text">Layanan</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('petugas/tentang-kami*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('tentang-kami.index') }}">
                        <i class="material-icons">policy</i>
                        <span class="nav-link-text">Tentang Kami</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('petugas/rules*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('rules.index') }}">
                        <i class="material-icons">warning</i>
                        <span class="nav-link-text">Rule Peminjaman / Pengembalian</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
