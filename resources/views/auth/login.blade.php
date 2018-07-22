@extends('layouts.app')

@section('content')
        <div class="col-4 offset-4">
            <div class="card bg-light">
                <h5 class="card-header text-center">Авторизация</h5>
                <div class="card-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="inputEmail1">Email</label>
                            <input name="email" value="{{ old('email') }}" required autofocus class="form-control" id="inputEmail1" aria-describedby="emailHelp" placeholder="Введите email" type="email">
                            <small id="emailHelp" class="form-text text-muted">Введите свой email для авторизации на сервере</small>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="inputPassword">Пароль</label>
                            <input name="password" required class="form-control" id="inputPassword" aria-describedby="emailHelp" placeholder="Введите пароль" type="password" name="password">
                            <small id="emailHelp" class="form-text text-muted">Введите свой пароль для авторизации на сервере</small>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                             @endif
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : ''}} class="custom-control-input">
                                <label class="custom-control-label" for="remember">Запомнить?</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            Войти
                        </button>

                        <div class="form-group text-center">
                            <a class="btn-sm btn-link" href="{{ url('/password/reset') }}">
                                Забыли пароль?
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
