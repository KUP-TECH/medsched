<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="{{ asset('assets/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js@11.1.0/public/assets/styles/choices.min.css">
    <style>
        body {
            background-color: #f1f3f9;
        }
    
        .sidebar {
            min-height: 100vh;
            border-right: 1px solid #dee2e6;
        }
    
        .sidebar .list-group-item {
            background: transparent;
            border: none;
            color: white;
            cursor: pointer;
        }
    
        .sidebar .list-group-item:hover,
        .sidebar .list-group-item.active {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 4px;
        }
    
        .sidebar .submenu .list-group-item {
            padding-left: 1.5rem;
            background-color: #003366;
            border-radius: 4px;
        }
    
        .sidebar a {
            color: white;
        }
    
        .sidebar a:hover {
            text-decoration: underline;
        }
    
        .dashboard-card {
            border: 1px solid #dee2e6;
            border-radius: 12px;
            background-color: white;
            padding: 1.5rem;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.04);
        }
    
        .navbar .btn-logout {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            border: none;
        }
    
        .navbar .btn-logout:hover {
            background-color: rgba(255, 255, 255, 0.25);
        }
    </style>
</head>

<body>

    {{ $slot }}

</body>


</html>