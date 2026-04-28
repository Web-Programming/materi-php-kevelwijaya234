<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link href="<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">">
</head>
<body>
    <nav class="navbar navbar-expand lg navbar-dark bg-dark">
        <div class = "container-fluid">
            @include('app.navbar')
        </div>
</nav>
<div class="container-fluid">
    <div class = "row">
        <aside class = "col-md-3 col-lg-2 bg-light border-end min-wh-100 p-3">
            @section('sidebar')
                @include('app.sidebar')
            @show
        </aside>
    
        <main class="col-md-9 col-lg-10 p-4">
            @yield('content')
        </main>
</div>

<script src="<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" 
integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>"
    </body>
</html>