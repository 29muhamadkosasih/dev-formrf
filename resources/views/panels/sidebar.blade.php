<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        {{-- <span class="app-brand-logo demo"> --}}
            <img src="{{ asset('assets/img/favicon/lgo.png') }}" width="110" height="90" alt
                class="me-3 ms-3 h-auto text-right" />

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
                <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
            </a>
    </div>

    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        @can('home.index')
        <li class="menu-item {{ (request()->is('home')) ? 'active' : '' }}">
            <a href="{{ route('home') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Home">Home</div>
            </a>
        </li>
        @endcan

        @can('dashboard.index')
        <li class="menu-item {{ (request()->is('dashboard')) ? 'active' : '' }}">
            <a href="{{ route('dashboard.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-layout-kanban"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>
        @endcan

        @can('dashboard.checked.index')
        <li class="menu-item {{ (request()->is('dashboard-checked')) ? 'active' : '' }}">
            <a href="{{ route('dashboard.checked') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-layout-kanban"></i>
                <div data-i18n="Dashboard"> Dashboard</div>
            </a>
        </li>
        @endcan

        @can('dashboard.approve.index')
        <li class="menu-item {{ (request()->is('dashboard-approve')) ? 'active' : '' }}">
            <a href="{{ route('dashboard.approve') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-layout-kanban"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>
        @endcan

        @can('dashboard.general.index')
        <li class="menu-item {{ (request()->is('dashboard-general')) ? 'active' : '' }}">
            <a href="{{ route('dashboard.general') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-layout-kanban"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>
        @endcan

        @can('profile.index')
        <li class="menu-item {{ Route::currentRouteNamed('me.index','me.edit','me.show') ? 'active' : '' }}">
            <a href="{{ route('me.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-user"></i>
                <div data-i18n="Profile">Profile</div>
            </a>
        </li>
        @endcan
        <!-- Apps & Pages -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text"> <b>Form RF</b> </span>
        </li>

        @can('layout.empty.index')
        <li class="menu-item {{ Route::currentRouteNamed('layout.empty') ? 'active' : '' }}">
            <a href="{{ route('layout.empty') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-mail"></i>
                <div data-i18n="Layout Empty">Layout Empty</div>
            </a>
        </li>
        @endcan

        @can('form-man.index')
        <li
            class="menu-item {{ Route::currentRouteNamed('form-man.index','form-man.edit','form-man.show') ? 'active' : '' }}">
            <a href="{{ route('form-man.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-folder"></i>
                <div data-i18n="Form">Form</div>
            </a>
        </li>
        @endcan

        @can('form-spv.index')
        <li
            class="menu-item {{ Route::currentRouteNamed('form-spv.index','form-spv.edit','form-spv.show') ? 'active' : '' }}">
            <a href="{{ route('form-spv.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-folder"></i>
                <div data-i18n="Form">Form</div>
            </a>
        </li>
        @endcan

        @can('form-app.index')
        <li
            class="menu-item {{ Route::currentRouteNamed('form-app.index','form-app.edit','form-app.show') ? 'active' : '' }}">
            <a href="{{ route('form-app.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-folder"></i>
                <div data-i18n="Form">Form</div>
            </a>
        </li>
        @endcan

        @can('form.index')
        <li class="menu-item {{ Route::currentRouteNamed('form.index','form.edit','form.show') ? 'active' : '' }}">
            <a href="{{ route('form.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-folder"></i>
                <div data-i18n="Form">Form</div>
            </a>
        </li>
        @endcan

        @can('form-checked.index')
        <li
            class="menu-item {{ Route::currentRouteNamed('form-checked.index','form-checked.edit','form-checked.detail') ? 'active' : '' }}">
            <a href="{{ route('form-checked.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-chart-pie"></i>
                <div data-i18n="Checked">Checked </div>
            </a>
        </li>
        @endcan

        @can('form-checkedman.index')
        <li
            class="menu-item {{ Route::currentRouteNamed('form-checkedman.index','form-checkedman.edit','form-checkedman.detail') ? 'active' : '' }}">
            <a href="{{ route('form-checkedman.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-chart-pie"></i>
                <div data-i18n="Checked">Checked </div>
            </a>
        </li>
        @endcan

        @can('form-approve.index')
        <li
            class="menu-item {{ Route::currentRouteNamed('form-approve.index','form-approve.edit','form-approve.detail') ? 'active' : '' }}">
            <a href="{{ route('form-approve.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-checks"></i>
                <div data-i18n="Approve">Approve</div>
            </a>
        </li>
        @endcan

        @can('form-list.index')
        <li class="menu-item {{ Route::currentRouteNamed('form-list.index','form-approve.view') ? 'active' : '' }}">
            <a href="{{ route('form-list.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-list"></i>
                <div data-i18n="List">List</div>
            </a>
        </li>
        @endcan

        @can('form-list.paid')
        <li class="menu-item {{ Route::currentRouteNamed('list','laporan.getLaporan') ? 'active' : '' }}">
            <a href="{{ route('list') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-list-check"></i>
                <div data-i18n="Paid">Paid</div>
            </a>
        </li>
        @endcan
        @can('report.today.index')
        <li class="menu-item {{ Route::currentRouteNamed('today') ? 'active' : '' }}">
            <a href="{{ route('today') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-report-money"></i>
                <div data-i18n="Resume RF">Resume RF</div>
            </a>
        </li>
        @endcan

        @canany(['report.today.index','report.resumeRf.index','report.reportPB.index','paymentIn.index','invoiceOut.index','cashflow.index','revenue.index'])
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text"> <b>Report</b> </span>
        </li>


        @can('report.reportPB.index')
        <li class="menu-item {{ Route::currentRouteNamed('reportPB') ? 'active' : '' }}">
            <a href="{{ route('reportPB') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-brand-tabler"></i>
                <div data-i18n="Report PB">Report PB</div>
            </a>
        </li>
        @endcan

        @can('report.resumeRf.index')
        <li class="menu-item {{ Route::currentRouteNamed('resumeRf') ? 'active' : '' }}">
            <a href="{{ route('resumeRf') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-color-swatch"></i>
                <div data-i18n="Report RF">Report RF</div>
            </a>
        </li>
        @endcan

        @can('invpayment.index')
        <li
            class="menu-item {{ Route::currentRouteNamed('invpayment.index','invpayment.edit','laporan.getLaporan.InvPayment') ? 'active' : '' }}">
            <a href="{{ route('invpayment.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-file-invoice"></i>
                <div data-i18n="Invoice & Pembayaran">Invoice & Pembayaran</div>
            </a>
        </li>
        @endcan

        @can('revenue.index')
        <li class="menu-item {{ Route::currentRouteNamed('revenue.index','revenue.edit') ? 'active' : '' }}">
            <a href="{{ route('revenue.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-brand-juejin"></i>
                <div data-i18n="A/E Revenue">A/E Revenue</div>
            </a>
        </li>

        @endcan
        @endcanany
        @can('reportpph.index')
        <li
            class="menu-item {{ Route::currentRouteNamed('reportpph.index','reportpph.edit','laporan.getLaporan.reportpph') ? 'active' : '' }}">
            <a href="{{ route('reportpph.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-address-book"></i>
                <div data-i18n="Report PPH 23">Report PPH 23 </div>
            </a>
        </li>
        @endcan


        @canany(['bank.index','norek.index','keperluan.index','kpengajuan.index','rujukan.index','departement.index','jabatan.index'])
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text"> <b>Master Data</b> </span>
        </li>

        @can('bank.index')
        <li class="menu-item {{ (request()->is('bank')) ? 'active' : '' }}">
            <a href="{{ route('bank.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-building-bank"></i>
                <div data-i18n="Bank">Bank</div>
            </a>
        </li>
        @endcan

        @can('norek.index')
        <li class="menu-item {{ (request()->is('norek')) ? 'active' : '' }}">
            <a href="{{ route('norek.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-file-dollar"></i>
                <div data-i18n="Nomor Rekening">Nomor Rekening</div>
            </a>
        </li>
        @endcan

        @can('keperluan.index')
        <li class="menu-item {{ (request()->is('keperluan')) ? 'active' : '' }}">
            <a href="{{ route('keperluan.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-text-wrap-disabled"></i>
                <div data-i18n="Keperluan">Keperluan</div>
            </a>
        </li>
        @endcan

        @can('kpengajuan.index')
        <li class="menu-item {{ (request()->is('kpengajuan')) ? 'active' : '' }}">
            <a href="{{ route('kpengajuan.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-layout-navbar"></i>
                <div data-i18n="Kategori Pengajuan">Kategori Pengajuan</div>
            </a>
        </li>
        @endcan

        @can('rujukan.index')
        <li class="menu-item {{ (request()->is('rujukan')) ? 'active' : '' }}">
            <a href="{{ route('rujukan.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-id"></i>
                <div data-i18n="Rujukan">Rujukan</div>
            </a>
        </li>
        @endcan

        @can('departement.index')
        <li class="menu-item {{ (request()->is('departement')) ? 'active' : '' }}">
            <a href="{{ route('departement.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-assembly"></i>
                <div data-i18n="Departement">Departement</div>
            </a>
        </li>
        @endcan

        @can('jabatan.index')
        <li class="menu-item {{ (request()->is('jabatan')) ? 'active' : '' }}">
            <a href="{{ route('jabatan.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-brand-abstract"></i>
                <div data-i18n="Jabatan">Jabatan</div>
            </a>
        </li>
        @endcan

        @endcanany

        @canany(['users.index','roles.index','permissions.index'])
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text"> <b>Users Management</b> </span>
        </li>

        @can('users.index')
        <li class="menu-item {{ (request()->is('users')) ? 'active' : '' }}">
            <a href="{{ route('users.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div data-i18n="Users">Users</div>
            </a>
        </li>
        @endcan

        @can('roles.index')
        <li class="menu-item {{ (request()->is('roles')) ? 'active' : '' }}">
            <a href="{{ route('roles.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-settings"></i>
                <div data-i18n="Roles">Roles</div>
            </a>
        </li>
        @endcan


        @can('permissions.index')
        <li class="menu-item {{ (request()->is('permissions')) ? 'active' : '' }}">
            <a href="{{ route('permissions.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-lock-access"></i>
                <div data-i18n="Permissions">Permissions</div>
            </a>
        </li>
        @endcan

        @endcanany
    </ul>
    <footer class="content-footer footer bg-footer-theme bg-danger">
        <ul class="menu-inner py-2">
            <li class="menu-item">
                <a href="#" onclick="$('#logout-form').submit();" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-logout " style="color: black"></i>
                    <div data-i18n="Logout" style="color: black">Logout</div>
                </a>
            </li>
        </ul>
    </footer>
</aside>
