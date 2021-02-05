<!doctype html>
<html lang="ar" dir="rtl">
<head>
  @include('layouts.head')
    <style>
        header .container {
            position: relative;
            z-index: 2;
            padding-bottom: 0;
        }
    </style>
</head>
<body>

@include('layouts.right')
@include('layouts.header')
@yield('contents')
@include('layouts.footer')
@include('layouts.scripts')
</body>
</html>
