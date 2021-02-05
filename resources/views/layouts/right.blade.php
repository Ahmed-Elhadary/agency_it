<!-- Right bar start -->
<div class="right-bar">

    <!-- Menu icon -->
    <img class="menu-icon menu-icon-ar" src="{{ asset('frontend/assets/svg/menu-icon.svg') }}" width="100%">
    <!-- button-->
    <!-- Social icons start -->
    <div class="right-social">
        @foreach($links as $link)
            @if($link->is_displayed == 1)
            <a href="{{$link->url}}"><img src="{{ asset($link->image) }}"></a>
            @endif
        @endforeach
    </div>
    <!-- Social icons end -->

</div>
<!-- Right bar end -->
