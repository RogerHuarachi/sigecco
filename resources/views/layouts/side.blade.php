<aside class="main-sidebar sidebar-light-lightblue elevation-4">
    <a class="brand-link navbar-gray">
        <img src="{{ asset('dist/img/proeza.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3 ml-1">
        <span class="brand-text font-weight-light">SiGeCOC</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @hasrole('TIC')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('dashboard') }}" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('dashboard.forders') }}" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Carpetas</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('dashboard.arqueos') }}" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Arqueos</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('dashboard.arqueosprint') }}" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Arqueos print</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endrole

                @can('permissions.index')
                    <li class="nav-item">
                        <a href="{{ route('permissions.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-check"></i>
                            <p>
                                Permiso
                            </p>
                        </a>
                    </li>
                @endcan

                @can('roles.index')
                    <li class="nav-item">
                        <a href="{{ route('roles.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Rol
                            </p>
                        </a>
                    </li>
                @endcan
                @can('cities.index')
                    <li class="nav-item">
                        <a href="{{ route('cities.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-globe"></i>
                            <p>
                                Departamento
                            </p>
                        </a>
                    </li>
                @endcan

                @can('agencies.index')
                    <li class="nav-item">
                        <a href="{{ route('agencies.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-city"></i>
                            <p>
                                Agencia
                            </p>
                        </a>
                    </li>
                @endcan

                @can('users.index')
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Usuarios
                            </p>
                        </a>
                    </li>
                @endcan

                @can('folders.index')
                    <li class="nav-item">
                        <a href="{{ route('folders.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-folder"></i>
                            <p>
                                Carpetas
                            </p>
                        </a>
                    </li>
                @endcan

                @can('assigns.index')
                    <li class="nav-item">
                        <a href="{{ route('assigns.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-walking"></i>
                            <p>
                                Asignaciones
                            </p>
                        </a>
                    </li>
                @endcan

                @can('observeds.index')
                    <li class="nav-item">
                        <a href="{{ route('observeds.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-search"></i>
                            <p>
                                Observadas
                            </p>
                        </a>
                    </li>
                @endcan

                @can('approveds.index')
                    <li class="nav-item">
                        <a href="{{ route('approveds.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-check"></i>
                            <p>
                                Aprobadas
                            </p>
                        </a>
                    </li>
                @endcan

                @can('rejecteds.index')
                    <li class="nav-item">
                        <a href="{{ route('rejecteds.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-times"></i>
                            <p>
                                Rechazadas
                            </p>
                        </a>
                    </li>
                @endcan

                @can('disbursements.index')
                    <li class="nav-item">
                        <a href="{{ route('disbursements.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-money-bill"></i>
                            <p>
                                Desembolsadas
                            </p>
                        </a>
                    </li>
                @endcan




                @hasrole('COMERCIAL')
                    <li class="nav-item">
                        <a href="{{ route('assign.assign') }}" class="nav-link">
                            <i class="nav-icon fas fa-folder"></i>
                            <p>
                                Asignaciones Comercial
                            </p>
                        </a>
                    </li>
                @endrole
                @hasrole('JEFE NACIONAL')
                    <li class="nav-item">
                        <a href="{{ route('assign.assignEN') }}" class="nav-link">
                            <i class="nav-icon fas fa-folder"></i>
                            <p>
                                Asignaciones Enc Nacional
                            </p>
                        </a>
                    </li>
                @endrole
                @hasrole('COMERCIAL|JEFE DE AGENCIA|JEFE NACIONAL')
                    <li class="nav-item">
                        <a href="{{ route('folders.assign') }}" class="nav-link">
                            <i class="nav-icon fas fa-folder"></i>
                            <p>
                                Carpetas Asignadas
                            </p>
                        </a>
                    </li>
                @endrole
                @hasrole('JEFE DE AGENCIA|ASESOR')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-folder"></i>
                            <p>
                                Jefes De Agencia
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        @if ( Auth::user()->id != 12)
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('folders.carla') }}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Carla</p>
                                    </a>
                                </li>
                            </ul>
                        @endif
                        @if ( Auth::user()->id != 9)
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('folders.alex') }}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Alex</p>
                                    </a>
                                </li>
                            </ul>
                        @endif
                        @if ( Auth::user()->id != 10)
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('folders.roxana') }}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Roxana</p>
                                    </a>
                                </li>
                            </ul>
                        @endif
                        @if ( Auth::user()->id != 18)
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('folders.mariela') }}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Mariela</p>
                                    </a>
                                </li>
                            </ul>
                        @endif
                        @if ( Auth::user()->id != 11)
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('folders.veronica') }}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Veronica</p>
                                    </a>
                                </li>
                            </ul>
                        @endif
                    </li>
                @endrole
                @hasrole('JEFE DE AGENCIA|ASESOR')
                    <li class="nav-item">
                        <a href="{{ route('folders.regist') }}" class="nav-link">
                            <i class="nav-icon fas fa-folder"></i>
                            <p>
                                Carpetas Registradas
                            </p>
                        </a>
                    </li>
                @endrole
                @hasrole('JEFE DE AGENCIA|ASESOR')
                    <li class="nav-item">
                        <a href="{{ route('folders.comercial') }}" class="nav-link">
                            <i class="nav-icon fas fa-folder"></i>
                            <p>
                                Carpetas de Comercial
                            </p>
                        </a>
                    </li>
                @endrole
                @hasrole('JEFE DE AGENCIA|ASESOR')
                    <li class="nav-item">
                        <a href="{{ route('folders.nacional') }}" class="nav-link">
                            <i class="nav-icon fas fa-folder"></i>
                            <p>
                                Carpetas de Nacional
                            </p>
                        </a>
                    </li>
                @endrole
                {{-- @hasrole('ASESOR')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-folder"></i>
                            <p>
                                Jefes De Agencia
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        @if ( Auth::user()->id != 8)
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('folders.ely') }}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Ely</p>
                                    </a>
                                </li>
                            </ul>
                        @endif
                        @if ( Auth::user()->id != 9)
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('folders.alex') }}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Alex</p>
                                    </a>
                                </li>
                            </ul>
                        @endif
                        @if ( Auth::user()->id != 10)
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('folders.roxana') }}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Roxana</p>
                                    </a>
                                </li>
                            </ul>
                        @endif
                        @if ( Auth::user()->id != 12)
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('folders.veronica') }}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Veronica</p>
                                    </a>
                                </li>
                            </ul>
                        @endif
                    </li>
                @endrole --}}
                {{-- @hasrole('ASESOR')
                    <li class="nav-item">
                        <a href="{{ route('folders.encargado') }}" class="nav-link">
                            <i class="nav-icon fas fa-folder"></i>
                            <p>
                                Carpetas de JA
                            </p>
                        </a>
                    </li>
                @endrole --}}
                @hasrole('OPERACIONES')
                    <li class="nav-item">
                        <a href="{{ route('folders.disbursement') }}" class="nav-link">
                            <i class="nav-icon fas fa-money-bill"></i>
                            <p>
                                Carpetas Desembolsadas
                            </p>
                        </a>
                    </li>
                @endrole

                @can('arqueos.index')
                    <li class="nav-item">
                        <a href="{{ route('arqueos.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-balance-scale"></i>
                            <p>
                                Arqueos
                            </p>
                        </a>
                    </li>
                @endcan
                @can('entradas.index')
                    <li class="nav-item">
                        <a href="{{ route('entradas.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-arrow-right"></i>
                            <p>
                                Entradas
                            </p>
                        </a>
                    </li>
                @endcan
                @can('salidas.index')
                    <li class="nav-item">
                        <a href="{{ route('salidas.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-arrow-left"></i>
                            <p>
                                Salidas
                            </p>
                        </a>
                    </li>
                @endcan
                @can('bolivianos.index')
                    <li class="nav-item">
                        <a href="{{ route('bolivianos.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-money-bill-alt"></i>
                            <p>
                                Bolivianos
                            </p>
                        </a>
                    </li>
                @endcan
                @can('dolars.index')
                    <li class="nav-item">
                        <a href="{{ route('dolars.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-dollar-sign"></i>
                            <p>
                                Dolares
                            </p>
                        </a>
                    </li>
                @endcan

                @can('bancos.index')
                    <li class="nav-item">
                        <a href="{{ route('bancos.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-landmark"></i>
                            <p>
                                Bancos
                            </p>
                        </a>
                    </li>
                @endcan
                @hasrole('OPERACIONES|CONTABILIDAD')
                    <li class="nav-item">
                        <a href="{{ route('arqueos.indexUser') }}" class="nav-link">
                            <i class="nav-icon fas fa-balance-scale"></i>
                            <p>
                                Arqueos Hoy
                            </p>
                        </a>
                    </li>
                @endrole
                @hasrole('OPERACIONES|CONTABILIDAD')
                    <li class="nav-item">
                        <a href="{{ route('entradas.indexUser') }}" class="nav-link">
                            <i class="nav-icon fas fa-arrow-right"></i>
                            <p>
                                Entradas Hoy
                            </p>
                        </a>
                    </li>
                @endrole
                @hasrole('OPERACIONES|CONTABILIDAD')
                    <li class="nav-item">
                        <a href="{{ route('salidas.indexUser') }}" class="nav-link">
                            <i class="nav-icon fas fa-arrow-left"></i>
                            <p>
                                Salidas Hoy
                            </p>
                        </a>
                    </li>
                @endrole
                @can('consolidados.index')
                    <li class="nav-item">
                        <a href="{{ route('consolidados.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-chart-line"></i>
                            <p>
                                Consolidado arqueo
                            </p>
                        </a>
                    </li>
                @endcan
                @can('arqueos.indexja')
                    <li class="nav-item">
                        <a href="{{ route('arqueos.indexja') }}" class="nav-link">
                            <i class="nav-icon fas fa-balance-scale"></i>
                            <p>
                                Arqueo
                            </p>
                        </a>
                    </li>
                @endcan
            </ul>
        </nav>
    </div>
</aside>

