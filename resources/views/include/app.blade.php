<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>@yield('title')</title>
        <link data-n-head="true" rel="shortcut icon" type="image/png" href="{{ asset('favicon.ico') }}" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('neon-glow/css/bootstrap4-neon-glow.min.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel='stylesheet' href='//cdn.jsdelivr.net/font-hack/2.020/css/hack.min.css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
        @yield('css')
        <style type="text/css">
            /* Custom Scrollbar */
            ::-webkit-scrollbar {
              width: 10px;
            }
            ::-webkit-scrollbar-track {
              background: #f1f1f1; 
            }
            ::-webkit-scrollbar-thumb {
              background: #766ddf; 
            }
            ::-webkit-scrollbar-thumb:hover {
              background: #555; 
            }
            .footer {
                position: static;
                bottom: 0;
                width: 100%;
                height: 2.5rem;            
            }
        </style>
    </head>
    <body>

    <div class="navbar-dark text-white">
        <div class="container">
            <nav class="navbar px-0 navbar-expand-lg navbar-dark">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a href="{{ route('home') }}" class="pl-md-0 p-3 text-decoration-none text-light"><i class="fa fa-home fa-fw"></i> Home</a>
                        <a href="{{ route('shell') }}" class="p-3 text-decoration-none text-light"><i class="fa fa-code fa-fw"></i> SHELL</a>
                        <a href="{{ route('vps') }}" class="p-3 text-decoration-none text-light"><i class="fa fa-cloud fa-fw"></i> VPS</a>
                        <a href="{{ route('cpanel') }}" class="p-3 text-decoration-none text-light"><i class="fa fa-desktop fa-fw"></i> CPANEL</a>
                        <a href="{{ route('user') }}" class="p-3 text-decoration-none text-light"><i class="fa fa-users fa-fw"></i> USERS</a>
                        {{-- <a href="{{ route('role') }}" class="p-3 text-decoration-none text-light"><i class="fa fa-gears fa-fw"></i> ROLES</a> --}}
                    </div>
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-light text-uppercase" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-light text-uppercase" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-light text-uppercase" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
    
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item text-light text-uppercase" href="{{ route('logout') }}"
                                      onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    @yield('content')


    <!-- Footer -->
    <footer class="text-muted mt-4 footer">
      <div class="text-center py-3">Made with <i class="fa fa-heart"></i> by <a href="https://dev.codelatte.net" target="_blank" alt="Codelatte"> Codelatte Dev</a>.
      </div>
    </footer>

    <!-- Javascripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    @yield('js')
    </body>
</html>

