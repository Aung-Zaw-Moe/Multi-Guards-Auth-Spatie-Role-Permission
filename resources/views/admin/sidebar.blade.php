 <aside class="left-sidebar">
            <div class="d-flex no-block nav-text-box align-items-center">
                <span><img src="/img/nexthop-logo (2).png" width="50" height="50" alt="elegant admin template"></span>
                <a class="nav-lock waves-effect waves-dark ml-auto hidden-md-down" href="javascript:void(0)"><i class="mdi mdi-toggle-switch"></i></a>
                <a class="nav-toggler waves-effect waves-dark ml-auto hidden-sm-up" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
            </div>
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                                               
                        <li> <a class="waves-effect waves-dark" href="{{ route('admin.dashboard') }}" aria-expanded="false">Dashboard</span></a></li>
                        
                        <li class="nav-small-cap"></li>
                        <h5 class="ml-2">Roles & Permissions</h4>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-media-right-alt"></i><span class="hide-menu">Roles</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ url('roles') }}">Index Role <i class="ti-file"></i></a></li>
                                <li><a href="{{ url('roles/create') }}">Create Role <i class="ti-file"></i></a></li>
                                
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-media-right-alt"></i><span class="hide-menu">Permissions</span></a>
                            <ul aria-expanded="false" class="collapse">
                                 <li><a href="{{ url('permissions') }}">Index Role <i class="ti-file"></i></a></li>
                                <li><a href="{{ url('permissions/create') }}">Create Role <i class="ti-file"></i></a></li>
                                
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-media-right-alt"></i><span class="hide-menu">Users</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ url('users') }}">Index Role <i class="ti-file"></i></a></li>
                                <li><a href="{{ url('users/create') }}">Create Role <i class="ti-file"></i></a></li>
                                
                            </ul>
                        </li>
                        
                        <li class="nav-small-cap"></li>
                       
                        <li> <a class="waves-effect waves-dark" href="{{ route('admin.logout') }}" aria-expanded="false"><i class="fa fa-circle-o text-success"></i><span class="hide-menu">Log Out</span></a></li>
                      
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>