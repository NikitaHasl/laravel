<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link @if (request()->routeIs('admin.users.*')) active @endif" href="{{ route('admin.users.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Панель управления
            </a>

            <div class="sb-sidenav-menu-heading">Основное</div>
            <a class="nav-link @if (request()->routeIs('admin.categories.*')) active @endif" href="{{ route('admin.categories.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Категории
            </a>
            <a class="nav-link @if (request()->routeIs('admin.news.*')) active @endif" href="{{ route('admin.news.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                Новости
            </a>
            <a class="nav-link @if (request()->routeIs('admin.resources.*')) active @endif" href="{{ route('admin.resources.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-link"></i></div>
                Ресурсы
            </a>

        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        Start Bootstrap
    </div>
</nav>
