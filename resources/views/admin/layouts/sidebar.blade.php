
<div class="left-side-menu">

    <div class="slimscroll-menu">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul class="metismenu" id="side-menu">

                <li class="menu-title">{{__('lang.panel')}}</li>
                <li>
                    <a href="{{route('admin.home')}}" class="waves-effect">
                        <i class="fa fa-home"></i>
                        <span> {{__('lang.home')}} </span>
                    </a>
                </li>
                @if(auth('admin')->user()->group->permission->super == 1)
                <li>
                    <a href="{{route('groups.index')}}" class="waves-effect">
                        <i class="fa fa-cogs"></i>
                        <span> {{__('lang.groups')}} </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admins.index')}}" class="waves-effect">
                        <i class="fa fa-users"></i>
                        <span> {{__('lang.admins')}} </span>
                    </a>
                </li>
                @endif
                <li>
                    <a href="{{route('tasks.index')}}" class="waves-effect">
                        <i class="fa fa-tasks"></i>
                        <span> {{__('lang.tasks')}} </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('tasks.filter')}}" class="waves-effect">
                        <i class="fa fa-filter"></i>
                        <span> {{__('lang.tasksFilter')}} </span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- End Sidebar -->
        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->
</div>
<!-- Left Sidebar End -->
