<aside class="main-sidebar">
        <section class="sidebar">
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li class="<?php if($options=='Vehicle') {echo 'active menu-open';}?> treeview">
                    <a href="#">
                        <i class="fa fa-car"></i> <span>Vehículos</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php if($selects=='VehRegister') {echo 'active';}?>"><a href="{{url('vehicles/create')}}"><i class="fa fa-circle-o"></i>Registrar</a></li>
                        <li class="<?php if($selects=='VehList') {echo 'active';}?>"><a href="{{url('vehicles')}}"><i class="fa fa-circle-o"></i>Listado</a></li>
                    </ul>
                </li>

                <li class="<?php if($options=='Client') {echo 'active menu-open';}?>  treeview">
                    <a href="#">
                        <i class="fa fa-user"></i> <span>Clientes</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php if($selects=='ClientRegister') {echo 'active';}?>"><a href="{{url('client/create')}}"><i class="fa fa-circle-o"></i>Registrar</a></li>
                        <li class="<?php if($selects=='ClientList') {echo 'active';}?>"><a href="{{url('client')}}"><i class="fa fa-circle-o"></i>Listado</a></li>
                    </ul>
                </li>
            </ul>
        </section>
    </aside>