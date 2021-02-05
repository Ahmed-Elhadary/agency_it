
<script src="{{asset('assets/vendors/jquery.min.js')}}"></script>
<script src="{{asset('assets/vendors/bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.bootstrap.min.js') }}"></script>

<script src="{{ asset('assets/buttons/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/buttons/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/buttons/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/buttons/jszip.min.js') }}"></script>
<script src="{{ asset('assets/buttons/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/buttons/vfs_fonts.js') }}"></script>

<!-- Responsive examples -->
<script src="{{ asset('assets/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('assets/js/responsive.bootstrap4.min.js')}}"></script>

{{--Notification--}}
{{-- Validator --}}
<script src="{{ asset('assets/js/validator.min.js') }}"></script>
<script src="{{ asset('assets/vendors/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/vendors/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{ asset('assets/js/app.min.js')}}"></script>

<script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('assets/js/metisMenu.min.js')}}"></script>
<script src="{{ asset('assets/js/waves.js')}}"></script>
<script src="{{ asset('assets/js/jquery.slimscroll.js')}}"></script>
<script>
    $(document).ready(function(){
        $('textarea,:text').keyup(function(){
            var string=$(this).attr('value');
            var last_character=string.substr(-1);
            var last_last_character=string.substr(-2,1);
            var arabic = /[\u0600-\u065F\u066A-\u06EF\u06FA-\u06FF]/;
            //var character=string.charAt(string.length-1);
            if(last_last_character=='\n' && arabic.test(last_character)==false && last_character!='\n'){
                $('textarea,:text').attr('dir', 'ltr');
            }
            else if(last_last_character=='\n' && arabic.test(last_character)==true) {
                $('textarea,:text').attr('dir', 'rtl');
            }
        });
    });
    $(function () {
        $("[rel='tooltip']").tooltip();
    })

</script>
{{-- dataTables --}}
@yield('scripts')
<!-- App js -->
<script src="{{asset('assets/js/jquery.core.js')}}"></script>
<script src="{{asset('assets/js/jquery.app.js')}}"></script>
