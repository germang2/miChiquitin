
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse  ">
        <ul class="page-sidebar-menu page-header-fixed" data-keep-expanded="false"
            data-auto-scroll="true" data-slide-speed="200">
            <li class="heading">
                <h3 class="uppercase">Menú Principal</h3>
            </li>

            <li class="nav-item">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-usd"></i>
                    <span class="title">Contabilidad</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu" style="display: none;">
                    <li class="nav-item">
                        <a href="{{route('nominas.index')}}" class="nav-link ">
                            <i class="fa fa-money"></i>
                            <span class="title">Pago de Nomina</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('pagoproveedores.index')}}" class="nav-link ">
                            <i class="fa fa-money"></i>
                            <span class="title">Pago de Proveedores</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('balances.index')}}" class="nav-link ">
                            <i class="fa fa-file-text"></i>
                            <span class="title">Balance</span>
                        </a>
                    </li>

                    @if(Auth::user()->email == 'root@gmail.com')
                        <li class="nav-item">
                            <a href="{{route('varcontr.index')}}" class="nav-link ">
                                <i class="fa fa-cogs"></i>
                                <span class="title">Datos Contables</span>
                            </a>
                        </li>
                        @endif


                </ul>
            </li>

            <li class="nav-item">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-cogs"></i>
                    <span class="title">Facturas</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu" style="display: none;">
                    <li class="nav-item">
                        <a href="#" class="nav-link ">
                            <i class="fa fa-cogs"></i>
                            <span class="title">Opcion 1</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-cogs"></i>
                    <span class="title">Inventario</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu" style="display: none;">
                    <li class="nav-item">
                        <a href="#" class="nav-link ">
                            <i class="fa fa-cogs"></i>
                            <span class="title">Opcion 1</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-cogs"></i>
                    <span class="title">Cartera</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu" style="display: none;">
                    <li class="nav-item">
                        <a href="#" class="nav-link ">
                            <i class="fa fa-cogs"></i>
                            <span class="title">Opcion 1 </span>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-cogs"></i>
                    <span class="title">Usuarios</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu" style="display: none;">
                    <li class="nav-item">
                        <a href="#" class="nav-link ">
                            <i class="fa fa-cogs"></i>
                            <span class="title"> Opcion 1</span>
                        </a>
                    </li>

                </ul>
            </li>

        </ul>
    </div>
</div>