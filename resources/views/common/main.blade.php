<aside class="main-sidebar">
        <section class="sidebar">
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">NAVEGACI&OacuteN</li>
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

                <li class="header">ADMINISTRATIVO</li>

                <li class="<?php if($options=='system') {echo 'active menu-open';}?>  treeview">
                    <a href="#">
                        <i class="fa fa-list-alt"></i> <span>Tablas del Sistemas</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @if(Cache::has('key'))
                            @foreach(Cache::get('key') as $home)
                                <li class="<?php if($selects==$home->selects) {echo 'active';}?>"><a href="{{url($home->route)}}?bd={{$home->name}}&selects={{$home->selects}}&module={{$home->description}}"><i class="fa fa-circle-o"></i>{{$home->description}}</a></li>
                            @endforeach
                        @endif   
                    </ul>
                </li>

                <li class="<?php if($options=='Users') {echo 'active menu-open';}?>  treeview">
                    <a href="#">
                        <i class="fa fa-users"></i> <span>Usuarios</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php if($selects=='UsersRegister') {echo 'active';}?>"><a href="{{url('user/create')}}"><i class="fa fa-circle-o"></i>Registrar</a></li>
                        <li class="<?php if($selects=='UsersList') {echo 'active';}?>"><a href="{{url('user')}}"><i class="fa fa-circle-o"></i>Listado</a></li>
                    </ul>
                </li>
            </ul>
        </section>
    </aside>