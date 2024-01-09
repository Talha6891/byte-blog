<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <title>  @yield('title') | {{ config('app.name') }} </title>

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
    <link href="{{ asset('assets/admin/plugins/material/css/materialdesignicons.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/admin/plugins/simplebar/simplebar.css') }}" rel="stylesheet"/>

    <!-- PLUGINS CSS STYLE -->
    <link href="{{ asset('assets/admin/plugins/nprogress/nprogress.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/admin/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css') }}"
          rel="stylesheet"/>
    <link href="{{ asset('assets/admin/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/admin/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet"/>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="{{ asset('assets/admin/plugins/toaster/toastr.min.css') }}" rel="stylesheet"/>

    {{-- bootstrap 5 icons --}}
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <!-- MONO CSS -->
    <link id="main-css-href" rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}"/>

    <!-- FAVICON -->
    <link href="{{ asset('assets/admin/images/favicon.png') }}" rel="shortcut icon"/>

    <script src="{{ asset('assets/admin/plugins/nprogress/nprogress.js') }}"></script>
</head>

<body class="navbar-fixed sidebar-fixed" id="body">
<script>
    NProgress.configure({
        showSpinner: false
    });
    NProgress.start();
</script>


<div id="toaster"></div>


{{-- WRAPPER --}}
<div class="wrapper">


    {{-- LEFT SIDEBAR --}}
    @include('admin.includes.sidebar')


    {{-- PAGE WRAPPER --}}
    <div class="page-wrapper">

        {{-- Header --}}
        @include('admin.includes.header')

        {{-- CONTENT WRAPPER --}}
        <div class="content-wrapper">
            <div class="content">

                @yield('content')

            </div>
        </div>

        {{-- Footer  --}}
        @include('admin.includes.footer')

    </div>
</div>

{{-- scripts --}}
<script src="{{ asset('assets/admin/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/simplebar/simplebar.min.js') }}"></script>
<script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>

<script src="{{ asset('assets/admin/plugins/apexcharts/apexcharts.js') }}"></script>

{{-- <script src="{{ asset('assets/admin/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script> --}}

<script src="{{ asset('assets/admin/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/jvectormap/jquery-jvectormap-us-aea.js') }}"></script>

<script src="{{ asset('assets/admin/plugins/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script>
    jQuery(document).ready(function () {
        jQuery('input[name="dateRange"]').daterangepicker({
            autoUpdateInput: false,
            singleDatePicker: true,
            locale: {
                cancelLabel: 'Clear'
            }
        });
        jQuery('input[name="dateRange"]').on('apply.daterangepicker', function (ev, picker) {
            jQuery(this).val(picker.startDate.format('MM/DD/YYYY'));
        });
        jQuery('input[name="dateRange"]').on('cancel.daterangepicker', function (ev, picker) {
            jQuery(this).val('');
        });
    });
</script>

<script src="{{ asset('assets/admin/plugins/toaster/toastr.min.js') }}"></script>

<script src="{{ asset('assets/admin/js/mono.js') }}"></script>

{{-- <script src="{{ asset('assets/admin/js/custom.js') }}"></script> --}}

{{--CSS for Select2 --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet"/>

{{-- Include Select2 JS --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

@stack('scripts')

</body>

</html>
