<!-- Topbar Start -->
<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="fa fa-globe fa-1x pr-2"></i>
                <span class="pro-user-name ml-1">
                       <i class="mdi mdi-chevron-down"></i>
                </span>
                {{\Illuminate\Support\Facades\App::getLocale() =='ar' ? 'العربية':'ُEnglish'}}
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <a  hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="dropdown-item notify-item">
                        <i class="mdi mdi-account-outline"></i>
                        <span>{{ $properties['native'] }}</span>
                    </a>
                @endforeach
            </div>
        </li>
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="fa fa-user-circle fa-1x text-warning pr-2"></i>
                <span class="pro-user-name ml-1">
                    {{ucwords(auth('admin')->user()->name)}}   <i class="mdi mdi-chevron-down"></i>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0 text-black" style="font-family: 'Cairo',sans-serif;font-weight: bold">مرحبا </h6>
                </div>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="mdi mdi-account-outline"></i>
                    <span>{{__('lang.profile')}}</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="mdi mdi-settings-outline"></i>
                    <span>{{__('lang.settings')}}</span>
                </a>

                <div class="dropdown-divider"></div>
                <a href="{{ route('admin.logout') }}" class="dropdown-item notify-item" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                    <i class="mdi mdi-power"></i><span>{{__('lang.logout')}}</span>

                </a>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
    <!-- LOGO -->
    <div class="logo-box">
        <a href="index.html" class="logo text-center logo-dark">
            <span class="logo-lg">
               {{-- <img src="{{ asset('admin/assets/images/logo-dark.png') }}" alt="" height="18">--}}
                <span class="logo-lg-text-dark">{{config('app.name')}}</span>
            </span>
            <span class="logo-sm">
                <span class="logo-lg-text-dark">{{config('app.name')}}</span>
                {{--<img src="{{ asset('admin/assets/images/logo-sm.png') }}" alt="" height="22">--}}
            </span>
        </a>

        <a href="index.html" class="logo text-center logo-light">
            <span class="logo-lg">
               {{-- <img src="{{ asset('admin/assets/images/logo-light.png') }}" alt="" height="18">--}}
                <span class="logo-lg-text-dark text-white">{{config('app.name')}}</span>
            </span>
            <span class="logo-sm">
                <span class="logo-lg-text-dark text-white">{{config('app.name')}}</span>
               {{-- <img src="{{ asset('admin/assets/images/logo-sm.png') }}" alt="" height="22">--}}
            </span>
        </a>
    </div>

    <!-- LOGO -->


    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect">
                <i class="mdi mdi-menu"></i>
            </button>
        </li>
        {{--
        <li class="d-none d-lg-block">
            <form class="app-search">
                <div class="app-search-box">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                            <button class="btn" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </li>--}}
    </ul>
</div>
