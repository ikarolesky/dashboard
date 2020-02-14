
        <div class="scrollbar-sidebar">
            
            <div class="app-sidebar__inner">
                @if (Auth::check())
            <ul class="vertical-nav-menu">
            <li>
            <a href="/home">
            <i class="metismenu-icon pe-7s-user" style="font-size: 35px">
            </i>
                <span style="font-size: 20px">                     Olá, {{Auth::user()->name}}!</span>
            </a>
            </li>

            <li class="app-sidebar__heading">
                                    <span style="font-size: 16px"> Painel de Controle</span>
            </li>
            <li>
            <a href="/home">
            <i class="metismenu-icon pe-7s-home" style="font-size: 35px">
            </i>
                                     Dashboard
            </a>
            </li>
            <li>
            <a href="/home">
            <i class="metismenu-icon pe-7s-credit" style="font-size: 35px">
            </i>
                                     Cartões
            </a>
            </li>
            <li>
            <a href="/home">
            <i class="metismenu-icon pe-7s-cart" style="font-size: 35px">
            </i>
                                     Abandono de Carrinhos
            </a>
            </li>

                            <li class="app-sidebar__heading">
                                <span style="font-size: 16px"> ADMIN</li></span>



                            <li>
                            <a href="#">
                            <i class="metismenu-icon pe-7s-users" style="font-size: 35px">
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
                                                    <li>
                                                    <a href="#">
                                                    <i class="metismenu-icon pe-7s-check" style="font-size: 35px">
                                                    </i>
                                                                        Permissões
                                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left">
                                                    </i>
                                                    </a>
                                                    <ul>
                                                    <li>
                                                    <a href="{{ route('roles.index')}}">
                                                    <i class="fas fa-edit">
                                                    </i>
                                                                         Editar Permissões
                                                    </a>
                                                    </li>
                                                    </ul>

                    <li class="app-sidebar__heading"><span style="font-size: 16px"> Misc</li></span>
                    <li>
                    <a href="#">
                    <i class="metismenu-icon pe-7s-file" style="font-size: 35px">
                    </i>
                                         Comprovantes
                    </a>
                    <i class="metismenu-state-icon "></i>
                    </li>
                    @endif
        </div>
    </div>
    
</div>

