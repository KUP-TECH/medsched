<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('const.title') }}</title>

    <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,800" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        crossorigin="anonymous" />
    <script src="{{ asset('vendor/soft-ui/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/soft-ui/js/core/bootstrap.min.js ') }}"></script>
    <script src="{{ asset('vendor/soft-ui/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('vendor/soft-ui/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('vendor/soft-ui/js/plugins/chartjs.min.js') }}"></script>
    <script src="{{ asset('vendor/soft-ui/js/soft-ui-dashboard.min.js?v=1.1.0') }}"></script>

    <link id="pagestyle" href="{{ asset('vendor/soft-ui/css/soft-ui-dashboard.css?v=1.1.0') }} " rel="stylesheet" />
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>

    {{ $slot }}

</body>


</html>