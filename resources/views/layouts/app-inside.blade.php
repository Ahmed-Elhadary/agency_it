<!doctype html>
<html lang="ar" dir="rtl">
<head>
  @include('layouts.head')
    <style>
        .listItemA a{
            width: 70%;
            display: inline-block;
        }
        .innerpagesheaderjs {
            display: block;
            position: absolute;
            width: 60%;
            text-align: left;
            left: 80px;
            transform: translateY(115px);
            font-family: 'Lato', sans-serif;
            font-size: 4vw;
            line-height: 6vw;
            color: #f7f7f7;
            font-weight: 900;
            z-index: 0;
            cursor: default;
            top: 70px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            color: #ddd;
        }
    </style>
</head>
<body>

@include('layouts.right')
@include('layouts.header-inside')
@yield('contents')
@include('layouts.footer')
@include('layouts.scripts')
</body>
</html>
