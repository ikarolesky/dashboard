<!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <!-- BEGIN: LOGO/TOGGLE-->
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="/home">
                        <div class="brand-logo"></div>
                        <h2 class="brand-text mb-0">Kings7</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>
        <!-- END: LOGO/TOGGLE-->
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="navigation-header"><span>Painel de controle</span></li>
                <li class=" nav-item"><a href="/home"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
                </li>
                <li class=" navigation-header"><span>ADMIN</span>
                </li>
                <li class=" nav-item"><a href="#"><i class="feather icon-user"></i><span class="menu-title" data-i18n="User">Usuários</span></a>
                    <ul class="menu-content">
                        <li><a href="{{ route('users.index') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">Listar</span></a>
                        </li>
                        <li><a href="{{ route('create') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Edit">Novo</span></a>
                        </li>
                    </ul>
                </li>
                @can('add_posts')
                <li class=" navigation-header"><span>Loja</span>
                </li>
                <li class=" nav-item"><a href="#"><i class="feather icon-shopping-cart"></i><span class="menu-title" data-i18n="Data List">Produtos</span></a>
                    <ul class="menu-content">
                        <li><a href="{{ route('products.index') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List View">Todos os produtos</span></a>
                        </li>
                        <li><a href="{{ route('products.create') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Thumb View">Novo</span></a>
                        </li>
                    </ul>
                </li>
                <li class=" navigation-header"><span>Campanhas</span>
                </li>
                <li class=" nav-item"><a href="#"><i class="feather icon-credit-card"></i><span class="menu-title" data-i18n="Data List">Cartões</span></a>
                    <ul class="menu-content">
                        <li><a href="{{ route('cards.index') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List View">Todos os cartões</span></a>
                        </li>
                        <li><a href="{{ route('cards.create') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Thumb View">Novo</span></a>
                        </li>
                    </ul>
                </li>
                @endcan
                </li>
            </ul>
        </div>
        </div>
    <!-- END: Main Menu-->