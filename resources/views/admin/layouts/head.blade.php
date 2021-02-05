<meta charset="utf-8" />
<title> Task-Manager | @yield('title')</title>
<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
<meta content="BIS" name="author" />
<!-- App favicon -->
<link href="{{asset('assets/css-'.LaravelLocalization::getCurrentLocale().'/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
<link href="{{asset('assets/css-'.LaravelLocalization::getCurrentLocale().'/icons.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css-'.LaravelLocalization::getCurrentLocale().'/app.min.css')}}" rel="stylesheet" type="text/css" id="app-stylesheet" />

{{-- SweetAlert2 --}}
<script src="{{ asset('assets/js/sweetalert2.min.js') }}"></script>
<link href="{{ asset('assets/css-'.LaravelLocalization::getCurrentLocale().'/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">

<link href="{{ asset('assets/js/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{asset('assets/css-'.LaravelLocalization::getCurrentLocale().'/style.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
<style>
    .dataTables_filter{
        position: relative;
    }
    .dataTables_filter label{
        font-size: 14px;
        color: #333;
        letter-spacing: 0.01em;
        font-family: "Montserrat", sans-serif;
        float: left;
        position: unset;
    }
    .h1,
    .h2,
    .h3,
    .h4,
    .h5,
    .h6,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,input,label,.control-label,.badge{

        font-family: 'Cairo';
    }
</style>
