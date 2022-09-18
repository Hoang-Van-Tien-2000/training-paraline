<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel mb-5">
            <div class="pull-left image">
                <img src="{{asset('backend/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p> @if (Auth::check())
                    {{Auth::user()->name}}
                    @endif</span></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->

        <!-- sidebar menu: : style can be found in sidebar.less -->
        @php
            $module_active=session('module_active');
        @endphp
        <ul class="sidebar-menu " data-widget="tree">
            <li class="{{$module_active =='team' ? 'active': ''}}  treeview ">
                <a href="{{route('admin.team.search')}}">
                    <i class="fa fa-th"></i> <span>Team Management</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{(request()->is('admin/team/search')) ? 'active':''}}"><a
                            href="{{route('admin.team.search')}}"><i class="fa fa-circle-o"></i>Search </a></li>
                    <li class="{{(request()->is('admin/team/add')) ? 'active':''}}"><a
                            href="{{route('admin.team.add')}}"><i class="fa fa-circle-o"></i>Create</a></li>
                </ul>
            </li>
            <li class="{{$module_active =='employee' ? 'active': ''}}  treeview ">
                <a href="{{route('admin.employee.search')}}">
                    <i class="fa fa-th"></i> <span>Employee Management</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{(request()->is('admin/employee/search')) ? 'active':''}}"><a
                            href="{{route('admin.employee.search')}}"><i class="fa fa-circle-o"></i>Search </a></li>
                    <li class="{{(request()->is('admin/employee/add')) ? 'active':''}}"><a
                            href="{{route('admin.employee.add')}}"><i class="fa fa-circle-o"></i>Create</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
