<!-- resources/views/positions/index.blade.php -->

@extends('layouts.backend')

@section('content')

    <div class="card bg-light">
        <div class="card-header">Добавление новой организации</div>
            <div class="card-body">
                <!-- Отображение ошибок проверки ввода -->
                @include('common.errors')

                <!-- Форма новой задачи -->
                <form action="{{ url('backend/organisation') }}" method="POST" class="form-inline">
                    {{ csrf_field() }}

                    <!-- Наименование -->
                    <div class="form-group col-9">
                        <label for="organisation" class="col-2 control-label">Наименование</label>

                        <div class="col-10">
                            <input type="text" name="title" id="organisation-title" class="form-control" placeholder="Наименование" style="width: 100%;">
                        </div>
                    </div>

                    <!-- Краткое наименование -->
                    <div class="form-group col-9">
                        <label for="organisation" class="col-2 control-label">Сокращенное наименование</label>

                        <div class="col-10">
                            <input type="text" name="short_title" id="organisation-short-title" class="form-control" placeholder="Сокращение" style="width: 100%;">
                        </div>
                    </div>

                    <div class="form-group col-3">
                        <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Добавить организацию
                        </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <br>

    <div class="container">
        <!-- Должности -->
        @if (count($organisations) > 0)
            <div class="col-12 mx-auto">
                <h2>Список организаций:</h2>

                <table class="table table-hover">
                    <thead>
                        <tr class="table-info">
                            <th>Наименование</th>
                            <th>Сокращенное наименование</th>
                            <th>Кол-во сотрудников</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                <tbody>
                    @foreach ($organisations as $organisation)
                        <tr>
                            <!-- Наименование должности -->
                            <td class="table-text">
                                <div><b class="text-info">{{ $organisation->title }}</b></div>
                            </td>
                            <td class="table-text">
                                <div><b class="text-muted">{{ $organisation->short_title or 'Не заданно' }}</b></div>
                            </td>
                            <td class="table-text">
                                <span class="badge badge-primary badge-pill">{{ $organisation->employees_count }}</span>
                            </td>
                            <td>
                                <div ckass="btn-group">
                                    <a class="btn btn-primary" href="{{ url('backend/organisation/'.$organisation->id.'/edit') }}">Редактировать</a>
                                    <form action="{{ url('backend/organisation/'.$organisation->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i> Удалить
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection