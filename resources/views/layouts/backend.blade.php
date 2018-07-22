<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Административный интерфейс | Справочник телефонов ПФР</title>

        <!-- Styles -->
        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>      
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="#">Справочник IP телефонов <span class="badge badge-danger">Админ-панель</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Панель <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('backend/employees') }}">Сотрудники ПФР</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('backend/organisations') }}">Организации ПФР</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('backend/departments') }}">Отделы ПФР</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('backend/positions') }}">Должности</a>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-right" style="padding-right: 50px">
                    <!-- Authentication Links -->
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a class="dropdown-item" href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    Выйти
                                </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                            <div class="dropdown-divider"></div>
                            <li>
                                <a class="dropdown-item" href="{{ url('/') }}">
                                    Главная
                                </a>
                            </li>
                        </ul>
                    </li>
            </div>
        </nav>
        <div class="container">
            <br>
            @yield('content')
        </div>

        <!-- Scripts -->
        <script src="/js/jquery.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
    </body>
</html>