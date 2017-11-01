
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse  ">
        <ul class="page-sidebar-menu page-header-fixed" data-keep-expanded="false"
            data-auto-scroll="true" data-slide-speed="200">
            <li class="heading">
                <h3 class="uppercase">Menú Principal</h3>
            </li>

            <li class="nav-item">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-cogs"></i>
                    <span class="title">Contabilidad</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu" style="display: none;">
                    <li class="nav-item">
                        <a href="#" class="nav-link ">
                            <i class="fa fa-cogs"></i>
                            <span class="title">Balance</span>
                        </a>
                    </li>

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
                <!--a href="{{ url('/cartera/index') }}"-->
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-cogs"></i>
                    <span class="title">Cartera</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu" style="display: none;">
                  <li class="nav-item">
                    <a href="{{ URL::to('/deuda/create') }}" class="nav-link ">
                      <i class="fa fa-cogs"></i>
                      <span class="title">Nuevo crédito</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ URL::to('/deuda') }}" class="nav-link ">
                      <i class="fa fa-cogs"></i>
                      <span class="title">Historial crediticio</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ URL::to('/deuda') }}" class="nav-link ">
                      <i class="fa fa-cogs"></i>
                      <span class="title">Consultar pagos</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ URL::to('/plan_de_pago/create') }}" class="nav-link ">
                      <i class="fa fa-cogs"></i>
                      <span class="title">Plan de pagos</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ URL::to('/deuda') }}" class="nav-link ">
                      <i class="fa fa-cogs"></i>
                      <span class="title">Registrar pago</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ URL::to('/deuda') }}" class="nav-link ">
                      <i class="fa fa-cogs"></i>
                      <span class="title">Generar reporte</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ URL::to('/deuda') }}" class="nav-link ">
                      <i class="fa fa-cogs"></i>
                      <span class="title">Paz y salvo</span>
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