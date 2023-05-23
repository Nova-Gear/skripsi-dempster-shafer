<div class="left-side-bar">
    <div class="brand-logo">
        <a href="" class="dropdown-toggle no-arrow">
            <img src="{{ asset('vendors/images/logo-puerca.png') }}" alt=""
                style="border-radius: 50%; width:50px;">
            &nbsp;
            <h4 class="text-white"> Puerca Center </h4>
        </a>
    </div>
    <div class="garis-sidebar"></div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            @if (Auth::user()->role == 'admin')
                <ul id="accordion-menu">
                    <li>
                        <a href="{{ url('/dashboard') }}" class="dropdown-toggle no-arrow @yield('menu_dashboard')">
                            <span class="micon dw dw-monitor"></span><span class="mtext">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/gejala') }}" class="dropdown-toggle no-arrow @yield('menu_data_gejala')">
                            <span class="micon dw dw-thermometer"></span><span class="mtext">Data Gejala</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/penyakit') }}" class="dropdown-toggle no-arrow @yield('menu_data_penyakit')">
                            <span class="micon dw dw-library"></span><span class="mtext">Data Penyakit</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/basis_pengetahuan') }}"
                            class="dropdown-toggle no-arrow @yield('menu_data_basis_pengetahuan')">
                            <span class="micon ti-settings"></span><span class="mtext">Data Basis
                                Pengetahuan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/riwayat') }}" class="dropdown-toggle no-arrow @yield('menu_riwayat')">
                            <span class="micon dw dw-invoice-1"></span><span class="mtext">Data Riwayat</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/user') }}" class="dropdown-toggle no-arrow @yield('menu_user')">
                            <span class="micon icon-copy ti-user"></span><span class="mtext">User</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/komentar') }}" class="dropdown-toggle no-arrow @yield('menu_komentar')">
                            <span class="micon ti-pencil-alt"></span><span class="mtext">Kritik & Saran</span>
                        </a>
                    </li>
                </ul>
            @elseif(Auth::user()->role == 'user')
                <ul id="accordion-menu">
                    <li>
                        <a href="{{ url('/user/penyakit') }}" class="dropdown-toggle no-arrow @yield('menu_data_penyakit')">
                            <span class="micon dw dw-library"></span><span class="mtext">Data Penyakit</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/user/diagnosa') }}" class="dropdown-toggle no-arrow @yield('menu_diagnosa')">
                            <span class="micon ti-write"></span><span class="mtext">Diagnosa</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/user/diagnosa/riwayat') }}"
                            class="dropdown-toggle no-arrow @yield('menu_riwayat_diagnosa')">
                            <span class="micon dw dw-invoice-1"></span><span class="mtext">Riwayat Diagnosa</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/user/komentar') }}" class="dropdown-toggle no-arrow @yield('menu_komentar')">
                            <span class="micon ti-pencil-alt"></span><span class="mtext">Kritik & Saran</span>
                        </a>
                    </li>
                </ul>
            @endif

        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>
