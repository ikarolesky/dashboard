
        <div class="scrollbar-sidebar">
            
            <div class="app-sidebar__inner">
                @if (Auth::check())
            <ul class="vertical-nav-menu">

            <li class="app-sidebar__heading">
                                     Painel de Controle
            </li>
            <li>
            <a href="/home">
            <i class="metismenu-icon pe-7s-home" >
            </i>
                                     Dashboard
            </a>
            </li>
            <li>
            <a href="/home">
            <i class="metismenu-icon pe-7s-credit" >
            </i>
                                     Cartões
            </a>
            </li>
            <li>
            <a href="/home">
            <i class="metismenu-icon pe-7s-cart" >
            </i>
                                     Abandono de Carrinhos
            </a>
            </li>

                            <li class="app-sidebar__heading">
                                 ADMIN</li>



                            <li>
                            <a href="#">
                            <i class="metismenu-icon pe-7s-users">
                            </i>
                                                     Usuários
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left">
                            </i>
                            </a>
                            <ul>
                            <li>
                            <a href=" {{route('create') }}">
                            <i class="fas fa-user-plus">
                            </i>
                                                     Novo
                            </a>
                            </li>
                            <li>
                            <a href="{{ route('users.index') }}">
                            <i class="fas fa-server">
                            </i>
                                                    Todos usuários
                            </a>
                            </li>
                            </ul>

                             <li class="app-sidebar__heading">
                                 Loja</li>



                            <li>
                            <a href="#">
                            <i class="metismenu-icon pe-7s-users">
                            </i>
                                                     Produtos
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left">
                            </i>
                            </a>
                            <ul>
                            <li>
                            <a href=" {{route('produtos.index') }}">
                            <i class="fas fa-user-plus">
                            </i>
                                                     Todos os produtos
                            </a>
                            </li>
                            <li>
                            <a href="{{ route('produtos.create') }}">
                            <i class="fas fa-server">
                            </i>
                                                    Novo
                            </a>
                            </li>
                            </ul>

                    <li class="app-sidebar__heading"> Misc</li>
                    <li>
                    <a href="#">
                    <i class="metismenu-icon pe-7s-file">
                    </i>
                                         Comprovantes
                    </a>
                    <i class="metismenu-state-icon "></i>
                    </li>
                    @endif
        </div>
    </div>
    
</div>

