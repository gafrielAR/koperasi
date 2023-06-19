<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link nav-link {{ (request()->is('admin')) ? '' : 'collapsed' }}"
                href="{{ Auth::user()->role == 'admin' ? route('admin.dashboard') : route('dashboard.index') }}">
                <i class="ci-1 ci-dashboard-line"></i>
                <span>Dashboard</span>
            </a>
            <ul id="components-nav" class="nav-content" data-bs-parent="#sidebar-nav">
                <li>
                    <a class="filter-option" href="#" data-year="{{ date('Y') }}">
                        <i class="bi bi-circle"></i>
                        <span>{{ date('Y') }}</span>
                    </a>
                </li>
                <li>
                    <a class="filter-option" href="#" data-year="{{ date('Y', strtotime('-1 year')) }}">
                        <i class="bi bi-circle"></i>
                        <span>{{ date('Y', strtotime('-1 year')) }}</span>
                    </a>
                </li>
                <li>
                    <a class="filter-option" href="#" data-year="{{ date('Y', strtotime('-2 year')) }}">
                        <i class="bi bi-circle"></i>
                        <span>{{ date('Y', strtotime('-2 year')) }}</span>
                    </a>
                </li>
            </ul>
        </li>


        @if (Auth::user()->role == 'admin')
        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/member*')) ? '' : 'collapsed' }}"
                href="{{ route('admin.member.list') }}">
                <i class="ci-1 ci-user-group"></i>
                <span>Anggota</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/saving*')) ? '' : 'collapsed' }}"
                href="{{ route('admin.saving.list') }}">
                <i class="ci-1 ci-folder-2"></i>
                <span>Simpanan</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/loan*')) ? '' : 'collapsed' }}"
                href="{{ route('admin.loan.list') }}">
                <i class="ci-1 ci-money-send"></i>
                <span>Pinjaman</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/installment*')) ? '' : 'collapsed' }}"
                href="{{ route('admin.installment.list') }}">
                <i class="ci-1 ci-money"></i>
                <span>Angsuran</span>
            </a>
        </li>
        @endif

    </ul>

</aside>