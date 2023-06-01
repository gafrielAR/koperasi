<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin')) ? '' : 'collapsed' }}" href="{{ route('admin.dashboard') }}">
                <i class="ci-1 ci-dashboard-line"></i>
                <span>Dashboard</span>
            </a>
        </li>

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

    </ul>

</aside>