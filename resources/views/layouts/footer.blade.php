<footer>
    <div class="container">
        <!-- About footer -->
        <!-- end about footer -->
        <div class="col-sm-5 col-md-4  footer-links footer-links-ar">
            <div class="footer-column-title">روابط سريعة</div>
            <ul>
                <li><a href="{{route('products')}}">منتجاتنا</a></li>
                <li><a href="{{route('careers')}}">وظائف</a></li>
                <li><a href="{{route('posts')}}"> المقالات</a></li>
            </ul>
        </div>
        <div class="col-sm-4 col-md-4  footer-links footer-links-ar">
            <ul>
                <div class="footer-column-title"><br></div>
                <li><a href="{{route('about')}}">عن الشركة</a></li>
                <li><a href="{{route('contacts')}}">تواصل معتا</a></li>
                <li><a href="{{route('advices')}}">نصائح مفيدة</a></li>
            </ul>
        </div>

        <div class="col-sm-4 col-md-4  footer-links footer-links-ar">
            <div class="footer-column-title">روابط أخرى</div>
            <ul class="list-inline">
                @foreach($links as $link)
                    <li style="width: 100/{{$loop->iteration}}%"><a href="{{$link->url}}"><img src="{{$link->image}}" width="30" height="30" style="border: 2px solid #ddd;border-radius: 50%" alt=""></a></li>
                @endforeach
            </ul>
        </div>

    </div>
    <!-- end container -->

    <div class="container-fluid">
        جميع الحقوق محفوظة 2020.  {{$contentsAr->name}}</div>
</footer>
