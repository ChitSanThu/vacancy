<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css"/>
    @yield('css')
</head>

<body>
    <nav class="navbar navbar-expand-lg  py-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('job_list.index')}}">
                <img src="{{ asset('images/GetbakLogo.svg') }}" alt="" height="24"
                    class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-uppercase active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" href="#">Application</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" href="#">Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" href="#">vacancy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" href="#">Contact</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    @yield('content')
    <div class="mt-5 bg-secondary d-flex justify-content-center align-items-center" style="height: 400px;width:100%">
        <p class=" display-1 text-uppercase">Footer</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/js/all.min.js" ></script> --}}
    @yield('js')
</body>

</html>
