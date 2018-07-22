<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Справочник телефонов ПФР</title>

    <!-- Styles -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/front.css" rel="stylesheet">
    <link href="/css/fa.css" rel="stylesheet">
    <link href="/css/fontawesome.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <script src="/js/jquery.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Телефоны <sup><span class="badge badge-danger">Модуль пользователя</span></sup></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor03">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('live_search') }}"><i class="fas fa-search"></i> Поиск <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-sitemap"></i> Отделения</a>
                  <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 39px, 0px); top: 0px; left: 0px; will-change: transform;">
                    <a class="dropdown-item" href="{{ url('organisations') }}"><i class="fas fa-globe-americas"></i> Показать все</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Управление (межрайонное)</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Отдел ПФР в Ленинском р-не</a>
                    <a class="dropdown-item" href="#">Отдел ПФР в Нахимовском р-не</a>
                    <a class="dropdown-item" href="#">Отдел ПФР в Гагаринском р-не</a>
                    <a class="dropdown-item" href="#">Отдел ПФР в Балаклавском р-не</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Отделение</a>
                  </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-question"></i> FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">О приложении</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Контакты</a>
                </li>
            </ul>

            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="btn btn-danger" href="{{ url('backend/organisations') }}"><i class="fas fa-unlock-alt"></i> Админ-панель</a>
                </li>
            </ul>
        </div>
    </nav>

    <br>

    <section class="container">
        @yield('content')
    </section>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</body>
</html>
