<!-- Preloading start -->
<div id="pre-loader" style="position: fixed; width: 100%; height: 100%; top: 0px; left: 0px; background-color: rgb(255, 255, 255); z-index: 999;"></div>
<!-- Preloading end -->
<header class="header">
    <!-- Fixed top bar start -->
    <div class="top-bar">
        <!-- Logo -->
        <a href="{{route('index')}}"><img class="img-fluid img-responsive pull-left" style="height: 50px" src="{{ asset($contentsAr->logo)}}"></a>
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
    <div class="video-container">

        <video id="video-container" autobuffer="" playsinline="" muted="" loop="" autoplay="" style="max-width:100%; height:auto">
            <source src="{{$contentsAr->video !=null ? asset($contentsAr->video) : asset('frontend/assets/videos/Kid-Guard.mp4')}}" type="video/mp4">
        </video>

        <div class="container">
            <!-- Logo -->

              <div class="row">
                  <div class="col-lg-2" style="padding: 0;margin: 0">
                      <img class=" img-responsive img-fluid" src="{{ asset($contentsAr->logo)}}" style="border-radius:10%;display:inline-block">
                  </div>

               @if($statistics->brand != null)

                   <div class="col-lg-4 pull-right pt-3" style="background: #fff;border-radius: 25px;text-align: center;">

                               <img src="{{$statistics->brand->image}}" class="pull-right  img-responsive img-fluid" alt="" style="min-height: 100px;margin: 10px;">
                    </div>

               @endif
        </div>
            <!-- Main banner text -->
            <div class="banner-text">
                علامات تجارية عربية موثوق بها        </div>
            <!-- Main banner button -->
            <a class="btn btn-primary btn-banner" href="{{route('products')}}">عرض منتجاتنا</a>
        </div>
    </div>
    <div class="banner-waves">
        <div class="banner-waves-inner">
            <img class="banner-wave-1" src="{{ asset('frontend/assets/svg/banner-wave-inner.svg')}}"/>
        </div>
    </div>
    <div class="container">
        <div class="innerpagesheader"></div><!-- Main banner end-->
    </div>
    <!-- Main banner end -->

</header>
<!-- Header end -->
