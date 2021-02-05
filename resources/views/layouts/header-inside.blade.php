<!-- Preloading start -->
<div id="pre-loader" style="position: fixed; width: 100%; height: 100%; top: 0px; left: 0px; background-color: rgb(255, 255, 255); z-index: 999;"></div>
<!-- Preloading end -->
<header class="header">
    <!-- Fixed top bar start -->
    <div class="top-bar">
        <!-- Logo -->
        <a href="{{route('index')}}"><img class="img-fluid img-responsive pull-left"  style="height: 50px" src="{{ asset($contentsAr->logo)}}"></a>
        <!-- Menu icon -->
        <img class="top-menu-icon" src="{{ asset('frontend/assets/svg/menu-icon.svg')}}" width="100%">

    </div>
    <!-- Fixed top bar end -->

    <!-- Nav start -->
    <nav>

        <!-- Menu close icon -->
        <img class="menu-close" src="{{ asset('frontend/assets/svg/close-menu.svg')}}">

        <ul>
            <li><a href="{{route('index')}}">الصفحة الرئيسية</a></li>
            <li><a href="{{route('about')}}">من نحن؟</a></li>
            <li><a href="{{route('products')}}">منتجاتنا</a></li>
            <li><a href="{{route('applications')}}">برنامج القائمة</a></li>
            <li><a href="{{route('advices')}}">نصائح مفيدة</a></li>
            <li><a href="{{route('posts')}}">في وسائل الإعلام</a></li>
            <li><a href="{{route('careers')}}">وظائف</a></li>
            <li><a href="{{route('contacts')}}">اتصل بنا</a></li>
        </ul>

    </nav>
    <!-- Nav end -->

    <!-- Main banner start-->
    <div class="container">

        <!-- Logo -->
        <a href="{{route('index')}}"><img class="img-fluid img-responsive pull-left"  style="height: 100px;border-radius: 10%" src="{{ asset($contentsAr->logo)}}"></a>
    </div>
    <div class="banner-waves">
        <div class="banner-waves-inner" style="background: url({{asset('frontend/assets/img/banner.png')}});">
            <img class="banner-wave-1" src="{{ asset('frontend/assets/svg/banner-wave-inner.svg')}}"/>
        </div>
    </div>
    <div class="container">
        <div class="innerpagesheader"></div><!-- Main banner end-->
    </div>
    <!-- Main banner end -->

</header>
<!-- Header end -->
